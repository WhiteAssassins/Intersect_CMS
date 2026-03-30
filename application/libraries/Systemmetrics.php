<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Systemmetrics {
    public function collect()
    {
        $memoryUsage = $this->getServerMemoryUsage(false);
        $metrics = array(
            'ram_used_gb' => 0,
            'ram_total_gb' => 0,
            'ram_usage_percent' => 0,
            'cpu_load_percent' => 0,
            'disk_used_gb' => 0,
            'disk_total_gb' => 0,
            'disk_usage_percent' => 0,
            'php_load_mb' => round(memory_get_usage() / 1000000, 2),
            'total_connections' => 0,
            'traffic_light' => '#2F2',
            'response_time' => 0,
        );

        $startTime = microtime(TRUE);
        $operatingSystem = PHP_OS_FAMILY;

        if ($operatingSystem === 'Windows' && class_exists('COM')) {
            $wmi = new COM('WinMgmts:\\\\.');
            $cpus = $wmi->InstancesOf('Win32_Processor');
            $cpuLoad = 0;
            $cpuCount = 0;
            foreach ($cpus as $cpu) {
                $cpuLoad += $cpu->LoadPercentage;
                $cpuCount++;
            }

            if ($cpuCount > 0) {
                $metrics['cpu_load_percent'] = round($cpuLoad / $cpuCount, 2);
            }

            $result = $wmi->ExecQuery('SELECT FreePhysicalMemory,TotalVisibleMemorySize FROM Win32_OperatingSystem');
            $memory = $result->ItemIndex(0);
            $metrics['ram_total_gb'] = round($memory->TotalVisibleMemorySize / 1000000, 2);
            $memAvailable = round($memory->FreePhysicalMemory / 1000000, 2);
            $metrics['ram_used_gb'] = round($metrics['ram_total_gb'] - $memAvailable, 2);
        } elseif ($operatingSystem === 'Windows') {
            if (is_array($memoryUsage)) {
                $metrics['ram_total_gb'] = round($memoryUsage['total'] / 1000000000, 2);
                $memAvailable = round($memoryUsage['free'] / 1000000000, 2);
                $metrics['ram_used_gb'] = round($metrics['ram_total_gb'] - $memAvailable, 2);
            }
        } else {
            $load = sys_getloadavg();
            $metrics['cpu_load_percent'] = isset($load[0]) ? round($load[0], 2) : 0;

            $free = trim((string) shell_exec('free'));
            $freeRows = explode("\n", $free);
            if (isset($freeRows[1])) {
                $mem = preg_split('/\s+/', trim($freeRows[1]));
                if (isset($mem[1], $mem[2], $mem[6])) {
                    $metrics['ram_total_gb'] = round($mem[1] / 1000000, 2);
                    $metrics['ram_used_gb'] = round($mem[2] / 1000000, 2);
                    $memAvailable = round($mem[6] / 1000000, 2);
                }
            }

            $connections = shell_exec("netstat -ntu 2>/dev/null | grep :80 | grep -v LISTEN | awk '{print \$5}' | cut -d: -f1 | sort | uniq -c | sort -rn | grep -v 127.0.0.1 | wc -l");
            $metrics['total_connections'] = (int) trim((string) $connections);
        }

        if (!isset($memAvailable)) {
            $memAvailable = max($metrics['ram_total_gb'] - $metrics['ram_used_gb'], 0);
        }

        if ($metrics['ram_total_gb'] > 0) {
            $metrics['ram_usage_percent'] = round(($memAvailable / $metrics['ram_total_gb']) * 100);
        }

        $diskFree = round(disk_free_space('.') / 1000000000);
        $diskTotal = round(disk_total_space('.') / 1000000000);
        $metrics['disk_total_gb'] = $diskTotal;
        $metrics['disk_used_gb'] = round($diskTotal - $diskFree);
        if ($diskTotal > 0) {
            $metrics['disk_usage_percent'] = round($metrics['disk_used_gb'] / $diskTotal * 100);
        }

        if ($metrics['ram_usage_percent'] > 85 || $metrics['cpu_load_percent'] > 85 || $metrics['disk_usage_percent'] > 85) {
            $metrics['traffic_light'] = 'red';
        } elseif ($metrics['ram_usage_percent'] > 50 || $metrics['cpu_load_percent'] > 50 || $metrics['disk_usage_percent'] > 50) {
            $metrics['traffic_light'] = 'orange';
        }

        $metrics['response_time'] = round(microtime(TRUE) - $startTime, 4);

        return $metrics;
    }

    private function getServerMemoryUsage($getPercentage = TRUE)
    {
        $memoryTotal = null;
        $memoryFree = null;

        if (stristr(PHP_OS, 'win')) {
            @exec('wmic ComputerSystem get TotalPhysicalMemory', $outputTotalPhysicalMemory);
            @exec('wmic OS get FreePhysicalMemory', $outputFreePhysicalMemory);

            if ($outputTotalPhysicalMemory && $outputFreePhysicalMemory) {
                foreach ($outputTotalPhysicalMemory as $line) {
                    if ($line && preg_match('/^[0-9]+$/', $line)) {
                        $memoryTotal = $line;
                        break;
                    }
                }

                foreach ($outputFreePhysicalMemory as $line) {
                    if ($line && preg_match('/^[0-9]+$/', $line)) {
                        $memoryFree = $line * 1024;
                        break;
                    }
                }
            }
        } elseif (is_readable('/proc/meminfo')) {
            $stats = @file_get_contents('/proc/meminfo');

            if ($stats !== false) {
                $stats = str_replace(array("\r\n", "\n\r", "\r"), "\n", $stats);
                $stats = explode("\n", $stats);

                foreach ($stats as $statLine) {
                    $statLineData = explode(':', trim($statLine));
                    if (count($statLineData) !== 2) {
                        continue;
                    }

                    if (trim($statLineData[0]) === 'MemTotal') {
                        $memoryTotal = explode(' ', trim($statLineData[1]));
                        $memoryTotal = $memoryTotal[0] * 1024;
                    }

                    if (trim($statLineData[0]) === 'MemFree') {
                        $memoryFree = explode(' ', trim($statLineData[1]));
                        $memoryFree = $memoryFree[0] * 1024;
                    }
                }
            }
        }

        if (is_null($memoryTotal) || is_null($memoryFree)) {
            return null;
        }

        if ($getPercentage) {
            return 100 - ($memoryFree * 100 / $memoryTotal);
        }

        return array(
            'total' => $memoryTotal,
            'free' => $memoryFree,
        );
    }
}

<?php
    if(isset($sms) && $tipo == 'error'){
        echo '<div class="alert alert-info text-center">'.$sms.'</div>';
    };
    if(isset($error)){
        echo '<div class="alert alert-info text-center">'.$error.'</div>';
    };
    function getServerMemoryUsage($getPercentage=true)
    {
        $memoryTotal = null;
        $memoryFree = null;
   
        if (stristr(PHP_OS, "win")) {
            // Get total physical memory (this is in bytes)
            $cmd = "wmic ComputerSystem get TotalPhysicalMemory";
            @exec($cmd, $outputTotalPhysicalMemory);
   
            // Get free physical memory (this is in kibibytes!)
            $cmd = "wmic OS get FreePhysicalMemory";
            @exec($cmd, $outputFreePhysicalMemory);
   
            if ($outputTotalPhysicalMemory && $outputFreePhysicalMemory) {
                // Find total value
                foreach ($outputTotalPhysicalMemory as $line) {
                    if ($line && preg_match("/^[0-9]+\$/", $line)) {
                        $memoryTotal = $line;
                        break;
                    }
                }
   
                // Find free value
                foreach ($outputFreePhysicalMemory as $line) {
                    if ($line && preg_match("/^[0-9]+\$/", $line)) {
                        $memoryFree = $line;
                        $memoryFree *= 1024;  // convert from kibibytes to bytes
                        break;
                    }
                }
            }
        }
        else
        {
            if (is_readable("/proc/meminfo"))
            {
                $stats = @file_get_contents("/proc/meminfo");
   
                if ($stats !== false) {
                    // Separate lines
                    $stats = str_replace(array("\r\n", "\n\r", "\r"), "\n", $stats);
                    $stats = explode("\n", $stats);
   
                    // Separate values and find correct lines for total and free mem
                    foreach ($stats as $statLine) {
                        $statLineData = explode(":", trim($statLine));
   
                        //
                        // Extract size (TODO: It seems that (at least) the two values for total and free memory have the unit "kB" always. Is this correct?
                        //
   
                        // Total memory
                        if (count($statLineData) == 2 && trim($statLineData[0]) == "MemTotal") {
                            $memoryTotal = trim($statLineData[1]);
                            $memoryTotal = explode(" ", $memoryTotal);
                            $memoryTotal = $memoryTotal[0];
                            $memoryTotal *= 1024;  // convert from kibibytes to bytes
                        }
   
                        // Free memory
                        if (count($statLineData) == 2 && trim($statLineData[0]) == "MemFree") {
                            $memoryFree = trim($statLineData[1]);
                            $memoryFree = explode(" ", $memoryFree);
                            $memoryFree = $memoryFree[0];
                            $memoryFree *= 1024;  // convert from kibibytes to bytes
                        }
                    }
                }
            }
        }
   
        if (is_null($memoryTotal) || is_null($memoryFree)) {
            return null;
        } else {
            if ($getPercentage) {
                return (100 - ($memoryFree * 100 / $memoryTotal));
            } else {
                return array(
                    "total" => $memoryTotal,
                    "free" => $memoryFree,
                );
            }
        }
    }
   
    function getNiceFileSize($bytes, $binaryPrefix=true) {
        if ($binaryPrefix) {
            $unit=array('B','KiB','MiB','GiB','TiB','PiB');
            if ($bytes==0) return '0 ' . $unit[0];
            return @round($bytes/pow(1024,($i=floor(log($bytes,1024)))),2) .' '. (isset($unit[$i]) ? $unit[$i] : 'B');
        } else {
            $unit=array('B','KB','MB','GB','TB','PB');
            if ($bytes==0) return '0 ' . $unit[0];
            return @round($bytes/pow(1000,($i=floor(log($bytes,1000)))),2) .' '. (isset($unit[$i]) ? $unit[$i] : 'B');
        }
    }
   
    // Memory usage: 4.55 GiB / 23.91 GiB (19.013557664178%)
    $memUsage = getServerMemoryUsage(false);
   
   
    
   
    $memusagepc = $memUsage["total"] - $memUsage["free"];
    $memusagepc = $memusagepc / 1024 / 1024 / 1024;
    $memtotal = $memUsage["total"] / 1024 / 1024 / 1024;
   
   //Uso CPU
    
   
   
   $server_check_version = '1.0.4';
     $start_time = microtime(TRUE);
   
     $operating_system = PHP_OS_FAMILY;
   
     if ($operating_system === 'Windows') {
       // Win CPU
       $wmi = new COM('WinMgmts:\\\\.');
       $cpus = $wmi->InstancesOf('Win32_Processor');
       $cpuload = 0;
       $cpu_count = 0;
       foreach ($cpus as $key => $cpu) {
         $cpuload += $cpu->LoadPercentage;
         $cpu_count++;
       }
       // WIN MEM
       $res = $wmi->ExecQuery('SELECT FreePhysicalMemory,FreeVirtualMemory,TotalSwapSpaceSize,TotalVirtualMemorySize,TotalVisibleMemorySize FROM Win32_OperatingSystem');
       $mem = $res->ItemIndex(0);
       $memtotal = round($mem->TotalVisibleMemorySize / 1000000,2);
       $memavailable = round($mem->FreePhysicalMemory / 1000000,2);
       $memused = round($memtotal-$memavailable,2);
       // WIN CONNECTIONS
       $connections = shell_exec('netstat -nt | findstr :80 | findstr ESTABLISHED | find /C /V ""'); 
       $totalconnections = shell_exec('netstat -nt | findstr :80 | find /C /V ""'); 
     } else {
       // Linux CPU
       $load = sys_getloadavg();
       $cpuload = $load[0];
       // Linux MEM
       $free = shell_exec('free');
       $free = (string)trim($free);
       $free_arr = explode("\n", $free);
       $mem = explode(" ", $free_arr[1]);
       $mem = array_filter($mem, function($value) { return ($value !== null && $value !== false && $value !== ''); }); // removes nulls from array
       $mem = array_merge($mem); // puts arrays back to [0],[1],[2] after 
       $memtotal = round($mem[1] / 1000000,2);
       $memused = round($mem[2] / 1000000,2);
       $memfree = round($mem[3] / 1000000,2);
       $memshared = round($mem[4] / 1000000,2);
       $memcached = round($mem[5] / 1000000,2);
       $memavailable = round($mem[6] / 1000000,2);
       // Linux Connections
       $connections = `netstat -ntu | grep :80 | grep ESTABLISHED | grep -v LISTEN | awk '{print $5}' | cut -d: -f1 | sort | uniq -c | sort -rn | grep -v 127.0.0.1 | wc -l`; 
       $totalconnections = `netstat -ntu | grep :80 | grep -v LISTEN | awk '{print $5}' | cut -d: -f1 | sort | uniq -c | sort -rn | grep -v 127.0.0.1 | wc -l`; 
     }
   
     $memusage = round(($memavailable/$memtotal)*100);
   
   
   
     $phpload = round(memory_get_usage() / 1000000,2);
   
     $diskfree = round(disk_free_space(".") / 1000000000);
     $disktotal = round(disk_total_space(".") / 1000000000);
     $diskused = round($disktotal - $diskfree);
   
     $diskusage = round($diskused/$disktotal*100);
   
     if ($memusage > 85 || $cpuload > 85 || $diskusage > 85) {
       $trafficlight = 'red';
     } elseif ($memusage > 50 || $cpuload > 50 || $diskusage > 50) {
       $trafficlight = 'orange';
     } else {
       $trafficlight = '#2F2';
     }
   
     $end_time = microtime(TRUE);
     $time_taken = $end_time - $start_time;
     $total_time = round($time_taken,4);
   
     // use servercheck.php?json=1
     if (isset($_GET['json'])) {
       echo '{"ram":'.$memusage.',"cpu":'.$cpuload.',"disk":'.$diskusage.',"connections":'.$totalconnections.'}';
       exit;
     }
?>
<div class="container my-1" id="admin">
  <section>
    <div class="row">
      <div class="col-lg-3 col-md-6 mb-4 ">
        <div class="media white z-depth-1 rounded cards-novo">
          <i class="fas fa-user fa-lg blue z-depth-1 p-4 rounded-left text-white mr-3"></i>
          <div class="media-body p-1">
            <p class="text-uppercase text-muted mb-1"><small>{usersregistered}</small></p>
            <h5 class="font-weight-bold mb-0"><?php 
        $user = $this->Apiusers->user();
           echo $user['Total']; 
           ?></h5>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="media white z-depth-1 rounded cards-novo">
          <i class="fas fa-user-plus fa-lg deep-purple z-depth-1 p-4 rounded-left text-white mr-3"></i>
          <div class="media-body p-1">
            <p class="text-uppercase text-muted mb-1"><small>{useronline}</small></p>
            <h5 class="font-weight-bold mb-0"><?php $serverstats = $this->Apiserverstats->serverinfo();  echo $serverstats['onlineCount']; ?></h5>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="media white z-depth-1 rounded cards-novo">
          <i class="fas fa-id-badge fa-lg teal z-depth-1 p-4 rounded-left text-white mr-3"></i>
          <div class="media-body p-1">
            <p class="text-uppercase text-muted mb-1"><small>{totalplayers}</small></p>
            <h5 class="font-weight-bold mb-0"><?php $players = $this->Apiplayers->player();  echo $players['Total']; ?></h5>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">

        <div class="media white z-depth-1 rounded cards-novo">
          <i class="fas fa-server fa-lg pink z-depth-1 p-4 rounded-left text-white mr-3"></i>
          <div class="media-body p-1">
            <p class="text-uppercase text-muted mb-1"><small>{cps}</small></p>
            <h5 class="font-weight-bold mb-0"><?php $serverstats = $this->Apiserverstats->serverinfo();  echo $serverstats['cps']; ?></h5>
          </div>
        </div>
      </div>
    </div>
  </section>
















  <section>
    <div class="row">
      <div class="col-lg-3 col-md-6 mb-4 ">
        <div class="media white z-depth-1 rounded cards-novo">
          <i class="fas fa-microchip fa-lg blue z-depth-1 p-4 rounded-left text-white mr-3"></i>
          <div class="media-body p-1">
            <p class="text-uppercase text-muted mb-1"><small>{ram}</small></p>
            <h5 class="font-weight-bold mb-0"><?php echo $memused; ?>/<?php echo substr($memtotal, 0, 5); ?>GB</h5>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="media white z-depth-1 rounded cards-novo">
          <i class="fas fa-hdd fa-lg deep-purple z-depth-1 p-4 rounded-left text-white mr-3"></i>
          <div class="media-body p-1">
            <p class="text-uppercase text-muted mb-1"><small>{hdd}</small></p>
            <h5 class="font-weight-bold mb-0"><?php echo $diskused; ?>/<?php echo $disktotal; ?>GB</h5>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="media white z-depth-1 rounded cards-novo">
          <i class="fas fa-server fa-lg teal z-depth-1 p-4 rounded-left text-white mr-3"></i>
          <div class="media-body p-1">
            <p class="text-uppercase text-muted mb-1"><small>{cpu}</small></p>
            <h5 class="font-weight-bold mb-0"><?php echo $cpuload; ?>%</h5>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">

        <div class="media white z-depth-1 rounded cards-novo">
          <i class="fas fa-code-branch fa-lg pink z-depth-1 p-4 rounded-left text-white mr-3"></i>
          <div class="media-body p-1">
            <p class="text-uppercase text-muted mb-1"><small>{version}</small></p>
            <h5 class="font-weight-bold mb-0">0.7</h5>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>





















</div>


<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\Apiserverinfo;
use Config\Services;

class ViewGlobals implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = Services::session();
        $db = \Config\Database::connect();

        $serverinfo = [];
        try {
            $serverinfo = model(Apiserverinfo::class)->serverinfo();
        } catch (\Throwable $e) {
            // Silenciar error si no se puede conectar
        }

        $conf = $db->table('config')->get()->getResultArray();
        $lang = model('Langs')->lang();
        $selectedLang = $session->get('lang') ?? 'es';

        $index = match ($selectedLang) {
            "en" => 1, "tr" => 2, "jp" => 3, "de" => 4, "ru" => 5,
            "zh" => 6, "fr" => 7, "pt" => 8, "hi" => 9, "ar" => 10,
            default => 0
        };

        // Variables accesibles en todas las vistas
        Services::renderer()->setData([
            'serverinfo' => $serverinfo,
            'conf'       => $conf,
            'lang'       => $lang[$index] ?? [],
            'session'    => $session,
        ]);
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}

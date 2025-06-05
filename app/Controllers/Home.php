<?php

namespace App\Controllers;

use App\Models\Apigettoken;
use App\Models\Apiserverinfo;
use App\Models\Apiserverstats;
use App\Models\Apiusers;
use App\Models\Apiplayers;
use App\Models\Langs;
use GuzzleHttp\Client;

class Home extends BaseController
{
    protected $session;
    protected $db;

    public function __construct()
    {
        helper('url');
        $this->session = session();
        $this->db = \Config\Database::connect();

        // Cargar modelos
        $this->apigettoken = new Apigettoken();
        $this->apiserverinfo = new Apiserverinfo();
        $this->apiserverstats = new Apiserverstats();
        $this->apiusers = new Apiusers();
        $this->apiplayers = new Apiplayers();
        $this->langs = new Langs();
    }

    public function index()
    {
        $conf = $this->db->table('config')->get()->getResultArray();

        if (!empty($conf) && $conf[0]['mant'] == 1 && !$this->session->get('login')) {
            return redirect()->to(base_url('mant'));
        }

        $lang = $this->langs->lang();
        $selectedLang = $this->session->get('lang') ?? 'es';

        $index = match ($selectedLang) {
            "en" => 1, "tr" => 2, "jp" => 3, "de" => 4, "ru" => 5,
            "zh" => 6, "fr" => 7, "pt" => 8, "hi" => 9, "ar" => 10,
            default => 0
        };

        echo view('header', $lang[$index]);
        echo view('navbar', $lang[$index]);
        echo view('home', $lang[$index]);
        echo view('footer', $lang[$index]);
    }

    public function reg()
    {
        $request = service('request');
        $response = ['status' => 0];

        $user = $request->getPost('user');
        $pass = $request->getPost('pass');
        $pass1 = $request->getPost('pass1');
        $email = $request->getPost('email');

        if (!$user || !$pass || !$pass1 || !$email) {
            $response['sms'] = 'Complete todos los campos';
            return $this->response->setJSON($response);
        }

        if ($pass !== $pass1) {
            $response['sms'] = 'Sus contraseñas deben coincidir';
            return $this->response->setJSON($response);
        }

        $apiip = config('App')->apiip;
        $accesstoken = $this->apigettoken->apitoken();

        $client = new Client([
            'base_uri' => "http://$apiip/api/v1/users/register",
            'timeout'  => 5.0,
            'http_errors' => false
        ]);

        $res = $client->post('', [
            'headers' => [
                'authorization' => "Bearer " . $accesstoken['access_token']
            ],
            'form_params' => [
                'username' => $user,
                'password' => hash('sha256', $pass),
                'email' => $email
            ]
        ]);

        $estado = json_decode($res->getBody(), true);

        if ($res->getStatusCode() == 200) {
            $this->db->table('users')->insert([
                'user' => $user,
                'pass' => md5($pass),
                'rol' => 2,
                'email' => $email
            ]);

            $response['status'] = 200;
        } else {
            $response['sms'] = $estado['Message'] ?? 'Error desconocido';
        }

        return $this->response->setJSON($response);
    }

    public function login()
    {
        $request = service('request');
        $user = $request->getPost('user');
        $pass = $request->getPost('pass');

        $where = ['user' => $user, 'pass' => md5($pass)];
        $query = $this->db->table('users')->getWhere($where);

        if ($query->getNumRows() === 1) {
            $usuario = $query->getRowArray();
            $this->session->set([
                'user' => $usuario['user'],
                'rol' => $usuario['rol'],
                'login' => true
            ]);
            return redirect()->to(base_url());
        }

        $apiip = config('App')->apiip;
        $accesstoken = $this->apigettoken->apitoken();

        $client = new Client([
            'base_uri' => "http://$apiip/api/v1/users/$user",
            'timeout'  => 5.0,
            'http_errors' => false
        ]);

        $res = $client->get('', [
            'headers' => [
                'authorization' => "Bearer " . $accesstoken['access_token']
            ]
        ]);

        $estado = json_decode($res->getBody(), true);

        if ($res->getStatusCode() != 200) {
            return redirect()->to(base_url());
        }

        // Validar contraseña
        $client = new Client([
            'base_uri' => "http://$apiip/api/v1/users/$user/password/validate",
            'timeout' => 5.0,
            'http_errors' => false
        ]);

        $res = $client->post('', [
            'headers' => [
                'authorization' => "Bearer " . $accesstoken['access_token']
            ],
            'form_params' => [
                'password' => hash('sha256', $pass)
            ]
        ]);

        if ($res->getStatusCode() != 200) {
            return redirect()->to(base_url());
        }

        $rol = ($estado['Power']['Editor'] ?? false) ? 1 : 2;

        $this->session->set([
            'user' => $estado['Name'],
            'rol' => $rol,
            'login' => true
        ]);

        $this->db->table('users')->insert([
            'user' => $estado['Name'],
            'pass' => md5($pass),
            'rol' => $rol,
            'email' => $estado['Email']
        ]);

        return redirect()->to(base_url());
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url());
    }
}

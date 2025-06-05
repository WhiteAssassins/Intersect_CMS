<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Notfound extends Controller
{
    public function index()
    {
        return view('404'); // Asegúrate de que exista: app/Views/404.php
    }
}

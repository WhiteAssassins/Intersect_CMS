<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Langs extends BaseController
{
    public function __construct()
    {
        helper('url');
        $this->session = session(); // Carga la sesión manualmente si es necesario
    }

    private function setLangAndRedirect(string $lang)
    {
        $this->session->set(['lang' => $lang]);
        return redirect()->to(base_url());
    }

    public function es() { return $this->setLangAndRedirect('es'); }
    public function en() { return $this->setLangAndRedirect('en'); }
    public function tr() { return $this->setLangAndRedirect('tr'); }
    public function jp() { return $this->setLangAndRedirect('jp'); }
    public function de() { return $this->setLangAndRedirect('de'); }
    public function ru() { return $this->setLangAndRedirect('ru'); }
    public function zh() { return $this->setLangAndRedirect('zh'); }
    public function fr() { return $this->setLangAndRedirect('fr'); }
    public function pt() { return $this->setLangAndRedirect('pt'); }
    public function hi() { return $this->setLangAndRedirect('hi'); }
    public function ar() { return $this->setLangAndRedirect('ar'); }
}

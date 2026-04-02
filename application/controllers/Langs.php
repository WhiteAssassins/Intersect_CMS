<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Langs extends MY_Controller
{
    public function es()
    {
        $this->setLangAndRedirect('es');
    }

    public function en()
    {
        $this->setLangAndRedirect('en');
    }

    public function tr()
    {
        $this->setLangAndRedirect('tr');
    }

    public function jp()
    {
        $this->setLangAndRedirect('jp');
    }

    public function de()
    {
        $this->setLangAndRedirect('de');
    }

    public function ru()
    {
        $this->setLangAndRedirect('ru');
    }

    public function zh()
    {
        $this->setLangAndRedirect('zh');
    }

    public function fr()
    {
        $this->setLangAndRedirect('fr');
    }

    public function pt()
    {
        $this->setLangAndRedirect('pt');
    }

    public function hi()
    {
        $this->setLangAndRedirect('hi');
    }

    public function ar()
    {
        $this->setLangAndRedirect('ar');
    }

    private function setLangAndRedirect($lang)
    {
        $this->session->set_userdata(array(
            'lang' => $lang,
        ));

        $this->redirectTo('');
    }
}

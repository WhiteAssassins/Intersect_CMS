<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notfound extends MY_Controller {

	public function index()
	{
        $this->load->view('404', $this->getLanguageData());
                    

}
}

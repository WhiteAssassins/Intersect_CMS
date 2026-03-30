<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';

use GuzzleHttp\Client;

class News extends MY_Controller {
	function __construct() {
        parent::__construct();
		$this->load->model('newss');
        $this->load->helper('common');
        $this->load->library('form_validation');
        $this->load->model('Apigettoken');
		$this->load->model('Apiserverinfo');
		$this->load->model('Apiserverstats');
		$this->load->model('Apiusers');
		$this->load->model('Apiplayers');
		$this->load->model('Langs');
    }

    private function buildNewsItems()
    {
        $items = $this->newss->getRows();
        $rows = array();

        if (!is_array($items)) {
            return $rows;
        }

        foreach (array_reverse($items) as $item) {
            if ((int) ($item['status'] ?? 0) !== 1) {
                continue;
            }

            $rows[] = array(
                'url' => base_url('news/' . ($item['url_slug'] ?? '')),
                'image_url' => base_url('img/news/' . ($item['img'] ?? '')),
                'title' => $item['title'] ?? '',
                'description' => $item['descrip'] ?? '',
            );
        }

        return $rows;
    }
	
	public function index()
	{
        if ($this->redirectToMaintenanceIfNeeded()) {
            return;
        }

        $this->renderPublicPage('news', array(
            'news_items' => $this->buildNewsItems(),
        ));
	}
	
	public function details($url_slug){
        $data = array(
            'newss' => $this->newss->getRows(array('url_slug' => $url_slug)),
        );

        $this->renderPublicPage('news/details', $data);
    }
}

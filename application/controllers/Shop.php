<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product');
        $this->load->library('intersectshopservice');
    }

    public function index()
    {
        if ($this->redirectToMaintenanceIfNeeded()) {
            return;
        }

        $this->renderPublicPage('shop', array(
            'shop_products' => $this->buildShopProducts(),
        ));
    }

    public function shoping()
    {
        if (!$this->session->userdata('login')) {
            $this->respondJson(array(
                'status' => 0,
                'sms' => 'Debe iniciar sesion para comprar.',
            ));
            return;
        }

        $result = $this->intersectshopservice->purchaseProduct(
            (string) $this->session->userdata('user'),
            $this->getPostString('player'),
            (int) $this->input->post('id')
        );

        $this->respondJson($result);
    }

    private function buildShopProducts()
    {
        $products = $this->Product->getRows(array(
            'status' => 1,
        ));
        $rows = array();

        if (!is_array($products)) {
            return $rows;
        }

        foreach ($products as $product) {
            $rows[] = array(
                'name' => $product['name'] ?? '',
                'price' => $product['price'] ?? 0,
                'image_url' => base_url('img/products/' . ($product['image'] ?? '')),
                'details_url' => base_url('products/' . ($product['url_slug'] ?? '')),
            );
        }

        return $rows;
    }
}

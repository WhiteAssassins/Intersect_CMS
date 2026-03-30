<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends MY_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('product');
    }
    
    public function index(){
        $this->redirectTo('shop');
    }
    
    public function details($url_slug){
        if ($this->redirectToMaintenanceIfNeeded()) {
            return;
        }

        $product = $this->product->getRows(array('url_slug' => $url_slug));

        if (empty($product)) {
            show_404();
            return;
        }

        $this->renderPublicPage('products/details', array(
            'products' => $product,
        ));
    }
    

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends CI_Controller {
    
    public function __construct() {
        //load database in autoload libraries 
        parent::__construct(); 
        $this->load->model('ProductsModel');         
    }

    public function index(){
        $products=new ProductsModel;
       $data['data']=$products->get_products();
       $this->load->view('includes/header');       
       $this->load->view('products/list',$data);
       $this->load->view('includes/footer');
   }
}
?>
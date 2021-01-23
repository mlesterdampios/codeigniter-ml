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

   public function create()
   {
      $this->load->view('includes/header');
      $this->load->view('products/create');
      $this->load->view('includes/footer');      
   }

   public function store()
   {
       $products=new ProductsModel;
       $products->insert_product();
       redirect(base_url('products'));
    }

   public function edit($id)
   {
       $product = $this->db->get_where('products', array('id' => $id))->row();

       $this->load->view('includes/header');
       $this->load->view('products/edit',array('product'=>$product));
       $this->load->view('includes/footer');   
   }

   public function update($id)
   {
       $products=new ProductsModel;
       $products->update_product($id);
       redirect(base_url('products'));
   }

   public function delete($id)
   {
       $this->db->where('id', $id);
       $this->db->delete('products');
       redirect(base_url('products'));
   }
}
?>
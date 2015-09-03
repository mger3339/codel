<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
       // die($this->uri->segment(3));
        $limit = 3;
        if($this->uri->segment(3) !== null && is_numeric($this->uri->segment(3)))
        {
            $offset = ($this->uri->segment(3) * $limit) - $limit ;
        }
        else
        {
            $offset = 0;
        }
        $this->load->view('frontend/header_view');
        $this->load->model('frontend/products_model');
        $data['product'] = $this->products_model->sliderImg();
        $this->load->view('frontend/slider_view',$data);
        $config['base_url'] = base_url('/home/index');
        $config['total_rows'] = $this->db->count_all('products');
        $config['per_page'] = $limit;
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] = "<ul class='pagination  pagination-centered'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config);
        $this->load->model('frontend/products_model');
        $home['data'] = $this->products_model->getProduct($limit, $offset);
        $this->load->view('frontend/content_view',$home);
        $this->load->view('frontend/footer_view');
    }

    public function porducts()
    {
        $this->load->view('frontend/header_view');
        $this->load->view('frontend/products_view');
        $this->load->view('frontend/footer_view');
    }

    public function about()
    {
        $this->load->view('frontend/header_view');
        $this->load->view('frontend/about_view');
        $this->load->view('frontend/footer_view');
    }

    public function contacts()
    {
        $this->load->view('frontend/header_view');
        $this->load->view('frontend/contacts_view');
        $this->load->view('frontend/footer_view');
    }

    public function productPage($id)
    {
        $config['base_url'] = base_url('index.php/frontend/home/productPage');
        $config['total_rows'] = '2';
        $config['per_page'] = '5';
        $this->pagination->initialize($config);
        $this->load->model('frontend/products_model');
        $product['data'] = $this->products_model->getProductPage($id);
        echo $this->pagination->create_links();
        $this->load->view('frontend/header_view');
        $this->load->view('frontend/product_page_view',$product);
        $this->load->view('frontend/footer_view');
    }

    public function addToCart(){
            $id = $this->input->post('id');
            $this->load->model('frontend/products_model');
            $arr = $this->products_model->getCartProduct();
            $myrow = array();
            foreach($arr as $value)
            {
                array_push($myrow,$value['product_id']);
            }
        if(!in_array($id, $myrow))
        {
            $cart = array( 'product_id' => $id, 'count' => 1);
//            echo "<pre>";
//            print_r($cart);
//            die;
            $this->load->model('frontend/products_model');
            $this->products_model->addCartProduct($cart);
        }
        else
        {
            $this->load->model('frontend/products_model');
            $data = $this->products_model->getCartProductById($id);
            $count = $data['0']['count'];
            $count = $count + 1;
            $this->load->model('frontend/products_model');
            $this->products_model->editCartProduct($id, $count);
        }
    }
    public function cartPage(){
        $this->load->model('frontend/products_model');
        $product['data'] = $this->products_model->getProductCartPage();
        $this->load->view('frontend/header_view');
        $this->load->view('frontend/cart_page_view',$product);
        $this->load->view('frontend/footer_view');
    }

    public function editCartCount(){
        $responce = 0;
        $id = $this->input->post('id');
        $count = $this->input->post('count');
        $this->load->model('frontend/products_model');
        $total = $this->products_model->getTotalProduct($id);
        $result = $total['0']['total'];
        if($count<=$result)
        {
            $this->load->model('frontend/products_model');
            $data = $this->products_model->editCartProduct($id, $count);
            $responce = 1;
        }
        echo $responce;
    }

    public function deleteCartProduct()
    {
        $id = $this->input->post('id');
        $this->load->model('frontend/products_model');
        $total = $this->products_model->deleteProduct($id);
        $result = 1;
        echo $result;
    }
}
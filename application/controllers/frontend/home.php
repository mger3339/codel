<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $this->load->view('frontend/header_view');
        $this->load->model('frontend/products_model');
        $data['product'] = $this->products_model->sliderImg();
        $this->load->view('frontend/slider_view',$data);
        $per_page = 4;
        $config['base_url'] = base_url('index.php/frontend/home/index');
        $config['total_rows'] = $this->db->count_all('products');
        $config['per_page'] = $per_page;
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] = "<ul class='pagination pag_product pagination-centered'>";
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
        $home['data'] = $this->products_model->getProduct($per_page, $this->uri->segment(4));
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

    public function addTotal(){
        if(isset($_POST['id']))
        {
            $id = $_POST['id'];
        }
            $count = 1;
            $this->load->model('frontend/products_model');
            $arr = $this->products_model->getCartProduct();
            $myrow = array();
            foreach($arr as $value)
            {
                array_push($myrow,$value['product_id']);
            }
        if(!in_array($id, $myrow))
        {
            $cart = array( 'product_id' => $id, 'count' => $count );
            $this->load->model('frontend/products_model');
            $this->products_model->addCartProduct($cart);
        }

        else
        {
            $count = $count + 1;
            $this->load->model('frontend/products_model');
            $this->products_model->editCartProduct($id, $count);
        }
    }
}
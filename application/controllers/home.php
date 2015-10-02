<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public $user_id;
    public $first_name;
    public $last_name;
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->first_name = $this->session->userdata('first_name');
        $this->last_name = $this->session->userdata('last_name');
        $this->user_id = $this->session->userdata('user_id');
        if ($this->session->userdata('check') != 1) {
            redirect('login');
        }
    }

    public function index()
    {
            $home['user_data'] = array('first_name' => $this->first_name, 'last_name' => $this->last_name);
            $this->load->view('frontend/header_view', $home);
            $limit = 3;
            if ($this->uri->segment(3) !== null && is_numeric($this->uri->segment(3)))
            {
                $offset = ($this->uri->segment(3) * $limit) - $limit;
            }
            else
            {
                $offset = 0;
            }
            $this->load->model('frontend/products_model');
            $data['product'] = $this->products_model->sliderImg();
            $this->load->view('frontend/slider_view', $data);
            $config['base_url'] = base_url('/home/index');
            $config['total_rows'] = $this->db->count_all('products');
            $config['per_page'] = $limit;
            $config['use_page_numbers'] = TRUE;
            $config['full_tag_open'] = "<ul class='pagination  pagination-centered'>";
            $config['full_tag_close'] = "</ul>";
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
            $home['areas'] = $this->products_model->getAreas();
            $home['categories'] = $this->products_model->getCategories();
            $home['cart'] = $this->products_model->getCartProductByUserId($this->user_id);
            $home['data'] = $this->products_model->getProduct($limit, $offset);
            $this->load->view('frontend/content_view', $home);
            $this->load->view('frontend/footer_view');
    }

    public function about()
    {
            $first_name = $this->session->userdata('first_name');
            $last_name = $this->session->userdata('last_name');
            $home['user_data'] = array('first_name' => $first_name, 'last_name' => $last_name);
            $this->load->view('frontend/header_view', $home);
            $this->load->view('frontend/about_view');
            $this->load->view('frontend/footer_view');
    }

    public function contacts()
    {
            $first_name = $this->session->userdata('first_name');
            $last_name = $this->session->userdata('last_name');
            $home['user_data'] = array('first_name' => $first_name, 'last_name' => $last_name);
            $this->load->view('frontend/header_view', $home);
            $this->load->view('frontend/contacts_view');
            $this->load->view('frontend/footer_view');
    }

    public function productPage($id)
    {
            $this->load->model('frontend/products_model');
            $product['data'] = $this->products_model->getProductPage($id);
            $data = $this->products_model->getProducts();
            $myrow = array();
            foreach ($data as $value) :
                array_push($myrow, $value['id']);
            endforeach;
            if (!in_array($id, $myrow))
            {
                redirect('home');
            }
            $user_id = $this->session->userdata('user_id');
            $product['cart'] = $this->products_model->getCartProductByUserId($user_id);
            $first_name = $this->session->userdata('first_name');
            $last_name = $this->session->userdata('last_name');
            $home['user_data'] = array('first_name' => $first_name, 'last_name' => $last_name);

            $area = $product['data']['0']['country'];
            $coordinates = $this->products_model->getCoordinates($area);
            $latitude = $coordinates['0']['latitude'];
            $longitude = $coordinates['0']['longitude'];
            $this->load->library('googlemaps');
            $config['center'] = "$latitude,$longitude";
            $config['zoom'] = '7';
            $this->googlemaps->initialize($config);
            $marker = array();
            $marker['position'] = "$latitude, $longitude";
            $this->googlemaps->add_marker($marker);
            $product['map'] = $this->googlemaps->create_map();
            $this->load->view('frontend/header_view', $home);
            $this->load->view('frontend/product_page_view', $product);
            $this->load->view('frontend/footer_view');
    }

    public function addToCart()
    {
            $id = $this->input->post('id');
            $user_id = $this->session->userdata('user_id');
            $this->load->model('frontend/products_model');
            $arr = $this->products_model->getCartProductByUserId($user_id);
            $myrow = array();
            foreach ($arr as $value)
            {
                array_push($myrow, $value['product_id']);
            }
            if (!in_array($id, $myrow))
            {
                $cart = array('product_id' => $id, 'count' => 1, 'user_id' => $user_id);
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

    public function cartPage()
    {
            $user_id = $this->session->userdata('user_id');
            $this->load->model('frontend/products_model');
            $product['data'] = $this->products_model->getProductCartPage($user_id);
            $product['shipping'] = $this->products_model->getShipping();
            $first_name = $this->session->userdata('first_name');
            $last_name = $this->session->userdata('last_name');
            $home['user_data'] = array('first_name' => $first_name, 'last_name' => $last_name);
            $this->load->view('frontend/header_view', $home);
            $this->load->view('frontend/cart_page_view', $product);
            $this->load->view('frontend/footer_view');
    }

    public function editCartCount()
    {
        $responce = 0;
        $id = $this->input->post('id');
        $user_id = $this->session->userdata('user_id');
        $count = $this->input->post('count');
        $this->load->model('frontend/products_model');
        $total = $this->products_model->getTotalProduct($id);
        $result = $total['0']['total'];
        if ($count >= 0 && $count <= $result)
        {
            $this->load->model('frontend/products_model');
            $data = $this->products_model->editCartProduct($id, $user_id, $count);
            $responce = 1;
        }
        $data['responce'] = $responce;
        $data['result'] = $result;
        echo json_encode($data);
    }

    public function deleteCartProduct()
    {
            $id = $this->input->post('id');
            $this->load->model('frontend/products_model');
            $total = $this->products_model->deleteProduct($id);
            $result = 1;
            echo $result;
    }

    public function deleteAllCartProduct()
    {
        $user_id = $this->input->post('user_id');
        $this->load->model('frontend/products_model');
        $product['data'] = $this->products_model->deleteCartAllProduct($user_id);
    }

    public function puyPage()
    {
            if($this->input->post('shipping'))
            {
                $shipping = $this->input->post('shipping');
            }
            else
            {
                $shipping = 0;
            }
            $data = array();
            $id = $this->input->post('id');
            $user_id = $this->session->userdata('user_id');
            $total = $this->input->post('total_sum');
            $count = $this->input->post('count');
            $price = $this->input->post('price');
            $this->load->model('frontend/products_model');
            $product = $this->products_model->getCartProductByIdUserId($id,$user_id);
            foreach ($product as $value) :
                $orders = array(
                    'product_id' => $value['id'],
                    'name' => $value['name'],
                    'price' => $price[$value['id']],
                    'count' => $count[$value['id']],
                    'user_id' => $user_id,
                    'shipping' => $shipping
                );
                $this->load->model('frontend/products_model');
                $data_orders = $this->products_model->getOrders($user_id);
                $this->products_model->addProductBuy($orders);
            endforeach;
            redirect('test/index');
    }

    public function deleteOrders(){
        $user_id = $this->session->userdata('user_id');
        $this->load->model('frontend/products_model');
        $this->products_model->deleteOrders($user_id);
    }

}
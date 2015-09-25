<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller
{
    public function index()
    {

        if($this->input->get('submit')) {
            $data = $this->input->get();
            unset($data['submit']);
            if(empty($data['areas']))
            {
                $data['areas'] = '';
            }
            if(empty($data['category']))
            {
                $data['category'] = '';
            }
            $data['text'] = trim($data['text']);
            $this->load->model('frontend/search_model');
            $this->load->model('frontend/products_model');
            $result['data'] = $this->search_model->search($data);
            $first_name = $this->session->userdata('first_name');
            $last_name = $this->session->userdata('last_name');
            $user_id = $this->session->userdata('user_id');
            $home['user_data'] = array('first_name' => $first_name, 'last_name' => $last_name);
            $home['cart'] = $this->products_model->getCartProductByUserId($user_id);
            $result['areas'] = $this->products_model->getAreas();
            $result['categories'] = $this->products_model->getCategories();
            $this->load->view('frontend/header_view', $home);
            $this->load->view('frontend/search_result_view', $result);
            $this->load->view('frontend/footer_view');
        }
    }
}


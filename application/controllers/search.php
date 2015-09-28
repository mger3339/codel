<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller
{
    public function index()
    {
        if($this->input->get()) {
            $data = $this->input->get();
            $data['text'] = trim($data['text']);
            if(empty($data['text']))
            {
                $data['text'] = '';
            }
            if(empty($data['areas']))
            {
                $data['areas'] = '';
            }
            if(empty($data['category']))
            {
                $data['category'] = '';
            }
            if(empty($data['from']))
            {
                $data['from'] = '';
            }
            if(empty($data['to']))
            {
                $data['to'] = '';
            }
            $text = explode(" ", $data['text']);
            $result['responce'] = 0;
            $this->load->model('frontend/search_model');
            $result['data'] = $this->search_model->search($data,$text);
            if(empty($result['data']))
            {
                $result['responce'] = 1;
            }
            $result['values'] = $data;
            $data['text'] = trim($data['text']);
            $this->load->model('frontend/products_model');
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
        else
        {
            redirect('home');
        }
    }
    public function liveSearch()
    {
        $text = $this->input->post('text');
        $text = explode(" ", $text);
        $this->load->model('frontend/search_model');
        $result = $this->search_model->liveSearch($text);
//        echo "<pre>";
        echo json_encode($result);
    }
}


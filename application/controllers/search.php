<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller
{
    public function index()
    {

        if($this->input->get('submit')) {
           $data = $this->input->get();
            unset($data['submit']);
            $this->load->model('frontend/search_model');
            $result = $this->search_model->search($data);
            echo "<pre>";
            print_r($result); die;
            }
        }
//        }
//        if(empty($area) && empty($category) && empty($text))
//        {
//            echo "Not search result";
//        }
//        if(empty($area) && empty($category))
//        {
//            $this->load->model('frontend/search_model');
//            $data_search_text = $this->search_model->searchByText($text);
////            echo "<pre>";
//            print_r($data_search_text);die;
//        }
//        if(empty($area) && empty($text))
//        {
//            $this->load->model('frontend/search_model');
//            $data_search_text = $this->search_model->getCategory($category);
////            echo "<pre>";
//            print_r($data_search_text);die;
//        }
//        if(empty($category) && empty($text))
//        {
//            $this->load->model('frontend/search_model');
//            $data_search_text = $this->search_model->getAreas($area);
////            echo "<pre>";
//            print_r($data_search_text);die;
//        }
//        if(empty($text))
//        {
//            $this->load->model('frontend/search_model');
//            $data_search_text = $this->search_model->getAreasAndCategories($category,$area);
////            echo "<pre>";
//            print_r($data_search_text);die;
//        }
//        if(empty($area))
//        {
//            $this->load->model('frontend/search_model');
//            $data_search_text = $this->search_model->searchByCategory($category,$text);
////            echo "<pre>";
//            print_r($data_search_text);die;
//        }
//        if(empty($category))
//        {
//            $this->load->model('frontend/search_model');
//            $data_search_text = $this->search_model->searchByAreas($area,$text);
////            echo "<pre>";
//            print_r($data_search_text);die;
//        }
//        if(!empty($category) && !empty($area) && !empty($text))
//        {
//            $this->load->model('frontend/search_model');
//            $data_search_text = $this->search_model->searchByAll($category,$area,$text);
////            echo "<pre>";
//            print_r($data_search_text);die;
//        }
////
////            $first_name = $this->session->userdata('first_name');
////            $last_name = $this->session->userdata('last_name');
////            $home['user_data'] = array('first_name' => $first_name, 'last_name' => $last_name);
////            $this->load->view('frontend/header_view', $home);
////            $this->load->view('frontend/search_rsult_view', $data_search_text);
////            $this->load->view('frontend/footer_view');
////
////            $this->load->view('frontend/header_login_view');
////            $this->load->view('frontend/registration_view');
////            $this->load->view('frontend/footer_view');
}


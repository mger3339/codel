<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

    public function productViewByCategory($id){
        if($this->session->userdata('chack') == TRUE)
        {
            $this->load->model('admin/categories_model');
            $data_product = $this->categories_model->getProductCategory($id);
            $myrow['data_product'] = $data_product;
            $this->load->view('admin/header_view');
            $this->load->view('admin/side_bar_view');
            $this->load->view('admin/product_category_view',$myrow);
            $this->load->view('admin/footer_view');
        }
        else
        {
            $this->load->view('admin/login_view');
        }
    }

    public function getCategory(){
        if($this->session->userdata('chack') == TRUE)
        {
            $this->load->model('admin/categories_model');
            $category = $this->categories_model->getCategory();
            $arr['category'] = $category;
            $this->load->view('admin/header_view');
            $this->load->view('admin/side_bar_view');
            $this->load->view('admin/categories_view',$arr);
            $this->load->view('admin/footer_view');
        }
        else
        {
            $this->load->view('admin/login_view');
        }
    }

    public function deleteProduct(){
        $id = $this->input->post('id');
        echo $id;
        $this->load->model('admin/categories_model');
        $this->categories_model->deleteProduct($id);
        $result = 1;

    }
}



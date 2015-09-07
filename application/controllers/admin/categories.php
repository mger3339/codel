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

    public function getCategories(){
        $this->load->model('admin/categories_model');
        $category = $this->categories_model->getCategoryAll();
        $arr['category'] = $category;
        $this->load->view('admin/header_view');
        $this->load->view('admin/side_bar_view');
        $this->load->view('admin/categories_all_view',$arr);
        $this->load->view('admin/footer_view');
    }

    public function getCategory($id){
        if($this->session->userdata('chack') == TRUE)
        {
            $this->load->model('admin/categories_model');
            $category = $this->categories_model->getCategoryAll();
            $this->load->model('admin/categories_model');
            $data = $this->categories_model->getCategoryById($id);
            $arr['category'] = $category;
            $arr['data'] = $data;
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
        $this->load->model('admin/categories_model');
        $this->categories_model->deleteProduct();
        $result = 1;
    }

    public function saveProduct(){
        if($this->input->post('category_save'))
        {
            $category_id = $this->input->post('hidden');
            $category_name = $this->input->post('category_name');
            $category = array('category_name' => $category_name);
        }
        if(empty($category_id))
        {
            $this->load->model('admin/categories_model');
            $this->categories_model->saveCategory($category);
            redirect('/admin/categories/getCategories', 'refresh');
        }
        else
        {
            $this->load->model('admin/categories_model');
            $this->categories_model->updateCategory($category, $category_id);
            redirect('/admin/categories/getCategories', 'refresh');
        }
    }

    public function deleteCategory($id){
        $this->load->model('admin/categories_model');
        $this->categories_model->deleteCategory($id);
        redirect('/admin/categories/getCategories', 'refresh');
    }
}



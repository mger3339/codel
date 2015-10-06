<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('check') != TRUE) {
            redirect('admin/login');
        }
    }

    public function addCategory()
    {
        $this->load->view('admin/header_view');
        $this->load->view('admin/side_bar_view');
        $this->load->view('admin/add_category_view');
        $this->load->view('admin/footer_view');
    }

    public function editCategory()
    {
        $this->load->model('admin/categories_model');
        $category['data'] = $this->categories_model->getCategoryAll();
        $this->load->view('admin/header_view');
        $this->load->view('admin/side_bar_view');
        $this->load->view('admin/edit_category_view', $category);
        $this->load->view('admin/footer_view');
    }

    public function checkCategory()
    {
        $area = $this->input->post('category_name');
        $result = 0;
        $this->load->model('admin/categories_model');
        $category = $this->categories_model->getCategoryAll();
        $myrow = array();
        foreach ($category as $value) :
            array_push($myrow, $value['category_name']);
        endforeach;
        if (in_array($area, $myrow)) {
            $result = 1;
        }
        $json['result'] = $result;
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($json));
    }

    public function deleteCategory()
    {
        $this->load->model('admin/categories_model');
        $category['category'] = $this->categories_model->getCategoryAll();
        $this->load->view('admin/header_view');
        $this->load->view('admin/side_bar_view');
        $this->load->view('admin/delete_category_view', $category);
        $this->load->view('admin/footer_view');
    }

    public function getCategories()
    {
        $this->load->model('admin/categories_model');
        $category = $this->categories_model->getCategoryAll();
        $arr['category'] = $category;
        $this->load->view('admin/header_view');
        $this->load->view('admin/side_bar_view');
        $this->load->view('admin/categories_all_view', $arr);
        $this->load->view('admin/footer_view');
    }

    public function saveCategory()
    {
        $category_id = $this->input->post('hidden_id_category');
        $category_name = trim($this->input->post('category_name'));
        if (empty($category_name)) {
            redirect('admin/categories/getCategories', 'refresh');
        } else {
            $this->load->model('admin/categories_model');
            $data = $this->categories_model->getCategoryAll();
            $myrow = array();
            foreach ($data as $value) :
                array_push($myrow, $value['category_name']);
            endforeach;
            if (in_array($category_name, $myrow)) {
                redirect('admin/categories/getCategories', 'refresh');
            } else {
                $category = array('category_name' => $category_name);
            }
            if (empty($category_id)) {
                $this->categories_model->saveCategory($category);
                redirect('admin/categories/getCategories');
            } else {
                $this->load->model('admin/categories_model');
                $this->categories_model->updateCategory($category, $category_id);
                redirect('admin/categories/editCategory');
            }
        }
    }

    public function deleteCategoryById($id)
    {
        $this->load->model('admin/categories_model');
        $this->categories_model->deleteCategory($id);
        redirect('/admin/categories/deleteCategory');
    }
}



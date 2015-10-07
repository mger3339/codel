<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
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

    public function editCategory($id)
    {
        $this->load->model('admin/categories_model');
        $category['data'] = $this->categories_model->getCategoryById($id);
        $this->load->view('admin/header_view');
        $this->load->view('admin/side_bar_view');
        $this->load->view('admin/edit_category_view', $category);
        $this->load->view('admin/footer_view');
    }

    public function checkCategory()
    {
        $area = $this->input->post('category_name');
        $category_id = $this->input->post('hidden_id_category');
        $result = 0;
        $this->load->model('admin/categories_model');
        $category = $this->categories_model->getCategoryNotId($category_id);
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

    public function getCategories()
    {
        if($this->session->flashdata('is_saved'))
        {
            $arr['is_saved'] = true;
        }
        if($this->session->flashdata('is_deleted'))
        {
            $arr['is_deleted'] = true;
        }
        if($this->session->flashdata('is_changed'))
        {
            $arr['is_changed'] = true;
        }
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
            redirect('admin/categories');
        } else {
            $this->load->model('admin/categories_model');
            $data = $this->categories_model->getCategoryAll();
            $myrow = array();
            foreach ($data as $value) :
                array_push($myrow, $value['category_name']);
            endforeach;
            if (in_array($category_name, $myrow)) {
                redirect('admin/categories');
            } else {
                $category = array('category_name' => $category_name);
            }
            if (empty($category_id)) {
                if($this->categories_model->saveCategory($category))
                {
                    $this->session->set_flashdata('is_saved',true);
                }
                redirect('admin/categories');
            } else {
                $this->load->model('admin/categories_model');
                if($this->categories_model->updateCategory($category, $category_id))
                {
                    $this->session->set_flashdata('is_changed',true);
                }
                redirect('admin/categories');
            }
        }
    }

    public function deleteCategoryById($id)
    {
        $this->load->model('admin/categories_model');
        if($this->categories_model->deleteCategory($id))
        {
            $this->session->set_flashdata('is_deleted',true);
        }
        redirect('/admin/categories');
    }
}



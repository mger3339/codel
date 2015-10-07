<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        if ($this->session->userdata('check') != TRUE) {
            redirect('admin/login');
        }
    }

    public function index()
    {
        if($this->session->flashdata('is_added'))
        {
            $data['is_added'] = true;
        }
        if($this->session->flashdata('is_edited'))
        {
            $data['is_edited'] = true;
        }
        $limit = 3;
        if ($this->uri->segment(4) !== null && is_numeric($this->uri->segment(4))) {
            $offset = ($this->uri->segment(4) * $limit) - $limit;
        } else {
            $offset = 0;
        }

        $config['base_url'] = base_url("admin/products/index/");
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
        $this->load->model('admin/products_model');
        $data_product = $this->products_model->getproduct($limit, $offset);
        $data['data_product'] = $data_product;
        $this->load->view('admin/header_view');
        $this->load->view('admin/side_bar_view');
        $this->load->view('admin/products_view', $data);
        $this->load->view('admin/footer_view');
    }

    public function addProduct()
    {
        $this->load->model('admin/categories_model');
        $data_category = $this->categories_model->getCategoryAll();
        $this->load->model('admin/areas_model');
        $data_area = $this->areas_model->getArea();
        $arr['category'] = $data_category;
        $arr['area'] = $data_area;
        $this->load->view('admin/header_view');
        $this->load->view('admin/side_bar_view');
        $this->load->view('admin/add_product_view', $arr);
        $this->load->view('admin/footer_view');
    }

    public function saveProduct()
    {
        if ($this->input->post('submit')) {
            $form_rules = array(
                array(
                    'field' => 'name',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'price',
                    'rules' => 'required|numeric'
                ),
                array(
                    'field' => 'total',
                    'rules' => 'required|numeric'
                )
            );
            $this->load->library('form_validation');
            $this->form_validation->set_rules($form_rules);
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/header_view');
                $this->load->view('admin/side_bar_view');
                $this->load->view('admin/addProduct_view');
                $this->load->view('admin/footer_view');
            } else {
                $id = $this->input->post('hid_id');
                $name = $this->input->post('name');
                $desc = $this->input->post('desc');
                $price = $this->input->post('price');
                $total = $this->input->post('total');
                $category = $this->input->post('category');
                $country = $this->input->post('country');
                $config['upload_path'] = './assets/img';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['overwrite'] = true;
                //$config['file_name'] = md5(strtotime('now'));
                //$config['max_width'] = '1024';
                //$config['max_height'] = '768';
                $this->load->library('upload', $config);
                $this->upload->do_upload();
                $arr = $this->upload->data();
                $img = $arr['file_name'];
                $product = array(
                    'name' => $name,
                    'desc' => $desc,
                    'price' => $price,
                    'area_id' => $country,
                    'category_id' => $category,
                    'img' => $img,
                    'total' => $total,
                );
                if ($product['img'] == '') {
                    $this->load->model('admin/products_model');
                    $myrow = $this->products_model->getEditProduct($id);
                    $product['img'] = $myrow['0']['img'];
                }
                if (empty($id)) {
                    $this->load->model('admin/products_model');
                    if($this->products_model->saveProduct($product)){
                        $this->session->set_flashdata('is_added',true);
                    }
                    redirect('/admin/products');
                } else {
                    $this->load->model('admin/products_model');
                    if($this->products_model->saveEditProduct($product, $id)){
                        $this->session->set_flashdata('is_edited',true);
                    }
                    redirect('/admin/products');
                }
            }
        } else {
            $this->load->view('admin/addProduct_view');
        }

    }

    public function deleteProduct()
    {
        $id = $this->input->post('id');
        $this->load->model('admin/products_model');
        $this->products_model->deleteProduct($id);
        $this->products_model->deleteFromCart($id);
        $this->products_model->deleteFromOrders($id);
        $result = 1;
        echo $result;
    }

    public function editProduct($id)
    {
        $myrow = array();
        $this->load->model('admin/products_model');
        $data = $this->products_model->getProducts();
        foreach ($data as $value):
            array_push($myrow, $value['id']);
        endforeach;
        if (!in_array($id, $myrow)) {
            redirect('admin/products');
        }
        $edit_product = $this->products_model->getEditProduct($id);
        $arr['edit_product'] = $edit_product;
        $area_id = $arr['edit_product']['0']['area_id'];
        $category_id = $arr['edit_product']['0']['category_id'];
        $this->load->model('admin/categories_model');
        $data_category = $this->categories_model->getCategoryNotId($category_id);
        $this->load->model('admin/areas_model');
        $data_area = $this->areas_model->getAreaNotId($area_id);
        $arr['myrow'] = $data_category;
        $arr['data'] = $data_area;
        $this->load->view('admin/header_view');
        $this->load->view('admin/side_bar_view');
        $this->load->view('admin/edit_product_view', $arr);
        $this->load->view('admin/footer_view');
    }
}



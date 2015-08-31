<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Areas extends CI_Controller {

    public function productViewByArea($id){
        if($this->session->userdata('chack') == TRUE)
        {
            $this->load->model('admin/areas_model');
            $data_product = $this->areas_model->getProductArea($id);
            $myrow['data_product'] = $data_product;
            $this->load->view('admin/header_view');
            $this->load->view('admin/side_bar_view');
            $this->load->view('admin/product_areas_view',$myrow);
            $this->load->view('admin/footer_view');
        }
        else
        {
            $this->load->view('admin/login_view');
        }
    }

    public function getArea(){
        if($this->session->userdata('chack') == TRUE)
        {
            $this->load->model('admin/areas_model');
            $area = $this->areas_model->getArea();
            $arr['area'] = $area;
            $this->load->view('admin/header_view');
            $this->load->view('admin/side_bar_view');
            $this->load->view('admin/areas_view',$arr);
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
        $this->load->model('admin/areas_model');
        $this->areas_model->deleteProduct($id);
        $result = 1;

    }
}



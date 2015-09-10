<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Areas extends CI_Controller {

    public function productViewByArea($id){
        if($this->session->userdata('check') == TRUE)
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

    public function getArea($id){
        if($this->session->userdata('check') == TRUE)
        {
            $this->load->model('admin/areas_model');
            $area = $this->areas_model->getAreaAll();
            $this->load->model('admin/areas_model');
            $data = $this->areas_model->getAreaById($id);
            $arr['area'] = $area;
            $arr['data'] = $data;
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

    public function getAreas(){
        if($this->session->userdata('check') == TRUE)
        {
            $this->load->model('admin/areas_model');
            $area = $this->areas_model->getArea();
            $arr['area'] = $area;
            $this->load->view('admin/header_view');
            $this->load->view('admin/side_bar_view');
            $this->load->view('admin/areas_all_view',$arr);
            $this->load->view('admin/footer_view');
        }
        else
        {
            $this->load->view('admin/login_view');
        }
    }

    public function saveProduct(){
        if($this->input->post('area_save')) {
            $area_id = $this->input->post('hidden');
            $area_name = $this->input->post('area_name');
            $area = array('country' => $area_name);

            if (empty($area_id))
            {
                $this->load->model('admin/areas_model');
                $this->areas_model->saveArea($area);
                redirect('/admin/areas/getAreas', 'refresh');
            }
            else
            {
                $this->load->model('admin/areas_model');
                $this->areas_model->updateArea($area, $area_id);
                redirect('/admin/areas/getAreas', 'refresh');
            }
        }
    }

    public function deleteProduct(){
        $id = $this->input->post('id');
        echo $id;
        $this->load->model('admin/areas_model');
        $this->areas_model->deleteProduct($id);
        $result = 1;
    }

    public function deleteArea($id){
        $this->load->model('admin/areas_model');
        $this->areas_model->deleteArea($id);
        redirect('/admin/areas/getAreas', 'refresh');
    }
}



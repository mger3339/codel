<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Areas extends CI_Controller
{

    public function productViewByArea($id)
    {
        if ($this->session->userdata('check') == TRUE) {
            $this->load->model('admin/areas_model');
            $data_product = $this->areas_model->getProductArea($id);
            $myrow['data_product'] = $data_product;
            $this->load->view('admin/header_view');
            $this->load->view('admin/side_bar_view');
            $this->load->view('admin/product_areas_view', $myrow);
            $this->load->view('admin/footer_view');
        } else {
            $this->load->view('admin/login_view');
        }
    }

    public function getArea($id)
    {
        if ($this->session->userdata('check') == TRUE) {
            $this->load->model('admin/areas_model');
            $area = $this->areas_model->getAreaAll();
            $myrow = array();
            foreach($area as $value) :
                array_push($myrow, $value['id']);
            endforeach;
            if(!in_array($id, $myrow))
            {
                redirect('admin/areas/getAreas');
            }
            $this->load->model('admin/areas_model');
            $data = $this->areas_model->getAreaById($id);
            $arr['area'] = $area;
            $arr['data'] = $data;
            $this->load->view('admin/header_view');
            $this->load->view('admin/side_bar_view');
            $this->load->view('admin/areas_view', $arr);
            $this->load->view('admin/footer_view');
        } else {
            $this->load->view('admin/login_view');
        }
    }

    /**
     * Get all areas
     *
     * @return array
     */
    public function getAreas()
    {
        if ($this->session->userdata('check') == TRUE) {
            $this->load->model('admin/areas_model');
            $area = $this->areas_model->getArea();
            $arr['area'] = $area;
            $this->load->view('admin/header_view');
            $this->load->view('admin/side_bar_view');
            $this->load->view('admin/areas_all_view', $arr);
            $this->load->view('admin/footer_view');
        } else {
            $this->load->view('admin/login_view');
        }
    }

    public function saveArea()
    {
        if ($this->input->post('area_save'))
        {
            die('test');
            $area_id = $this->input->post('hidden');
            $area_name = $this->input->post('area_name');
            $this->load->model('admin/areas_model');
            $data = $this->areas_model->getArea();
            $myrow = array();
            foreach($data as $value) :
                array_push($myrow, $value['country']);
            endforeach;
            if(in_array($area_name, $myrow))
            {
                redirect('admin/areas/getAreas', 'refresh');
            }
            else
            {
                $area = array('country' => $area_name);
            }
            if (empty($area_id)) {
                $this->load->model('admin/areas_model');
                $this->areas_model->saveArea($area);
                redirect('/admin/areas/getAreas', 'refresh');
            } else {
                $this->load->model('admin/areas_model');
                $this->areas_model->updateArea($area, $area_id);
                redirect('admin/areas/getAreas', 'refresh');
            }
        }
    }

    public function deleteProduct()
    {
        $id = $this->input->post('id');
        $this->load->model('admin/areas_model');
        $this->areas_model->deleteProduct($id);
    }

    public function deleteArea($id)
    {
        $this->load->model('admin/areas_model');
        $this->areas_model->deleteArea($id);
        redirect('admin/areas/getAreas', 'refresh');
    }
}



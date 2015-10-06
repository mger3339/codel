<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Areas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('check') != TRUE) {
            redirect('admin/login');
        }
    }

    public function addArea()
    {
        $this->load->view('admin/header_view');
        $this->load->view('admin/side_bar_view');
        $this->load->view('admin/add_area_view');
        $this->load->view('admin/footer_view');
    }

    public function editArea($id)
    {
        $this->load->model('admin/areas_model');
        $data['coordinates'] = $this->areas_model->getCoordinates($id);
        $data['areas'] = $this->areas_model->getAreaById($id);
        $this->load->view('admin/header_view');
        $this->load->view('admin/side_bar_view');
        $this->load->view('admin/edit_area_view', $data);
        $this->load->view('admin/footer_view');
    }

    public function deleteArea()
    {
        $this->load->model('admin/areas_model');
        $data['data'] = $this->areas_model->getAreaAll();
        $this->load->view('admin/header_view');
        $this->load->view('admin/side_bar_view');
        $this->load->view('admin/delete_area_view', $data);
        $this->load->view('admin/footer_view');
    }


    public function getAreas()
    {
        if($this->session->userdata('is_saved'))
        {
            $arr['is_saved'] = true;
            $this->session->unset_userdata('is_saved');
        }
        if($this->session->userdata('is_deleted'))
        {
            $arr['is_deleted'] = true;
            $this->session->unset_userdata('is_deleted');
        }
        if($this->session->userdata('is_changed'))
        {
            $arr['is_changed'] = true;
            $this->session->unset_userdata('is_changed');
        }
        $this->load->model('admin/areas_model');
        $area = $this->areas_model->getArea();
        $arr['area'] = $area;
        $this->load->view('admin/header_view');
        $this->load->view('admin/side_bar_view');
        $this->load->view('admin/areas_all_view', $arr);
        $this->load->view('admin/footer_view');
    }

    public function saveArea()
    {
        if ($this->input->post()) {
            $area_id = ($this->input->post('hidden_id_area'));
            $area_name = trim($this->input->post('area_name'));
            $latitude = trim($this->input->post('latitude'));
            $longitude = trim($this->input->post('longitude'));
            if (empty($area_id)) {
                if (empty($area_name) || empty($latitude) || empty($longitude)) {
                    redirect('admin/areas/addArea');
                } else {
                    $this->load->model('admin/areas_model');
                    $data = $this->areas_model->getArea();
                    $myrow = array();
                    foreach ($data as $value) :
                        array_push($myrow, $value['country']);
                    endforeach;
                    if (in_array($area_name, $myrow)) {
                        redirect('admin/areas/addArea');
                    } else {
                        $area = array('country' => $area_name);
                        $this->load->model('admin/areas_model');
                        $data = $this->areas_model->saveArea($area);
                        $country_id = $data[0]['id'];
                        $coordinates = array(
                            'latitude' => $latitude,
                            'longitude' => $longitude,
                            'country_id' => $country_id,
                        );
                        if($this->areas_model->saveCoordinates($coordinates))
                        {
                            $this->session->set_userdata('is_saved',true);
                        }
                        redirect('/admin/areas/getAreas');
                    }

                }
            } else {
                $this->load->model('admin/areas_model');
                $data = $this->areas_model->getAreaNotId($area_id);
                $myrow = array();
                foreach ($data as $value) :
                    array_push($myrow, $value['country']);
                endforeach;
                if (in_array($area_name, $myrow)) {
                    redirect('admin/areas');
                }
                $coordinates = array(
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                    'country_id' => $area_id
                );
                $area = array('country' => $area_name);
                $this->load->model('admin/areas_model');
                if($this->areas_model->updateCoordinates($coordinates, $area_id) || $this->areas_model->updateArea($area, $area_id))
                {
                    $this->session->set_userdata('is_changed',true);
                }
                redirect('admin/areas');
            }
        }
    }

    public function getCoordinates()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('area');
        $this->load->model('admin/areas_model');
        $this->areas_model->updateCoordinatesById($id);
        $data = $this->areas_model->getCoordinates($id);
        echo json_encode($data);
    }

    public function deleteAreaById($id)
    {
        $this->load->model('admin/areas_model');

        if($this->areas_model->deleteArea($id))
        {
            $this->session->set_userdata('is_deleted',true);
        }
        $this->areas_model->deleteCoordinates($id);
        redirect('admin/areas');
    }

    public function checkArea()
    {
        $result = 0;
        $area_id = $this->input->post('hidden_id_area');
        $area = $this->input->post('area_name');
        $this->load->model('admin/areas_model');
        $data = $this->areas_model->getAreaNotId($area_id);
        $myrow = array();
        foreach ($data as $value) :
            array_push($myrow, $value['country']);
        endforeach;
        if (in_array($area, $myrow)) {
            $result = 1;
        }
        $json['result'] = $result;
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($json));
    }
}


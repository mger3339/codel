<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller
{

    public function index()
    {
        $this->load->model('admin/slider_model');
        $data['images'] = $this->slider_model->getSliderImages();
        $this->load->view('admin/header_view');
        $this->load->view('admin/side_bar_view');
        $this->load->view('admin/slider_images_view', $data);
        $this->load->view('admin/footer_view');
    }

    public function addPhoto()
    {
        $this->load->view('admin/header_view');
        $this->load->view('admin/side_bar_view');
        $this->load->view('admin/add_image_slider_view');
        $this->load->view('admin/footer_view');

    }

    public function savePhoto()
    {
        $config['upload_path'] = './assets/img_slider';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $this->load->library('upload', $config);
        $this->upload->do_upload();
        $arr = $this->upload->data();
        $img = $arr['file_name'];
        if (empty($img)) {
            redirect('admin/slider/index');
        }
        $data = array('img' => $img);
        $this->load->model('admin/slider_model');
        $this->slider_model->addImage($data);
        redirect('admin/slider/index');
    }

    public function editPhoto()
    {
        $this->load->model('admin/slider_model');
        $data['images'] = $this->slider_model->getSliderImages();
        $this->load->view('admin/header_view');
        $this->load->view('admin/side_bar_view');
        $this->load->view('admin/edit_slider_view', $data);
        $this->load->view('admin/footer_view');
    }

    public function editSliderImage($id)
    {
        $this->load->model('admin/slider_model');
        $data['images'] = $this->slider_model->getSliderImagesById($id);
        $this->load->view('admin/header_view');
        $this->load->view('admin/side_bar_view');
        $this->load->view('admin/edit_slider_image_view', $data);
        $this->load->view('admin/footer_view');
    }

    public function editImage($id)
    {
        $config['upload_path'] = './assets/img_slider';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $this->load->library('upload', $config);
        $this->upload->do_upload();
        $arr = $this->upload->data();
        $img = $arr['file_name'];
        if (empty($img)) {
            redirect('admin/slider/editSliderImage/' . $id);
        }
        $data = array('img' => $img);
        $this->load->model('admin/slider_model');
        $this->slider_model->updateImage($id, $data);
        redirect('admin/slider/editSliderImage/' . $id);
    }

    public function deletePhoto()
    {
        $this->load->model('admin/slider_model');
        $data['images'] = $this->slider_model->getSliderImages();
        $this->load->view('admin/header_view');
        $this->load->view('admin/side_bar_view');
        $this->load->view('admin/delete_slider_view', $data);
        $this->load->view('admin/footer_view');
    }

    public function deleteImage($id)
    {
        $this->load->model('admin/slider_model');
        $this->slider_model->deletePhoto($id);
        redirect('admin/slider/deletePhoto');
    }
}



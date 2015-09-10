<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        if($this->session->userdata('check') == TRUE)
        {
            $this->load->view('admin/header_view');
            $this->load->view('admin/side_bar_view');
            $this->load->view('admin/index_view');
            $this->load->view('admin/footer_view');
        }
        else
        {
            $this->load->view('admin/login_view');
        }

    }
}



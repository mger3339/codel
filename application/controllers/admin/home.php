<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('check') != TRUE)
        {
            redirect('admin/admin');
        }
    }

    public function index()
    {
            $this->load->view('admin/header_view');
            $this->load->view('admin/side_bar_view');
            $this->load->view('admin/index_view');
            $this->load->view('admin/footer_view');

    }
}



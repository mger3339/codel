<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
            $login = $this->input->post('login');
            $password = md5($this->input->post('password'));
            $this->load->model('admin/login_model');
            $admin_user = $this->login_model->getAdmin();
            foreach ($admin_user as $value)
            {
                $log = $value['first_name'];
                $pass = $value['password'];
            }
            if (isset($login) && isset($password))
            {
                if ($login == $log && $password == $pass)
                {
                    $admin = array(
                        'name' => 'admin',
                        'login' => $log,
                        'password' => $pass,
                        'check' => TRUE
                    );
                    $this->session->set_userdata($admin);
                    $this->load->view('admin/header_view');
                    $this->load->view('admin/side_bar_view');
                    $this->load->view('admin/index_view');
                    $this->load->view('admin/footer_view');
                }
                else
                {
                    echo "Wrong Login or Password";
                    $this->load->view('admin/login_view');
                }
            }
            else
            {
                $this->load->view('admin/login_view');
            }
    }

    public function logOut()
    {
        $this->session->sess_destroy();
        redirect('admin/admin');
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    public function index()
    {
        $this->load->view('admin/login_view');
    }

    public function signIn()
    {
        $login = $this->input->post('login');
        $password = md5($this->input->post('password'));
        $this->load->model('admin/login_model');
        $admin_user = $this->login_model->getAdmin();
        foreach ($admin_user as $value) {
            $log = $value['first_name'];
            $pass = $value['password'];
        }
        if (isset($login) && isset($password)) {
            if ($login == $log && $password == $pass) {
                $admin = array(
                    'name' => 'admin',
                    'login' => $log,
                    'password' => $pass,
                    'check' => TRUE
                );
                $this->session->set_userdata($admin);
                redirect('admin/home');
            } else {
                redirect('admin/login');
            }
        } else {
            redirect('admin/login');
        }
    }

    public function checkLogin()
    {
        $result = 0;
        $login = $this->input->post('login');
        $password = md5($this->input->post('password'));
        $this->load->model('admin/login_model');
        $admin_user = $this->login_model->getAdmin();
        foreach ($admin_user as $value) {
            $log = $value['first_name'];
            $pass = $value['password'];
        }

        if($login == $log && $password == $pass)
        {
            $result = 1;
        }
        $admin = array(
                    'name' => 'admin',
                    'login' => $log,
                    'password' => $pass,
                    'check' => TRUE
                );
        $this->session->set_userdata($admin);
        echo $result;
    }

    public function logOut()
    {
        $this->session->sess_destroy();
        redirect('admin/login');
    }
}
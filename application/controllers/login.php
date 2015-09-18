<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

    public function index(){
        $this->load->view('frontend/header_login_view');
        $this->load->view('frontend/registration_view');
        $this->load->view('frontend/footer_view');
    }

    public function registration(){
        $firs_name = trim($this->input->post('first_name'));
        $last_name = trim($this->input->post('last_name'));
        $email = trim($this->input->post('email'));
        $password = trim(md5($this->input->post('password')));
        $password_confirmation = trim(md5($this->input->post('password_confirmation')));
        if(trim($this->input->post('password')) == ''){
            unset($password);
        }
        if(trim($this->input->post('password_confirmation') == '')){
            unset($password_confirmation);
        }
        if(empty($firs_name) || empty($last_name) || empty($email) || empty($password) || empty($password_confirmation)){
            echo "<p style='text-align: center; color: red; font-size: 22px'>EMPTY FIELD, PLEASE ENTER ALL FIELDS</p>";
        }
        else {
            if($password != $password_confirmation){
                echo "<p style='text-align: center; color: red; font-size: 22px'>Wrong paswords</p>";
            }
            else {
                $this->load->model('frontend/login_model');
                $users = $this->login_model->getUsers();
                $data_email = array();
                foreach($users as $value) :
                    array_push($data_email, $value['email']);
                endforeach;
                if(in_array($email, $data_email)) {
                    echo "<p style='text-align: center; color: red; font-size: 22px'>E-mail is already registered,enter  the other e-mail</p>";
                }
                else{
                    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                        echo "<p style='text-align: center; color: red; font-size: 22px'>Enter corrcet E-mail</p>";
                    }
                    else{
                        $data = array(
                            'first_name' => $firs_name,
                            'last_name' => $last_name,
                            'email' => $email,
                            'password' => $password
                        );
                        $this->load->model('frontend/login_model');
                        $this->login_model->UserRegistration($data);
                        echo "<p style='text-align: center; color: red; font-size: 22px'>Registration successful</p>";
                        redirect('login');
                    }

                }
            }
        }
    }

    public function entry(){
        $email_login = trim($this->input->post('email_login'));
        $password_login = trim(md5($this->input->post('password_login')));
        $remember = $this->input->post('remember');
        if(trim($this->input->post('email_login')) == ''){
            unset($email_login);
        }
        if(trim($this->input->post('password_login')) == ''){
            unset($password_login);
        }
        if(empty($email_login) || empty($password_login)){
            echo "<p style='text-align: center; color: red; font-size: 22px'>Empty field</p>";
        }
        else {
            if(!filter_var($email_login,FILTER_VALIDATE_EMAIL)) {
                echo "<p style='text-align: center; color: red; font-size: 22px'>Enter corrcet E-mail</p>";
            }
            else {
                $this->load->model('frontend/login_model');
                $users = $this->login_model->getUsers();
                $data_email = array();
                $data_password = array();
                foreach($users as $value) :
                    array_push($data_email, $value['email']);
                endforeach;
                foreach($users as $value) :
                    array_push($data_password, $value['password']);
                endforeach;
                if(!in_array($email_login,$data_email) || !in_array($password_login,$data_password)){
                    echo "<p>ERROR</p>";
                }
                else {
                    echo "ok";
                }
            }
        }
    }
}

//
//echo "<pre>";
//print_r($data); die;
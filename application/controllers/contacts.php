<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller
{

    public function sendMail()
    {
        $submit = trim($this->input->post('submit'));
        $name = trim($this->input->post('name'));
        $lastname = trim($this->input->post('lastname'));
        $message = trim($this->input->post('message'));
        $email = trim($this->input->post('email'));
        $this->load->helper('email');
        if (isset($submit)) {
            if (!empty($name) && !empty($lastname) && !empty($email) && !empty($message)) {
                if (filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
                    $config['protocol'] = "smtp";
                    $config['smtp_host'] = "ssl://smtp.gmail.com";
                    $config['smtp_port'] = "465";
                    $config['smtp_user'] = "mger33389@gmail.com";
                    $config['smtp_pass'] = "111zxcvbnm111";
                    $config['charset'] = "utf-8";


                    $this->email->initialize($config);

                    $this->email->from($email, $name); // change it to yours
                    $this->email->to("mger33389@gmail.com");// change it to yours

                    $this->email->subject('Тест Email');
                    $this->email->message($message);

                    if (!$this->email->send()) {
                        // Raise error message
                        show_error($this->email->print_debugger());
                    } else {
                        // Show success notification or other things here
                        echo 'Success to send email';
                    }
                } else {
                    echo 'Wrong E-mail';
                }
            } else {
                echo "All fields must be filled necessarily";
            }
        }
    }
}
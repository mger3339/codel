<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function getUsers()
    {
        $this->db->where('role', 1);
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function UserRegistration($data)
    {
        $this->db->insert('users', $data);
    }

    public function getUsersByEmail($email)
    {
        $this->db->where('email', $email);
        $this->db->where('role', 1);
        $query = $this->db->get('users');
        return $query->result_array();
    }
}

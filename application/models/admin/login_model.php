<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function getAdmin()
    {
        $this->db->where('role', 0);
        $query = $this->db->get('users');
        return $query->result_array();
    }
}

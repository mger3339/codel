<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function getAdmin()
    {
        $query = $this->db->get('admin');
        return $query->result_array();
    }
}

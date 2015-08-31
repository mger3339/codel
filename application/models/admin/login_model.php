<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
    public function getUsers(){
        $query = $this->db->get('users');
        return $query->result_array();
    }
}

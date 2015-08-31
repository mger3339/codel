<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Areas_model extends CI_Model {

    public function getProductArea($id){
        $this->db->select('*');
        $this->db->from('areas');
        $this->db->join('products', 'products.area_id = areas.id', 'left');
        $this->db->where('area_id', $id);
        $data = $this->db->get();
        return $data->result_array();
    }
    public function getArea(){
        $query = $this->db->get('areas');
        return $query->result_array();
    }

    public function deleteProduct($id){
        $this->db->where('id', $id);
        $this->db->delete('products');
    }
}

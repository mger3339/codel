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

    public function getAreaAll(){
        $query = $this->db->get('areas');
        return $query->result_array();
    }

    public function getAreaById($id){
        $this->db->where('id', $id);
        $data = $this->db->get('areas');
        return $data->result_array();
    }

    public function saveArea($area){
        $this->db->insert('areas',$area);
    }

    public function updateArea($area, $area_id)
    {
        $this->db->where('id', $area_id);
        $this->db->update('areas', $area);
    }

    public function deleteArea($id){
        $this->db->where('id', $id);
        $this->db->delete('areas');
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories_model extends CI_Model {

    public function getProductCategory($id){
        $this->db->select('
            products.*,
            category.category_name,
            ');
        $this->db->from('products');
        $this->db->join('category', 'products.category_id = category.id', 'left');
        $this->db->where('category_id', $id);
        $data = $this->db->get();
        return $data->result_array();
    }
    public function getCategory(){
        $query = $this->db->get('category');
        return $query->result_array();
    }

    public function deleteProduct($id){
        $this->db->where('id', $id);
        $this->db->delete('products');
    }
}

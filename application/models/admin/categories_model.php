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
    public function getCategoryAll(){
        $query = $this->db->get('category');
        return $query->result_array();
    }

    public function deleteProduct($id){
        $this->db->where('id', $id);
        $this->db->delete('products');
    }

    public function saveCategory($category){
        $this->db->insert('category',$category);
    }
    public function deleteCategory($id){
        $this->db->where('id', $id);
        $this->db->delete('category');
    }
    public function updateCategory($category, $category_id)
    {
        $this->db->where('id', $category_id);
        $this->db->update('category', $category);
    }

    public function getCategoryById($id){
        $this->db->where('id', $id);
        $data = $this->db->get('category');
        return $data->result_array();
    }
}

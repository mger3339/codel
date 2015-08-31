<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model {

    public function getProduct($num, $offset){
        $this->db->order_by('id', 'desc ');
        $this->db->limit($num, $offset);
        $query = $this->db->get('products');
        return $query->result_array();
    }

    public function saveProduct($product){
        $this->db->insert('products',$product);
    }

    public function deleteProduct($id){
        $this->db->where('id', $id);
        $this->db->delete('products');
    }

    public function getEditProduct($id){
        $this->db->where('id', $id);
        $product = $this->db->get('products');
        return $product->result_array();
    }

    public function saveEditProduct($product,$id){
        $this->db->where('id', $id);
        $this->db->update('products',$product);
    }
}

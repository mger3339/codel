<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model
{

    public function getProduct($num, $offset)
    {
        $this->db->limit($num, $offset);
        $this->db->select('
            products.*,
            category.category_name,
            areas.country
            ');
        $this->db->from('products');
        $this->db->join('category', 'products.category_id = category.id', 'left');
        $this->db->join('areas', 'products.area_id = areas.id', 'left');
        $this->db->order_by('products.id', 'desc ');
        $data = $this->db->get();
        return $data->result_array();
    }

    public function saveProduct($product)
    {
        $this->db->insert('products', $product);
        if($this->db->affected_rows()>0)
        {
            return true;
        }
        return false;
    }

    public function deleteProduct($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('products');
    }

    public function deleteFromCart($id)
    {
        $this->db->where('product_id', $id);
        $this->db->delete('cart');
    }
    public function deleteFromOrders($id)
    {
        $this->db->where('product_id', $id);
        $this->db->delete('orders');
    }

    public function getEditProduct($id)
    {
        $this->db->select('
            products.*,
            category.category_name,
            areas.country
            ');
        $this->db->from('products');
        $this->db->join('category', 'products.category_id = category.id', 'left');
        $this->db->join('areas', 'products.area_id = areas.id', 'left');
        $this->db->where('products.id', $id);
        $data = $this->db->get();
        return $data->result_array();
    }

    public function saveEditProduct($product, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('products', $product);
        if($this->db->affected_rows()>0)
        {
            return true;
        }
        return false;
    }

    public function getProductAll()
    {
        $this->db->select('
            products.*,
            category.category_name,
            areas.country
            ');
        $this->db->from('products');
        $this->db->join('category', 'products.category_id = category.id', 'left');
        $this->db->join('areas', 'products.area_id = areas.id', 'left');
        $data = $this->db->get();
        return $data->result_array();
    }
    public function getProducts()
    {
        $data = $this->db->get('products');
        return $data->result_array();
    }
}

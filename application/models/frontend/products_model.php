<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model {

    public function sliderImg(){
        $this->db->order_by('id', 'random');
//        $this->db->limit(5);
        $query = $this->db->get('slider');
        return $query->result_array();
    }
    public function getProduct($num, $offset){
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

    public function getProductPage($id){
        $this->db->select('
            products.*,
            category.category_name,
            areas.country
            ');
        $this->db->from('products');
        $this->db->join('category', 'products.category_id = category.id', 'left');
        $this->db->join('areas', 'products.area_id = areas.id', 'left');
        $this->db->where('products.id', $id);
        $this->db->order_by('products.id', 'desc ');
        $data = $this->db->get();
        return $data->result_array();
    }

    public function addCartProduct($cart){
        $this->db->insert('cart',$cart);
    }

    public function editCartProduct($id, $count){
        $this->db->set('count', $count);
        $this->db->where('product_id', $id);
        $this->db->update('cart');
    }

    public function getCartProduct(){
        $data = $this->db->get('cart');
        return $data->result_array();
    }

    public function getCartProductById($id){
        $this->db->where('product_id', $id);
        $data = $this->db->get('cart');
        return $data->result_array();
    }

    public function getProductCartPage(){
        $this->db->select('
            products.*,
            category.category_name,
            areas.country,
            cart.product_id,
            cart.count
            ');
        $this->db->from('products');
        $this->db->join('category', 'products.category_id = category.id', 'right');
        $this->db->join('areas', 'products.area_id = areas.id', 'right');
        $this->db->join('cart', 'products.id = cart.product_id', 'right');
        $data = $this->db->get();
        return $data->result_array();
    }
    public function getTotalProduct($id)
    {
        $this->db->select('total');
        $this->db->where('id', $id);
        $total = $this->db->get('products');
        return $total->result_array();
    }

    public function deleteProduct($id)
    {
        $this->db->where('product_id', $id);
        $this->db->delete('cart');
    }

    public function getShipping(){
        $data = $this->db->get('shipping');
        return $data->result_array();
    }

    public function addProductBuy($orders){
        $this->db->insert('orders',$orders);
    }

    public function getOrders($id){
        $this->db->where('product_id', $id);
        $data = $this->db->get('orders');
        return $data->result_array();
    }

    public function getCoordinates($area){
        $this->db->where('country', $area);
        $data = $this->db->get('coordinates');
        return $data->result_array();
    }

    public function getOrdersById($id){
        $this->db->where('id', $id);
        $data = $this->db->get('orders');
        return $data->result_array();
    }

    public function getAllProduct($product_id){
        $this->db->select('
            products.*,
            category.category_name,
            areas.country
            ');
        $this->db->from('products');
        $this->db->join('category', 'products.category_id = category.id', 'left');
        $this->db->join('areas', 'products.area_id = areas.id', 'left');
        $this->db->where('products.id', $product_id);
        $this->db->order_by('products.id', 'desc ');
        $data = $this->db->get();
        return $data->result_array();
    }
    public function getProductById($product_id){
        $this->db->where('id', $product_id);
        $data = $this->db->get('products');
        return $data->result_array();
    }
    public function updateTotalProduct($product_id, $new_total){
        $this->db->set('total', $new_total);
        $this->db->where('id', $product_id);
        $this->db->update('products');
    }

}
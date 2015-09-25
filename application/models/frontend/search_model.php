<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_model extends CI_Model
{
    public function search($data){
        //print_r($data); die;
        $this->db->select('
        products.*,
        category.category_name,
        areas.country
        ');
        $this->db->from('products');
        $this->db->join('category', 'products.category_id = category.id', 'left');
        $this->db->join('areas', 'products.area_id = areas.id', 'left');
        if($data['text'] && !empty($data['text']))
        {
            $this->db->group_start();
            $this->db->like('name', $data['text']);
            $this->db->or_like('desc', $data['text']);
            $this->db->group_end();
        }
        if($data['areas'] && !empty($data['areas']))
        {
            $this->db->where('country', $data['areas']);
        }
        if($data['category'] && !empty($data['category']))
        {
            $this->db->where('category_name', $data['category']);
        }
        if($data['from'] && !empty($data['from']))
        {
            $this->db->where('price >=', $data['from']);
        }
        if($data['to'] && !empty($data['to']))
        {
            $this->db->where('price <=', $data['to']);
        }

//        echo $this->db->last_query(); die;
        return $this->db->get()->result_array();
    }
}

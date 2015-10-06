<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_model extends CI_Model
{
    public function search($data, $text)
    {
        $this->db->select('
        products.*,
        category.category_name,
        areas.country
        ');
        $this->db->from('products');
        $this->db->join('category', 'products.category_id = category.id', 'left');
        $this->db->join('areas', 'products.area_id = areas.id', 'left');
        if ($text && !empty($text)) {
            foreach ($text as $key => $value) :
                $this->db->group_start();
                $this->db->like('name', $value);
                $this->db->or_like('desc', $value);
                $this->db->group_end();
            endforeach;
        }
        if ($data['areas'] && !empty($data['areas'])) {
            $this->db->where('country', $data['areas']);
        }
        if ($data['category'] && !empty($data['category'])) {
            $this->db->where('category_name', $data['category']);
        }
        if ($data['from'] && !empty($data['from'])) {
            $this->db->where('price >=', $data['from']);
        }
        if ($data['to'] && !empty($data['to'])) {
            $this->db->where('price <=', $data['to']);
        }
        return $this->db->get()->result_array();
    }

    public function liveSearch($text)
    {
        $this->db->select('
        products.*,
        category.category_name,
        areas.country
        ');
        $this->db->from('products');
        $this->db->join('category', 'products.category_id = category.id', 'left');
        $this->db->join('areas', 'products.area_id = areas.id', 'left');
        if ($text && !empty($text)) {
            foreach ($text as $key => $value) :
                $this->db->group_start();
                $this->db->like('name', $value);
                $this->db->group_end();
            endforeach;
        }
        return $this->db->get()->result_array();
    }
}

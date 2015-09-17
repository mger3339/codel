<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_model extends CI_Model
{

    public function addImage($data)
    {
        $this->db->insert('slider', $data);
    }

    public function getSliderImages()
    {
        $query = $this->db->get('slider');
        return $query->result_array();
    }

    public function getSliderImagesById($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('slider');
        return $query->result_array();
    }

    public function updateImage($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('slider', $data);
    }

    public function deletePhoto($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('slider');
    }
}

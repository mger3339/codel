<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Areas_model extends CI_Model
{

    public function getArea()
    {
        $query = $this->db->get('areas');
        return $query->result_array();
    }

    public function getAreaAll()
    {
        $query = $this->db->get('areas');
        return $query->result_array();
    }

    public function getAreaById($id)
    {
        $this->db->where('id', $id);
        $data = $this->db->get('areas');
        return $data->result_array();
    }

    public function saveArea($area, $coordinates)
    {
        $this->db->insert('coordinates', $coordinates);
        $this->db->insert('areas', $area);
    }

    public function updateArea($area, $area_id)
    {
        $this->db->where('id', $area_id);
        $this->db->update('areas', $area);
    }

    public function updateCoordinates($coordinates, $area_id)
    {
        $this->db->where('country_id', $area_id);
        $this->db->update('coordinates', $coordinates);
    }

    public function updateCoordinatesById($id,$name)
    {
        $this->db->set('country_id', $id);
        $this->db->where('country', $name);
        $this->db->update('coordinates');
    }

    public function deleteArea($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('areas');
    }

    public function deleteCoordinates($id)
    {
        $this->db->where('country_id', $id);
        $this->db->delete('coordinates');
    }

    public function getCoordinates($id)
    {
        $this->db->select('
            coordinates.*,
            areas.country,
            ');
        $this->db->from('coordinates');
        $this->db->where('coordinates.country_id', $id);
        $this->db->join('areas', 'coordinates.country_id = areas.id', 'left');
        $data = $this->db->get();
        return $data->result_array();
    }
}

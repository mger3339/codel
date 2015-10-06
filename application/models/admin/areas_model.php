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

    public function saveArea($area)
    {
        $this->db->insert('areas', $area);
        $this->db->where('country', $area['country']);
        $data = $this->db->get('areas');
        return $data->result_array();
    }

    public function saveCoordinates($coordinates)
    {
        $this->db->insert('coordinates', $coordinates);
        if($this->db->affected_rows()>0)
        {
            return true;
        }
        return false;
    }

    public function updateArea($area, $area_id)
    {
        $this->db->where('id', $area_id);
        $this->db->update('areas', $area);
        if($this->db->affected_rows()>0)
        {
            return true;
        }
        return false;
    }

    public function updateCoordinates($coordinates, $area_id)
    {
        $this->db->where('country_id', $area_id);
        $this->db->update('coordinates', $coordinates);
        if($this->db->affected_rows()>0)
        {
            return true;
        }
        return false;
    }

    public function updateCoordinatesById($id)
    {
        $this->db->set('country_id', $id);
        $this->db->where('country_id', $id);
        $this->db->update('coordinates');
    }

    public function deleteArea($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('areas');
        if($this->db->affected_rows()>0)
        {
            return true;
        }
        return false;
    }

    public function deleteCoordinates($id)
    {
        $this->db->where('country_id', $id);
        $this->db->delete('coordinates');
    }

    public function getCoordinates($id)
    {
        $this->db->where('country_id', $id);
        $data = $this->db->get('coordinates');
        return $data->result_array();
    }

    public function getAreaNotId($area_id)
    {
        $this->db->where_not_in('id', $area_id);
        $query = $this->db->get('areas');
        return $query->result_array();
    }
}

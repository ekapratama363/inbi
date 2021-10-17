<?php

class Vision_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_vision()
    {
    
        $query = $this->db
                ->select('*')
                ->from('visions')
                ->get();

        return $query->row_object();

    }

    public function set_vision($data) 
    {
        $this->db->insert('visions', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function get_vision_by_id($id)
    {
    
        $query = $this->db
                ->select('*')
                ->from('visions')
                ->where('visions.id', $id)
                ->get();

        return $query->row_object();
    }

    public function update_vision_by_id($id, $data)
    {
        $query = $this->db->where('id', $id)->update('visions', $data);

        return $query;
    }

}
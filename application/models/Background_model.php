<?php

class Background_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_background($type)
    {
    
        $query = $this->db
                ->select('*')
                ->from('backgrounds')
                ->where('type', $type)
                ->get();

        return $query->row_object();

    }

    public function set_background($data) 
    {
        $this->db->insert('backgrounds', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function get_background_by_id($id)
    {
    
        $query = $this->db
                ->select('*')
                ->from('backgrounds')
                ->where('backgrounds.id', $id)
                ->get();

        return $query->row_object();
    }

    public function update_background_by_id($id, $data)
    {
        $query = $this->db->where('id', $id)->update('backgrounds', $data);

        return $query;
    }

}
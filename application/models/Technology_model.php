<?php

class Technology_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_technology()
    {
    
        $query = $this->db
                ->select('*')
                ->from('technologies')
                ->get();

        return $query->row_object();

    }

    public function set_technology($data) 
    {
        $this->db->insert('technologies', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function get_technology_by_id($id)
    {
    
        $query = $this->db
                ->select('*')
                ->from('technologies')
                ->where('technologies.id', $id)
                ->get();

        return $query->row_object();
    }

    public function update_technology_by_id($id, $data)
    {
        $query = $this->db->where('id', $id)->update('technologies', $data);

        return $query;
    }

}
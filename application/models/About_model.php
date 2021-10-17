<?php

class About_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_about()
    {
    
        $query = $this->db
                ->select('*')
                ->from('abouts')
                ->get();

        return $query->row_object();

    }

    public function set_about($data) 
    {
        $this->db->insert('abouts', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function get_about_by_id($id)
    {
    
        $query = $this->db
                ->select('*')
                ->from('abouts')
                ->where('abouts.id', $id)
                ->get();

        return $query->row_object();
    }

    public function update_about_by_id($id, $data)
    {
        $query = $this->db->where('id', $id)->update('abouts', $data);

        return $query;
    }

}
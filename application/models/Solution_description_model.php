<?php

class Solution_description_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_solution_description()
    {
    
        $query = $this->db
                ->select('*')
                ->from('solution_descriptions')
                ->get();

        return $query->row_object();

    }

    public function set_solution_description($data) 
    {
        $this->db->insert('solution_descriptions', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function get_solution_description_by_id($id)
    {
    
        $query = $this->db
                ->select('*')
                ->from('solution_descriptions')
                ->where('solution_descriptions.id', $id)
                ->get();

        return $query->row_object();
    }

    public function update_solution_description_by_id($id, $data)
    {
        $query = $this->db->where('id', $id)->update('solution_descriptions', $data);

        return $query;
    }

}
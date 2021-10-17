<?php

class Policy_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_policy()
    {
    
        $query = $this->db
                ->select('*')
                ->from('policies')
                ->get();

        return $query->row_object();

    }

    public function set_policy($data) 
    {
        $this->db->insert('policies', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function get_policy_by_id($id)
    {
    
        $query = $this->db
                ->select('*')
                ->from('policies')
                ->where('policies.id', $id)
                ->get();

        return $query->row_object();
    }

    public function update_policy_by_id($id, $data)
    {
        $query = $this->db->where('id', $id)->update('policies', $data);

        return $query;
    }

}
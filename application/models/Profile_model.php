<?php

class Profile_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_profile()
    {
    
        $query = $this->db
                ->select('*')
                ->from('profiles')
                ->get();

        return $query->row_object();

    }

    public function set_profile($data) 
    {
        $this->db->insert('profiles', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function get_profile_by_id($id)
    {
    
        $query = $this->db
                ->select('*')
                ->from('profiles')
                ->where('profiles.id', $id)
                ->get();

        return $query->row_object();
    }

    public function update_profile_by_id($id, $data)
    {
        $query = $this->db->where('id', $id)->update('profiles', $data);

        return $query;
    }

}
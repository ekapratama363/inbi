<?php

class Mission_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_mission()
    {
    
        $query = $this->db
                ->select('*')
                ->from('missions')
                ->get();

        return $query->row_object();

    }

    public function set_mission($data) 
    {
        $this->db->insert('missions', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function get_mission_by_id($id)
    {
    
        $query = $this->db
                ->select('*')
                ->from('missions')
                ->where('missions.id', $id)
                ->get();

        return $query->row_object();
    }

    public function update_mission_by_id($id, $data)
    {
        $query = $this->db->where('id', $id)->update('missions', $data);

        return $query;
    }

}
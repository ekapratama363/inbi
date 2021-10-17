<?php

class Vision_mission_image_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_vision_mission()
    {
    
        $query = $this->db
                ->select('*')
                ->from('vision_mission_images')
                ->get();

        return $query->row_object();

    }

    public function set_vision_mission($data) 
    {
        $this->db->insert('vision_mission_images', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function get_vision_mission_by_id($id)
    {
    
        $query = $this->db
                ->select('*')
                ->from('vision_mission_images')
                ->where('vision_mission_images.id', $id)
                ->get();

        return $query->row_object();
    }

    public function update_vision_mission_by_id($id, $data)
    {
        $query = $this->db->where('id', $id)->update('vision_mission_images', $data);

        return $query;
    }

}
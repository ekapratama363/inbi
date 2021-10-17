<?php

class Certificate_image_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_certificate_image()
    {
    
        $query = $this->db
                ->select('*')
                ->from('certificate_images')
                ->get();

        return $query->row_object();

    }

    public function set_certificate_image($data) 
    {
        $this->db->insert('certificate_images', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function get_certificate_image_by_id($id)
    {
    
        $query = $this->db
                ->select('*')
                ->from('certificate_images')
                ->where('certificate_images.id', $id)
                ->get();

        return $query->row_object();
    }

    public function update_certificate_image_by_id($id, $data)
    {
        $query = $this->db->where('id', $id)->update('certificate_images', $data);

        return $query;
    }

}
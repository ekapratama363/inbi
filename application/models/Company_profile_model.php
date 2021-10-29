<?php

class Company_profile_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_company_profile()
    {
    
        $query = $this->db
                ->select('*')
                ->from('company_profiles')
                ->get();

        $query = $query->row_object();


        if($query) {
            $social_medias = json_decode($query->social_medias);
            $query->type = $social_medias->type;
            $query->link = $social_medias->link;
        }

        return $query;
    }

    public function set_profile($data) 
    {
        $this->db->insert('company_profiles', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function get_company_profile_by_id($id)
    {
    
        $query = $this->db
                ->select('*')
                ->from('company_profiles')
                ->where('company_profiles.id', $id)
                ->get();

        $query = $query->row_object();


        if($query) {
            $social_medias = json_decode($query->social_medias);
            $query->type = $social_medias->type;
            $query->link = $social_medias->link;
        }

        return $query;
    }

    public function update_company_profile_by_id($id, $data)
    {
        $query = $this->db->where('id', $id)->update('company_profiles', $data);

        return $query;
    }

}
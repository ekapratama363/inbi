<?php

class Product_description_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_data($is_halal = null)
    {
        $query = $this->db
                ->select('*')
                ->from('product_descriptions');

        if ($is_halal !== null) {
            $query = $query->where('is_halal', $is_halal);
        }

        $query = $query->get();

        return $query->row_object();

    }

    public function set_data($data) 
    {
        $this->db->insert('product_descriptions', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function get_data_by_id($id)
    {
    
        $query = $this->db
                ->select('*')
                ->from('product_descriptions')
                ->where('product_descriptions.id', $id)
                ->get();

        return $query->row_object();
    }

    public function update_data_by_id($id, $data)
    {
        $query = $this->db->where('id', $id)->update('product_descriptions', $data);

        return $query;
    }

}
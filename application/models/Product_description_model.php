<?php

class Product_description_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function set_product_description($data) 
    {
        return $this->db->insert('product_descriptions', $data);
    }

    public function get_ajax_list_product_description($data = NULL)
    {
        $match = isset($data['search']) ? $data['search'] : '';
        
        $query = $this->db->where('(title LIKE \'%'.$match.'%\')')
                ->order_by('id', isset($data['order']) ? 'desc' : 'asc');
                
        if(isset($data['length']) && isset($data['start'])) {
            $query = $query->limit($data['length'], $data['start']);
        }

        $query = $query->get('product_descriptions');

        return $query->result_object();
    }

    public function get_product_description_by_id($id)
    {
        $query = $this->db->get_where('product_descriptions', ['id' => $id]);

        return $query->row_object();
    }

    public function update_product_description_by_id($id, $data)
    {
        $query = $this->db->where('id', $id)->update('product_descriptions', $data);

        return $query;
    }

    public function delete_product_description_by_id($id)
    {
        $this->db->where(['id' => $id]);
	    $this->db->delete('product_descriptions');
    }

    public function ajax_get_product_description($q = NULL)
    {
        if($q) {
            $this->db->like('title', $q);
        } else {
            $this->db->limit(15);
        }

        $query = $this->db->get('product_descriptions');

        return $query->result_object();
    }

    public function get_product_description()
    {
        $query = $this->db->order_by('id', 'desc')
                ->get('product_descriptions'); 

        return $query->result_object();
    }

}
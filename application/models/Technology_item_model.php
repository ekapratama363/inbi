<?php

class Technology_item_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function set_technology_item($data) 
    {
        return $this->db->insert('technology_items', $data);
    }

    public function get_ajax_list_technology_item($data = NULL)
    {
        $match = isset($data['search']) ? $data['search'] : '';
        
        $query = $this->db->where('(title LIKE \'%'.$match.'%\')')
                ->order_by('id', isset($data['order']) ? 'desc' : 'asc');
                
        if(isset($data['length']) && isset($data['start'])) {
            $query = $query->limit($data['length'], $data['start']);
        }

        $query = $query->get('technology_items');

        return $query->result_object();
    }

    public function get_technology_item_by_id($id)
    {
        $query = $this->db->get_where('technology_items', ['id' => $id]);

        return $query->row_object();
    }

    public function update_technology_item_by_id($id, $data)
    {
        $query = $this->db->where('id', $id)->update('technology_items', $data);

        return $query;
    }

    public function delete_technology_item_by_id($id)
    {
        $this->db->where(['id' => $id]);
	    $this->db->delete('technology_items');
    }

    public function ajax_get_technology_item($q = NULL)
    {
        if($q) {
            $this->db->like('title', $q);
        } else {
            $this->db->limit(15);
        }

        $query = $this->db->get('technology_items');

        return $query->result_object();
    }

    public function get_technology_item()
    {
        $query = $this->db->order_by('id', 'desc')
                ->get('technology_items'); 

        return $query->result_object();
    }

}
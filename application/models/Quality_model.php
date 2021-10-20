<?php

class Quality_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function set_quality($data) 
    {
        return $this->db->insert('qualities', $data);
    }

    public function get_ajax_list_quality($data = NULL)
    {
        $match = isset($data['search']) ? $data['search'] : '';
        
        $query = $this->db->where('(title LIKE \'%'.$match.'%\')')
                ->order_by('id', isset($data['order']) ? 'desc' : 'asc');
                
        if(isset($data['length']) && isset($data['start'])) {
            $query = $query->limit($data['length'], $data['start']);
        }

        $query = $query->get('qualities');

        return $query->result_object();
    }

    public function get_quality_by_id($id)
    {
        $query = $this->db->get_where('qualities', ['id' => $id]);

        return $query->row_object();
    }

    public function update_quality_by_id($id, $data)
    {
        $query = $this->db->where('id', $id)->update('qualities', $data);

        return $query;
    }

    public function delete_quality_by_id($id)
    {
        $this->db->where(['id' => $id]);
	    $this->db->delete('qualities');
    }

    public function ajax_get_quality($q = NULL)
    {
        if($q) {
            $this->db->like('title', $q);
        } else {
            $this->db->limit(15);
        }

        $query = $this->db->get('qualities');

        return $query->result_object();
    }

    public function get_quality()
    {
        $query = $this->db->order_by('id', 'desc')
                ->get('qualities'); 

        return $query->result_object();
    }

}
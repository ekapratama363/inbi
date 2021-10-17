<?php

class Raw_material_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function set_raw_material($data) 
    {
        return $this->db->insert('raw_materials', $data);
    }

    public function get_ajax_list_raw_material($data = NULL)
    {
        $match = isset($data['search']) ? $data['search'] : '';
        
        $query = $this->db->where('(title LIKE \'%'.$match.'%\')')
                ->order_by('id', isset($data['order']) ? 'desc' : 'asc');
                
        if(isset($data['length']) && isset($data['start'])) {
            $query = $query->limit($data['length'], $data['start']);
        }

        $query = $query->get('raw_materials');

        return $query->result_object();
    }

    public function get_raw_material_by_id($id)
    {
        $query = $this->db->get_where('raw_materials', ['id' => $id]);

        return $query->row_object();
    }

    public function update_raw_material_by_id($id, $data)
    {
        $query = $this->db->where('id', $id)->update('raw_materials', $data);

        return $query;
    }

    public function delete_raw_material_by_id($id)
    {
        $this->db->where(['id' => $id]);
	    $this->db->delete('raw_materials');
    }

    public function ajax_get_raw_material($q = NULL)
    {
        if($q) {
            $this->db->like('title', $q);
        } else {
            $this->db->limit(15);
        }

        $query = $this->db->get('raw_materials');

        return $query->result_object();
    }

    public function get_raw_material()
    {
        $query = $this->db->order_by('id', 'desc')
                ->get('raw_materials'); 

        return $query->result_object();
    }

}
<?php

class Made_of_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function set_made_of($data) 
    {
        return $this->db->insert('made_ofs', $data);
    }

    public function get_ajax_list_made_of($data = NULL)
    {
        $match = isset($data['search']) ? $data['search'] : '';
        
        $query = $this->db->where('(title LIKE \'%'.$match.'%\')')
                ->order_by('id', isset($data['order']) ? 'desc' : 'asc');
                
        if(isset($data['length']) && isset($data['start'])) {
            $query = $query->limit($data['length'], $data['start']);
        }

        $query = $query->get('made_ofs');

        return $query->result_object();
    }

    public function get_made_of_by_id($id)
    {
        $query = $this->db->get_where('made_ofs', ['id' => $id]);

        return $query->row_object();
    }

    public function update_made_of_by_id($id, $data)
    {
        $query = $this->db->where('id', $id)->update('made_ofs', $data);

        return $query;
    }

    public function delete_made_of_by_id($id)
    {
        $this->db->where(['id' => $id]);
	    $this->db->delete('made_ofs');
    }

    public function ajax_get_made_of($q = NULL)
    {
        if($q) {
            $this->db->like('title', $q);
        } else {
            $this->db->limit(15);
        }

        $query = $this->db->get('made_ofs');

        return $query->result_object();
    }

    public function get_made_of()
    {
        $query = $this->db->order_by('id', 'desc')
                ->get('made_ofs'); 

        return $query->result_object();
    }

}
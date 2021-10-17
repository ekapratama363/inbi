<?php

class Certificate_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function set_certificate($data) 
    {
        return $this->db->insert('certificates', $data);
    }

    public function get_ajax_list_certificate($data = NULL)
    {
        $match = isset($data['search']) ? $data['search'] : '';
        
        $query = $this->db->where('(title LIKE \'%'.$match.'%\')')
                ->order_by('id', isset($data['order']) ? 'desc' : 'asc');
                
        if(isset($data['length']) && isset($data['start'])) {
            $query = $query->limit($data['length'], $data['start']);
        }

        $query = $query->get('certificates');

        return $query->result_object();
    }

    public function get_certificate_by_id($id)
    {
        $query = $this->db->get_where('certificates', ['id' => $id]);

        return $query->row_object();
    }

    public function update_certificate_by_id($id, $data)
    {
        $query = $this->db->where('id', $id)->update('certificates', $data);

        return $query;
    }

    public function delete_certificate_by_id($id)
    {
        $this->db->where(['id' => $id]);
	    $this->db->delete('certificates');
    }

    public function ajax_get_certificate($q = NULL)
    {
        if($q) {
            $this->db->like('title', $q);
        } else {
            $this->db->limit(15);
        }

        $query = $this->db->get('certificates');

        return $query->result_object();
    }

    public function get_certificate()
    {
        $query = $this->db->order_by('id', 'desc')
                ->get('certificates'); 

        return $query->result_object();
    }

}
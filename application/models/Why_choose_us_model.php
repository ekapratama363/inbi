<?php

class Why_choose_us_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function set_why_choose_us($data) 
    {
        return $this->db->insert('why_choose_us', $data);
    }

    public function get_ajax_list_why_choose_us($data = NULL)
    {
        $match = isset($data['search']) ? $data['search'] : '';
        
        $query = $this->db->where('(title LIKE \'%'.$match.'%\')')
                ->order_by('id', isset($data['order']) ? 'desc' : 'asc');
                
        if(isset($data['length']) && isset($data['start'])) {
            $query = $query->limit($data['length'], $data['start']);
        }

        $query = $query->get('why_choose_us');

        return $query->result_object();
    }

    public function get_why_choose_us_by_id($id)
    {
        $query = $this->db->get_where('why_choose_us', ['id' => $id]);

        return $query->row_object();
    }

    public function update_why_choose_us_by_id($id, $data)
    {
        $query = $this->db->where('id', $id)->update('why_choose_us', $data);

        return $query;
    }

    public function delete_why_choose_us_by_id($id)
    {
        $this->db->where(['id' => $id]);
	    $this->db->delete('why_choose_us');
    }

    public function ajax_get_why_choose_us($q = NULL)
    {
        if($q) {
            $this->db->like('title', $q);
        } else {
            $this->db->limit(15);
        }

        $query = $this->db->get('why_choose_us');

        return $query->result_object();
    }

    public function get_why_choose_us()
    {
        $query = $this->db->order_by('id', 'desc')
                ->get('why_choose_us'); 

        return $query->result_object();
    }

}
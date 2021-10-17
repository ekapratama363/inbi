<?php

class Customer_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function set_customer($data) 
    {
        return $this->db->insert('customers', $data);
    }

    public function get_ajax_list_customer($data = NULL)
    {
        $match = isset($data['search']) ? $data['search'] : '';
        
        $query = $this->db->where('(name LIKE \'%'.$match.'%\')')
                ->order_by('id', isset($data['order']) ? 'desc' : 'asc');
                
        if(isset($data['length']) && isset($data['start'])) {
            $query = $query->limit($data['length'], $data['start']);
        }

        $query = $query->get('customers');

        return $query->result_object();
    }

    public function get_customer_by_id($id)
    {
        $query = $this->db->get_where('customers', ['id' => $id]);

        return $query->row_object();
    }

    public function update_customer_by_id($id, $data)
    {
        $query = $this->db->where('id', $id)->update('customers', $data);

        return $query;
    }

    public function delete_customer_by_id($id)
    {
        $this->db->where(['id' => $id]);
	    $this->db->delete('customers');
    }

    public function ajax_get_customer($q = NULL)
    {
        if($q) {
            $this->db->like('name', $q);
        } else {
            $this->db->limit(15);
        }

        $query = $this->db->get('customers');

        return $query->result_object();
    }

    public function get_customer()
    {
        $query = $this->db->order_by('id', 'desc')
                ->get('customers'); 

        return $query->result_object();
    }

}
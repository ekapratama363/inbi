<?php

class Contact_message_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function set_contact_message($data) 
    {
        return $this->db->insert('contact_messages', $data);
    }

    public function get_ajax_list_contact_message($data = NULL)
    {
        $match = isset($data['search']) ? $data['search'] : '';
        
        $query = $this->db->select('*')
                ->where('(name LIKE \'%'.$match.'%\' 
                            or email LIKE \'%'.$match.'%\'
                            or message LIKE \'%'.$match.'%\')')
                ->order_by('id', isset($data['order']) ? 'desc' : 'asc');
                
        if(isset($data['length']) && isset($data['start'])) {
            $query = $query->limit($data['length'], $data['start']);
        }

        $query = $query->get('contact_messages');

        return $query->result_object();
    }

    public function delete_contact_message_by_array_id($id)
    {
        $query = $this->db->where_in('id', $id)->delete('contact_messages');

        return $query;
    }

    public function delete_contact_message_by_id($id)
    {
        $this->db->where(['id' => $id]);
	    $this->db->delete('contact_messages');
    }
}
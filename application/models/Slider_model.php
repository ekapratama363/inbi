<?php

class Slider_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function set_slider($data) 
    {
        return $this->db->insert('sliders', $data);
    }

    public function get_ajax_list_slider($data = NULL)
    {
        $match = isset($data['search']) ? $data['search'] : '';
        
        $query = $this->db->where('(title LIKE \'%'.$match.'%\')')
                ->order_by('id', isset($data['order']) ? 'desc' : 'asc');
                
        if(isset($data['length']) && isset($data['start'])) {
            $query = $query->limit($data['length'], $data['start']);
        }

        $query = $query->get('sliders');

        return $query->result_object();
    }

    public function get_slider_by_id($id)
    {
        $query = $this->db->get_where('sliders', ['id' => $id]);

        return $query->row_object();
    }

    public function update_slider_by_id($id, $data)
    {
        $query = $this->db->where('id', $id)->update('sliders', $data);

        return $query;
    }

    public function delete_slider_by_id($id)
    {
        $this->db->where(['id' => $id]);
	    $this->db->delete('sliders');
    }

    public function ajax_get_slider($q = NULL)
    {
        if($q) {
            $this->db->like('title', $q);
        } else {
            $this->db->limit(15);
        }

        $query = $this->db->get('sliders');

        return $query->result_object();
    }

    public function get_slider()
    {
        $query = $this->db->order_by('id', 'desc')
                ->get('sliders'); 

        return $query->result_object();
    }

}
<?php

class What_we_do_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_what_we_do()
    {
    
        $query = $this->db
                ->select('*')
                ->from('what_we_dos')
                ->get();

        return $query->row_object();

    }

    public function set_what_we_do($data) 
    {
        $this->db->insert('what_we_dos', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function get_what_we_do_by_id($id)
    {
    
        $query = $this->db
                ->select('*')
                ->from('what_we_dos')
                ->where('what_we_dos.id', $id)
                ->get();

        return $query->row_object();
    }

    public function update_what_we_do_by_id($id, $data)
    {
        $query = $this->db->where('id', $id)->update('what_we_dos', $data);

        return $query;
    }

}
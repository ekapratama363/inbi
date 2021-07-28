<?php

class Master_mesin_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function select2_master_mesin($q = NULL)
    {
        if($q) {
            $this->db->like('kode_mesin', $q);
        } else {
            $this->db->limit(15);
        }

        $query = $this->db->get('master_mesin');

        return $query->result_object();
    }


    public function get_by_id($id)
    {
        $query = $this->db
                ->where('id_mesin', $id)
                ->get('master_mesin');

        return $query->row_object();
    }

}
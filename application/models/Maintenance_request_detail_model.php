<?php

class Maintenance_request_detail_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function insert_batch($data) 
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(FALSE); # See Note 01. If you wish can remove as well 

        $this->db->insert_batch('mtr_detail', $data); # Inserting data

        $this->db->trans_complete(); # Completing transaction

        /*Optional*/

        if ($this->db->trans_status() === FALSE) {
            # Something went wrong.
            $this->db->trans_rollback();
            return FALSE;
        } 
        else {
            # Everything is Perfect. 
            # Committing data to the database.
            $this->db->trans_commit();
            return TRUE;
        }
    }

    public function update_batch($data, $id) 
    {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(FALSE); # See Note 01. If you wish can remove as well 

        $this->db->update_batch('mtr_detail', $data, 'id_mtr_head'); # Inserting data

        $this->db->trans_complete(); # Completing transaction

        /*Optional*/

        if ($this->db->trans_status() === FALSE) {
            # Something went wrong.
            $this->db->trans_rollback();
            return FALSE;
        } 
        else {
            # Everything is Perfect. 
            # Committing data to the database.
            $this->db->trans_commit();
            return TRUE;
        }
    }
    
    public function get_by_id_mtr_head($id)
    {

        $query = $this->db
                ->select('*')
                ->from('mtr_detail')
                ->join('master_mesin', 'master_mesin.id_mesin = mtr_detail.id', 'left')
                ->where('mtr_detail.id_mtr_head', $id)
                ->get();
        
        return $query->result_object();
    }

}
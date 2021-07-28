<?php

class Maintenance_request_detail_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function insert_batch_maintenance_requests_detail($data) 
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

}
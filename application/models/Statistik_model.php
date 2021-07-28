<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistik_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function stock()
    {
        $query = $this->db->query("SELECT * FROM master_brg_rm_stock WHERE kode_barang != '' ORDER BY stock_awal DESC LIMIT 5");
        $hasil = $query->result();
        $query->free_result();
        return $hasil;
    }
}
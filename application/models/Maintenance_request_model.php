<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Maintenance_request_model extends CI_Model {
  public function filter($search, $limit, $start, $order_field, $order_ascdesc){
    $this->db->like('no_bukti_mtr', $search); // Untuk menambahkan query where LIKE
    $this->db->or_like('kode_ddi_mtr', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('kode_machine', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('nama_machine', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('pic_requester', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('grup_user', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('tgl_req', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('status', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('no_bukti_wo', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('user_closed', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('id_mtr', $search); // Untuk menambahkan query where OR LIKE
    $this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
    $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT
    return $this->db->get('mtr_head')->result_array(); // Eksekusi query sql sesuai kondisi diatas
  }
  public function count_all(){
    return $this->db->count_all('mtr_head'); // Untuk menghitung semua data siswa
  }
  public function count_filter($search)
  {
    $this->db->like('no_bukti_mtr', $search); // Untuk menambahkan query where LIKE
    $this->db->or_like('kode_ddi_mtr', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('kode_machine', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('nama_machine', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('pic_requester', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('grup_user', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('tgl_req', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('status', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('no_bukti_wo', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('user_closed', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('id_mtr', $search); // Untuk menambahkan query where OR LIKE
    return $this->db->get('mtr_head')->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
  }

  function getMasterById($id_mtr)
  { 
    $this->db->where('id_mtr', $id_mtr);
    return $this->db->get('mtr_head');
  }
}
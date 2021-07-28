<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
    public function index()
    {
        $data['users'] = $this->db->get_where('id_user',['id_user' => $this->session->userdata('username')])->row_array();
        echo 'Selamat datang', $data['users']['id_user'];
    }
}

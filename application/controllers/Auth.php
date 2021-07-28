<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->form_validation->run() == false) 
		{
			$data['title'] = 'SSK Program';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		}	
		else
		{
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user',['email' => $username])->row_array();
		
		if($user)
		{
			if(password_verify($password, $user['password']))
			{
				$data = [
					'id_user' => $user['id_user'],
					'grup_user' => $user['grup_user']
				];
				$this->session->set_userdata($data);
				redirect('user');
			}
			else
			{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Username tidak terdaftar</div>');
				redirect('auth');
			}
		}
		else
		{
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Username tidak terdaftar</div>');
			redirect('auth');
		}
	}
}

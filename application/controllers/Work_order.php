<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Work_order extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		//$this->load->model('Statistik_model');
	}

	public function index()
	{
		$data['title'] = 'SSK Program';
		//$data['stat'] = $this->Statistik_model->stock();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/left_panel');
		$this->load->view('templates/top_panel');

		$this->load->view('master_work_order/list');
		$this->load->view('templates/footer');
	}
}

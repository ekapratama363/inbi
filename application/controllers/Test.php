<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Statistik_model');
	}

	public function index()
	{
		$data['title'] = 'SSK Program';
		$data['stat'] = $this->Statistik_model->stock();
		$this->load->view('templates/test_header', $data);
		$this->load->view('test/chart');
		$this->load->view('templates/test_footer');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // for load helper
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        
        $this->load->model('Company_profile_model');
    }

    public function index()
    {
        $data['filePage'] = 'frontend/pages/home/index';

        $data['company_profile'] = $this->Company_profile_model->get_company_profile();

        $this->load->view('frontend/app', $data);
    }

}
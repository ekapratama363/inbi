<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Policy extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // for load helper
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->load->model('Policy_model');
        $this->load->model('Company_profile_model');
        $this->load->model('Background_model');
    }

    public function index()
    {
        $data['filePage'] = 'frontend/pages/policy/index';

        $data['company_profile'] = $this->Company_profile_model->get_company_profile();
        $data['policy'] = $this->Policy_model->get_policy();
        $data['background'] = $this->Background_model->get_background($this->uri->segment(1));

        $this->load->view('frontend/app', $data);
    }

}
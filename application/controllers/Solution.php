<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solution extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // for load helper
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        
        $this->load->model('Company_profile_model');
        $this->load->model('Certificate_model');
        $this->load->model('Certificate_image_model');
        $this->load->model('Solution_description_model');
        $this->load->model('Background_model');
    }

    public function index()
    {
        $data['filePage'] = 'frontend/pages/solution/index';

        $data['solution_description'] = $this->Solution_description_model->get_solution_description();
        $data['certificate_image'] = $this->Certificate_image_model->get_certificate_image();
        $data['certificate'] = $this->Certificate_model->get_certificate();
        $data['company_profile'] = $this->Company_profile_model->get_company_profile();
        $data['background'] = $this->Background_model->get_background($this->uri->segment(1));

        $this->load->view('frontend/app', $data);
    }

}
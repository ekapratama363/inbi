<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // for load helper
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->load->model('About_model');
        $this->load->model('Company_profile_model');
        $this->load->model('Customer_model');
        $this->load->model('Vision_model');
        $this->load->model('Mission_model');
        $this->load->model('Vision_mission_image_model');
        $this->load->model('Background_model');
        $this->load->model('Certificate_model');
        $this->load->model('Made_of_model');
    }

    public function index()
    {
        
        $data['filePage'] = 'frontend/pages/about/index';

        $data['company_profile'] = $this->Company_profile_model->get_company_profile();
        $data['about'] = $this->About_model->get_about();

        $data['background'] = $this->Background_model->get_background($this->uri->segment(1));
        $data['certificates'] = $this->Certificate_model->get_certificate();
        $data['madeofs'] = $this->Made_of_model->get_made_of();

        $mission = $this->Mission_model->get_mission();
        
        $data['mission'] = $mission;
        if($mission) {
            $mission->missions = json_decode($mission->missions);
        }

        $this->load->view('frontend/app', $data);
    }

}
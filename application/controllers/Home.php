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
        $this->load->model('Made_of_model');
        $this->load->model('Quality_model');
        $this->load->model('What_we_do_model');
        $this->load->model('Technology_model');
        $this->load->model('Technology_item_model');
        $this->load->model('Why_choose_us_model');
        $this->load->model('Profile_model');
        $this->load->model('Slider_model');
    }

    public function index()
    {
        $data['filePage'] = 'frontend/pages/home/index';

        $data['sliders'] = $this->Slider_model->get_slider();
        $data['profile'] = $this->Profile_model->get_profile();
        $data['why_choose_us'] = $this->Why_choose_us_model->get_why_choose_us();
        $data['technology'] = $this->Technology_model->get_technology();
        $data['technology_items'] = $this->Technology_item_model->get_technology_item();
        $data['what_we_do'] = $this->What_we_do_model->get_what_we_do();
        $data['qualities'] = $this->Quality_model->get_quality();
        $data['madeofs'] = $this->Made_of_model->get_made_of();
        $data['company_profile'] = $this->Company_profile_model->get_company_profile();

        $this->load->view('frontend/app', $data);
    }

}
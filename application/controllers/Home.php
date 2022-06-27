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
        $this->load->model('Why_choose_us_model');
        $this->load->model('Profile_model');
        $this->load->model('Slider_model');
        $this->load->model('Article_model');
        $this->load->model('Product_category_model');
    }

    public function index()
    {
        $data['filePage'] = 'frontend/pages/home/index';

        $data['sliders'] = $this->Slider_model->get_slider();
        $data['profile'] = $this->Profile_model->get_profile();
        $data['why_choose_us'] = $this->Why_choose_us_model->get_why_choose_us();
        $data['company_profile'] = $this->Company_profile_model->get_company_profile();
        $data['recent_articles'] = $this->Article_model->get_article(6, 0);
        $data['recent_categories'] = $this->Product_category_model->get_categories(NULL, NULL, NULL, $is_halal = 0);

        $this->load->view('frontend/app', $data);
    }

}
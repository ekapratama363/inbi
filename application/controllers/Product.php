<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // for load helper
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->load->model('Product_description_model');
        $this->load->model('Company_profile_model');
        $this->load->model('Raw_material_model');
    }

    public function index()
    {
        $data['filePage'] = 'frontend/pages/product/index';

        $data['company_profile'] = $this->Company_profile_model->get_company_profile();
        $data['product_description'] = $this->Product_description_model->get_product_description();
        $data['raw_material'] = $this->Raw_material_model->get_raw_material();

        $this->load->view('frontend/app', $data);
    }

}
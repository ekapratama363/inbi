<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_description extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // for load helper
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Product_description_model');
        
		if($this->session->userdata('is_login') != "true"){
			redirect(base_url("admin_panel/auth"));
        }
    }

    public function index($id="")
    {
        $data['filePage'] = 'admin_panel/pages/product_description/create';

        $get_data   = $this->Product_description_model->get_data($is_halal = 1);

        $id         = isset($get_data->id) ? $get_data->id : null;

        $data['value'] = $this->Product_description_model->get_data_by_id($id);

        $this->load->view('admin_panel/app', $data);
    }

    public function update($id="")
    {
        $id = $this->input->post('id');

        $data = [
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'is_halal' => 1,
        ];
        
        $save = $this->Product_description_model->update_data_by_id($id, $data);

        if($save) {
            $this->session->set_flashdata('success', 'save data successfully');
        } else {
            $this->session->set_flashdata('failed', 'save data failed');
        }
        redirect(base_url("admin_panel/product_halals/product_description"));
    }

}
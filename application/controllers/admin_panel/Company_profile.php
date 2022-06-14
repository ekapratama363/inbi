<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company_profile extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // for load helper
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');

		$this->load->helper('upload_file');

        $this->load->model('Company_profile_model');
        
		if($this->session->userdata('is_login') != "true"){
			redirect(base_url("admin_panel/auth"));
        }
    }

    public function index($id="")
    {
        $data['filePage'] = 'admin_panel/pages/company_profile/create';

        $get_company_profile  = $this->Company_profile_model->get_company_profile();
        $company_profile_id   = isset($get_company_profile->id) ? $get_company_profile->id : null;
        $company_profile      = $this->Company_profile_model->get_company_profile_by_id($company_profile_id);
        $data['value']        = $company_profile;

        $this->load->view('admin_panel/app', $data);
    }

    public function update($id="")
    {

        $id = $this->input->post('id');

        $this->form_validation->set_rules('motto', 'motto', 'required');
        $this->form_validation->set_rules('phone', 'phone', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('address', 'address', 'required');

        if ($this->form_validation->run() == FALSE){
            $data['filePage'] = 'admin_panel/pages/company_profile/create';
            
            $this->load->view('admin_panel/app', $data);
        } else {
            $social_medias = [
                'type' => $this->input->post('type'),
                'link' => $this->input->post('link'),
            ];

            $data = [
                'motto' => $this->input->post('motto'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'social_medias' => json_encode($social_medias),
            ];

            $message = "";
            if($_FILES['logo']['name'] || $_FILES['signature']['name']) {
                foreach($_FILES as $key => $file) {
                    if($file['name']) {
                        $upload = upload_file($file, 'company_profile');
                        if($upload == $file['name']) {
                            $image  = [$key => $upload];
                            $data = array_merge($data, $image);
                        } else {
                            $message = $upload;
                        }
                    }
                }
            } 

            $save = $this->Company_profile_model->update_company_profile_by_id($id, $data);
     
            if($message) {
                $this->session->set_flashdata('failed', $message);
            } else {
                $this->session->set_flashdata('success', 'save data successfully');
            }

            redirect(base_url("admin_panel/company_profile"));
        }
    }

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // for load helper
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->load->model('Company_profile_model');
        $this->load->model('Contact_message_model');
    }

    public function index()
    {
        $data['filePage'] = 'frontend/pages/contact/index';

        $data['company_profile'] = $this->Company_profile_model->get_company_profile();

        $this->load->view('frontend/app', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('subject', 'subject', 'required');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        $this->form_validation->set_rules('message', 'message', 'required');

        if ($this->form_validation->run() == FALSE){
            $data['filePage'] = 'frontend/pages/contact/index';

            $data['company_profile'] = $this->Company_profile_model->get_company_profile();
        
            $this->load->view('frontend/app', $data);
        } else {
 
            $data = [
                'name' => $this->input->post('name'),
                'subject' => $this->input->post('subject'),
                'email' => $this->input->post('email'),
                'message' => $this->input->post('message'),
            ];
            
            $this->Contact_message_model->set_contact_message($data);

            $this->session->set_flashdata('success', 'send message successfully');

            redirect(base_url("contact"));
        }
    }


}
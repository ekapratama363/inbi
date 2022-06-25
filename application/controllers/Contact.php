<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Contact extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // for load helper
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->helper('phpmailer_helper');
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->load->model('Company_profile_model');
        $this->load->model('Contact_message_model');
        $this->load->model('Background_model');
    }

    public function index()
    {
        $data['filePage'] = 'frontend/pages/contact/index';

        $data['company_profile'] = $this->Company_profile_model->get_company_profile();
        $data['background'] = $this->Background_model->get_background($this->uri->segment(1));

        $this->load->view('frontend/app', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('subject', 'subject', 'required');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        $this->form_validation->set_rules('message', 'message', 'required');
        $this->form_validation->set_rules('g-recaptcha-response', 'reCAPTCHA', 'required');

        $data['filePage'] = 'frontend/pages/contact/index';
        $data['company_profile'] = $this->Company_profile_model->get_company_profile();
        $data['background'] = $this->Background_model->get_background($this->uri->segment(1));

        if ($this->form_validation->run() == FALSE){
            $this->load->view('frontend/app', $data);
        } else {

            $reCaptcha      = $this->input->post("g-recaptcha-response");
            $secret         = getenv('RECAPTCHA_KEY');
            $verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$reCaptcha");
            $responseData   = json_decode($verifyResponse);

            if(!$responseData->success) {
                $this->session->set_flashdata('error', 'The reCaptcha is not valid');
                redirect(base_url("contact"));
            }

            $to      = getenv("MAIL_RECEIVER");
            $subject = $this->input->post("subject");
            $message = $this->input->post("message") . ". SENDER: " . $this->input->post("email");
            send_email($to, $subject, $message);
 
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
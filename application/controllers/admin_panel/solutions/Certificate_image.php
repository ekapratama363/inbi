<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificate_image extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // for load helper
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');

		$this->load->helper('upload_file');

        $this->load->model('Certificate_image_model');
        
		if($this->session->userdata('is_login') != "true"){
			redirect(base_url("admin_panel/auth"));
        }
    }

    public function index($id="")
    {
        $data['filePage'] = 'admin_panel/pages/certificate_image/create';

        $get_certificate_image     = $this->Certificate_image_model->get_certificate_image();
        $certificate_image_id      = isset($get_certificate_image->id) ? $get_certificate_image->id : null;
        $certificate_image         = $this->Certificate_image_model->get_certificate_image_by_id($certificate_image_id);
        $data['value'] = $certificate_image;

        $this->load->view('admin_panel/app', $data);
    }

    public function update($id="")
    {

        $id = $this->input->post('id');

        // $this->form_validation->set_rules('title', 'title', 'max:100');
        // $this->form_validation->set_rules('description', 'description', 'max:100');

        // if ($this->form_validation->run() == FALSE){
        //     $data['filePage'] = 'admin_panel/pages/certificate_image/create';
            
        //     $this->load->view('admin_panel/app', $data);
        // } else {
            $data = [
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
            ];

            $message = "";
            if($_FILES['image']['name']) {
                foreach($_FILES as $key => $file) {
                    if($file['name']) {
                        $upload = upload_file($file, 'certificate_image');
                        if($upload == $file['name']) {
                            $image  = [$key => $upload];
                            $data = array_merge($data, $image);
                        } else {
                            $message = $upload;
                        }
                    }
                }
            } 

            $save = $this->Certificate_image_model->update_certificate_image_by_id($id, $data);
     
            if($message) {
                $this->session->set_flashdata('failed', $message);
            } else {
                $this->session->set_flashdata('success', 'save data successfully');
            }

            redirect(base_url("admin_panel/solutions/certificate_image"));
        // }
    }

}
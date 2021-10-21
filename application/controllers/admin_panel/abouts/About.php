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

		$this->load->helper('upload_file');

        $this->load->model('About_model');
        
		if($this->session->userdata('is_login') != "true"){
			redirect(base_url("admin_panel/auth"));
        }
        
    }

    public function index($id="")
    {
        $data['filePage'] = 'admin_panel/pages/about/create';

        $get_about     = $this->About_model->get_about();
        $about_id      = isset($get_about->id) ? $get_about->id : null;
        $about         = $this->About_model->get_about_by_id($about_id);
        $data['value'] = $about;

        $this->load->view('admin_panel/app', $data);
    }

    public function update($id="")
    {

        $id = $this->input->post('id');

        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('sub_title', 'sub title', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');

        if ($this->form_validation->run() == FALSE){
            $data['filePage'] = 'admin_panel/pages/about/create';
            
            $this->load->view('admin_panel/app', $data);
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'sub_title' => $this->input->post('sub_title'),
                'description' => $this->input->post('description'),
            ];

            if($_FILES['image_header']['name'] || $_FILES['image_footer']['name']) {
                $message = "";
                foreach($_FILES as $key => $file) {
                    if($file['name']) {
                        $upload = upload_file($file, 'about');
                        if($upload == $file['name']) {
                            $image  = [$key => $upload];
                            $data = array_merge($data, $image);
                        } else {
                            $message = $upload;
                        }
                    }
                }
            } 

            $save = $this->About_model->update_about_by_id($id, $data);
     
            if($message) {
                $this->session->set_flashdata('failed', $message);
            } else {
                $this->session->set_flashdata('success', 'save data successfully');
            }

            redirect(base_url("admin_panel/abouts/about"));
        }
    }

}
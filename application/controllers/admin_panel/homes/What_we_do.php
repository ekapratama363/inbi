<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class What_we_do extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // for load helper
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');

		$this->load->helper('upload_file');

        $this->load->model('What_we_do_model');
        
		if($this->session->userdata('is_login') != "true"){
			redirect(base_url("admin_panel/auth"));
        }
    }

    public function index($id="")
    {
        $data['filePage'] = 'admin_panel/pages/what_we_do/create';

        $get_what_we_do     = $this->What_we_do_model->get_what_we_do();
        $what_we_do_id      = isset($get_what_we_do->id) ? $get_what_we_do->id : null;
        $what_we_do         = $this->What_we_do_model->get_what_we_do_by_id($what_we_do_id);
        $data['value'] = $what_we_do;

        $this->load->view('admin_panel/app', $data);
    }

    public function update($id="")
    {

        $id = $this->input->post('id');

        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');

        if ($this->form_validation->run() == FALSE){
            $data['filePage'] = 'admin_panel/pages/what_we_do/create';
            
            $this->load->view('admin_panel/app', $data);
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
            ];

            if($_FILES['image']['name']) {
                $message = "";
                foreach($_FILES as $key => $file) {
                    if($file['name']) {
                        $upload = upload_file($file, 'what_we_do');
                        if($upload == $file['name']) {
                            $image  = [$key => $upload];
                            $data = array_merge($data, $image);
                        } else {
                            $message = $upload;
                        }
                    }
                }
            } 

            $save = $this->What_we_do_model->update_what_we_do_by_id($id, $data);
     
            if($message) {
                $this->session->set_flashdata('failed', $message);
            } else {
                $this->session->set_flashdata('success', 'save data successfully');
            }

            redirect(base_url("admin_panel/homes/what_we_do"));
        }
    }

}
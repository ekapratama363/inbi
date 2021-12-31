<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Background extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // for load helper
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');

		$this->load->helper('upload_file');

        $this->load->model('Background_model');
        
		if($this->session->userdata('is_login') != "true"){
			redirect(base_url("admin_panel/auth"));
        }
        
    }

    public function index($id="")
    {
        $data['filePage'] = 'admin_panel/pages/about/background';

        $get_background     = $this->Background_model->get_background('About');
        $background_id      = isset($get_background->id) ? $get_background->id : null;
        $background         = $this->Background_model->get_background_by_id($background_id);
        $data['value'] = $background;

        $this->load->view('admin_panel/app', $data);
    }

    public function update($id="")
    {

        $id = $this->input->post('id');

        $this->form_validation->set_rules('title', 'title', 'required');

        if ($this->form_validation->run() == FALSE){
            $data['filePage'] = 'admin_panel/pages/about/background';
            
            $this->load->view('admin_panel/app', $data);
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'type'  => 'About',
            ];

            $message = "";
            if($_FILES['image']['name']) {
                foreach($_FILES as $key => $file) {
                    if($file['name']) {
                        $upload = upload_file($file, 'background');
                        if($upload == $file['name']) {
                            $image  = [$key => $upload];
                            $data = array_merge($data, $image);
                        } else {
                            $message = $upload;
                        }
                    }
                }
            } 

            $save = $this->Background_model->update_background_by_id($id, $data);
     
            if($message) {
                $this->session->set_flashdata('failed', $message);
            } else {
                $this->session->set_flashdata('success', 'save data successfully');
            }

            redirect(base_url("admin_panel/abouts/background"));
        }
    }

}
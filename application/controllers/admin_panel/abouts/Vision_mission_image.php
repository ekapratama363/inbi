<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vision_mission_image extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // for load helper
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');

		$this->load->helper('upload_file');

        $this->load->model('Vision_mission_image_model');
        
		if($this->session->userdata('is_login') != "true"){
			redirect(base_url("admin_panel/auth"));
        }
    }

    public function index($id="")
    {
        $data['filePage'] = 'admin_panel/pages/vision_mission_image/create';

        $get_vision_mission     = $this->Vision_mission_image_model->get_vision_mission();
        $vision_mission_id      = isset($get_vision_mission->id) ? $get_vision_mission->id : null;
        $vision_mission         = $this->Vision_mission_image_model->get_vision_mission_by_id($vision_mission_id);
        $data['value'] = $vision_mission;

        $this->load->view('admin_panel/app', $data);
    }

    public function update($id="")
    {

        $id = $this->input->post('id');

        // $this->form_validation->set_rules('title', 'title', 'max:100');
        // $this->form_validation->set_rules('description', 'description', 'max:100');

        // if ($this->form_validation->run() == FALSE){
        //     $data['filePage'] = 'admin_panel/pages/vision_mission/create';
            
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
                        $upload = upload_file($file, 'vision_mission_image');
                        if($upload == $file['name']) {
                            $image  = [$key => $upload];
                            $data = array_merge($data, $image);
                        } else {
                            $message = $upload;
                        }
                    }
                }
            } 

            $save = $this->Vision_mission_image_model->update_vision_mission_by_id($id, $data);
     
            if($message) {
                $this->session->set_flashdata('failed', $message);
            } else {
                $this->session->set_flashdata('success', 'save data successfully');
            }

            redirect(base_url("admin_panel/abouts/vision_mission_image"));
        // }
    }

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solution_description extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // for load helper
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');

		$this->load->helper('upload_file');

        $this->load->model('Solution_description_model');
        
		if($this->session->userdata('is_login') != "true"){
			redirect(base_url("admin_panel/auth"));
        }
    }

    public function index($id="")
    {
        $data['filePage'] = 'admin_panel/pages/solution_description/create';

        $get_solution_description     = $this->Solution_description_model->get_solution_description();
        $solution_description_id      = isset($get_solution_description->id) ? $get_solution_description->id : null;
        $solution_description         = $this->Solution_description_model->get_solution_description_by_id($solution_description_id);
        $data['value'] = $solution_description;

        $this->load->view('admin_panel/app', $data);
    }

    public function update($id="")
    {

        $id = $this->input->post('id');

        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');

        if ($this->form_validation->run() == FALSE){
            $data['filePage'] = 'admin_panel/pages/solution_description/create';
            
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
                        $upload = upload_file($file, 'solution_description');
                        if($upload == $file['name']) {
                            $image  = [$key => $upload];
                            $data = array_merge($data, $image);
                        } else {
                            $message = $upload;
                        }
                    }
                }
            } 

            $save = $this->Solution_description_model->update_solution_description_by_id($id, $data);
     
            if($message) {
                $this->session->set_flashdata('failed', $message);
            } else {
                $this->session->set_flashdata('success', 'save data successfully');
            }

            redirect(base_url("admin_panel/solutions/solution_description"));
        }
    }

}
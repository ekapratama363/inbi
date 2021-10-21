<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mission extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // for load helper
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');

		$this->load->helper('upload_file');

        $this->load->model('Mission_model');
        
		if($this->session->userdata('is_login') != "true"){
			redirect(base_url("admin_panel/auth"));
        }
    }

    public function index($id="")
    {
        $data['filePage'] = 'admin_panel/pages/mission/create';

        $get_mission     = $this->Mission_model->get_mission();
        $mission_id      = isset($get_mission->id) ? $get_mission->id : null;
        $mission         = $this->Mission_model->get_mission_by_id($mission_id);
        
        if($mission) {
            $mission->missions = json_decode($mission->missions);
        }

        $data['value']   = $mission;

        $this->load->view('admin_panel/app', $data);
    }

    public function update($id="")
    {
        $id = $this->input->post('id');

        $data = [
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'missions' => json_encode($this->input->post('missions')),
        ];
        
        $save = $this->Mission_model->update_mission_by_id($id, $data);

        if($save) {
            $this->session->set_flashdata('success', 'save data successfully');
        } else {
            $this->session->set_flashdata('failed', 'save data failed');
        }
        redirect(base_url("admin_panel/abouts/mission"));
    }

}
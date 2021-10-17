<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vision extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // for load helper
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');

		$this->load->helper('upload_file');

        $this->load->model('Vision_model');
    }

    public function index($id="")
    {
        $data['filePage'] = 'admin_panel/pages/vision/create';

        $get_vision     = $this->Vision_model->get_vision();
        $vision_id      = isset($get_vision->id) ? $get_vision->id : null;
        $vision         = $this->Vision_model->get_vision_by_id($vision_id);
        
        if($vision) {
            $vision->visions = json_decode($vision->visions);
        }

        $data['value']   = $vision;

        $this->load->view('admin_panel/app', $data);
    }

    public function update($id="")
    {
        $id = $this->input->post('id');

        $data = [
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'visions' => json_encode($this->input->post('visions')),
        ];
        
        $save = $this->Vision_model->update_vision_by_id($id, $data);

        if($save) {
            $this->session->set_flashdata('success', 'save data successfully');
        } else {
            $this->session->set_flashdata('failed', 'save data failed');
        }
        redirect(base_url("admin_panel/abouts/vision"));
    }

}
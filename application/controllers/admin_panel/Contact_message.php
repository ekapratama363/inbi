<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_message extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // for load helper
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
		$this->load->helper('upload_file');

        $this->load->model('Contact_message_model');
        $this->load->model('Background_model');
        
		if($this->session->userdata('is_login') != "true"){
			redirect(base_url("admin_panel/auth"));
        }
    }
    
    public function index()
    {
        $data['filePage'] = 'admin_panel/pages/contact_message/index';

        $this->load->view('admin_panel/app', $data);

    }

    public function delete($id = NULL)
    {

        $message = 'Success delete data';

        $this->Contact_message_model->delete_contact_message_by_id($id);

        $this->session->set_flashdata('success', $message);

        redirect(base_url("admin_panel/contact_message/index"));
        
    }

    public function datatable()
    {
        $draw   = $this->input->post('draw');
        $start  = $this->input->post('start');
        $length = $this->input->post('length');

        $search = str_replace("'", "", strtolower($this->input->post('search')['value']));
        $searchTerms = explode(" ",  $search);
        $orderColumn = isset($this->input->post('order')[0]['column']) ? $this->input->post('order')[0]['column'] : '';
        $dir = isset($this->input->post('order')[0]['dir']) ? $this->input->post('order')[0]['dir'] : '';
        
        $array = [];
        if($searchTerms) {
            foreach($searchTerms as $searchTerm){
                $array['search'] = $searchTerm;
            }
        }

        if ($dir === 'asc') {
            $array['order'] = 'desc';
        }

        $totalFiltered = count($this->Contact_message_model->get_ajax_list_contact_message($array));

        //check the length parameter and then take records
        if ($length > 0) {
            $array['start']  = $start;
            $array['length'] = $length;
        }

        $posts = $this->Contact_message_model->get_ajax_list_contact_message($array);

        if(sizeof($posts) > 0) {
            $no = $start;
            foreach($posts as $key => $value) {        
                $no++;

                $check_box = "<input type='checkbox' id='data' name='data[]' class='checkboxes' value='{$value->id}' />";

                $action = "
                    <a onclick='".'return confirm("'."delete this item?".'")'."'
                        href='".base_url()."admin_panel/contact_message/delete/".$value->id."' class='btn btn-danger delete-list'>
                        <i class='fa fa-trash'></i>
                    </a>
                ";

                $posts[$key]->no = $no;
                $posts[$key]->check_box = $check_box;
                // $posts[$key]->message = '<p data-toggle="tooltip" data-placement="bottom" title="'.$value->message.'">' . substr($value->message, 0, 20) . '...</p>';
                
                $posts[$key]->action = $action;
            }
        }

        $json_data = [
            "draw"            => $draw,
            "recordsTotal"    => $totalFiltered,
            "recordsFiltered" => $totalFiltered,
            "data"            => $posts
        ];

        echo json_encode($json_data);
    }

    public function print_or_multiple_delete()
    {
        $type     = $this->input->post('type');
        $array_id = $this->input->post('data');

        if($type == 'delete') {

            $delete = $this->Contact_message_model->delete_contact_message_by_array_id($array_id);

            if($delete) {
                $this->session->set_flashdata('success', 'delete data successfully');
                redirect(base_url("admin_panel/contact_message/index"));
            } else {
                $this->session->set_flashdata('failed', 'delete data failed');
                redirect(base_url("admin_panel/contact_message/index"));
            }
        }
    }
    public function background($id="")
    {
        $data['filePage'] = 'admin_panel/pages/about/background';

        $get_background     = $this->Background_model->get_background('Contact');
        $background_id      = isset($get_background->id) ? $get_background->id : null;
        $background         = $this->Background_model->get_background_by_id($background_id);
        $data['value'] = $background;

        $this->load->view('admin_panel/app', $data);
    }

    public function update_background($id="")
    {

        $id = $this->input->post('id');

        $this->form_validation->set_rules('title', 'title', 'required');

        if ($this->form_validation->run() == FALSE){
            $data['filePage'] = 'admin_panel/pages/about/background';
            
            $this->load->view('admin_panel/app', $data);
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'type'  => 'Contact',
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

            redirect(base_url("admin_panel/contact_message/background"));
        }
    }


}
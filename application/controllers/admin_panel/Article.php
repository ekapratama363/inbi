<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // for load helper
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
		$this->load->helper('upload_file');

        $this->load->model('Article_model');
        $this->load->model('Background_model');
        
		if($this->session->userdata('is_login') != "true"){
			redirect(base_url("admin_panel/auth"));
        }
    }

    public function index()
    {

        $data['filePage'] = 'admin_panel/pages/article/index';

        $this->load->view('admin_panel/app', $data);
    }

    public function create()
    {
        $data['filePage'] = 'admin_panel/pages/article/create';

        $this->load->view('admin_panel/app', $data);
    }

    public function edit($id = NULL)
    {
        $data['filePage'] = 'admin_panel/pages/article/edit';
        
        $article = $this->Article_model->get_article_by_id($id);
        
        $data['value'] = $article;

        $this->load->view('admin_panel/app', $data);
    }


    public function store()
    {
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        // $this->form_validation->set_rules('category', 'category', 'required');

        if ($this->form_validation->run() == FALSE){
            $data['filePage'] = 'admin_panel/pages/article/create';
            $this->load->view('admin_panel/app', $data);
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
            ];

            $message = "";
            if($_FILES['image']['name'] || $_FILES['other_image_1']['name'] || $_FILES['other_image_2']['name']) {
                foreach($_FILES as $key => $file) {
                    if($file['name']) {
                        $upload = upload_file($file, 'article');
                        if($upload == $file['name']) {
                            $image  = [$key => $upload];
                            $data = array_merge($data, $image);
                        } else {
                            $message = $upload;
                        }
                    }
                }
            } 
            
            $save = $this->Article_model->set_article($data);
            
            if($message) {
                $this->session->set_flashdata('failed', $message);
            } else {
                $this->session->set_flashdata('success', 'save data successfully');
            }

            redirect(base_url("admin_panel/article/create"));
        }
    }
        
    public function update()
    {
        $id = $this->input->post('id');

        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        // $this->form_validation->set_rules('category', 'category', 'required');

        if ($this->form_validation->run() == FALSE){
            $data['filePage'] = 'admin_panel/pages/article/edit/'.$id;
            
            $this->load->view('admin_panel/app', $data);
        } else {

            $data = [
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
            ];

            $message = "";
            if($_FILES['image']['name'] || $_FILES['other_image_1']['name'] || $_FILES['other_image_2']['name']) {
                foreach($_FILES as $key => $file) {
                    if($file['name']) {
                        $upload = upload_file($file, 'article');
                        if($upload == $file['name']) {
                            $image  = [$key => $upload];
                            $data = array_merge($data, $image);
                        } else {
                            $message = $upload;
                        }
                    }
                }
            } 
            
            $update = $this->Article_model->update_article_by_id($id, $data);
            
            if($message) {
                $this->session->set_flashdata('failed', $message);
            } else {
                $this->session->set_flashdata('success', 'save data successfully');
            }

            redirect(base_url("admin_panel/article/index"));
        }
    }

    public function delete($id = NULL)
    {

        $message = 'Success delete data';

        $this->Article_model->delete_article_by_id($id);

        $this->session->set_flashdata('success', $message);

        redirect(base_url("admin_panel/article/index"));
        
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

        $totalFiltered = count($this->Article_model->get_ajax_list_article($array));

        //check the length parameter and then take records
        if ($length > 0) {
            $array['start']  = $start;
            $array['length'] = $length;
        }

        $posts = $this->Article_model->get_ajax_list_article($array);

        if(sizeof($posts) > 0) {

            $no = $start;
            foreach($posts as $key => $value) {    
                $no++;

                $image = ($value->image != '') ? 
                            "<img src='" . base_url() . "uploads/article/" . $value->image . "' width='50px' height='50px'>" 
                            : "no image";

                $image_1 = ($value->other_image_1 != '') ? 
                            "<img src='" . base_url() . "uploads/article/" . $value->other_image_1 . "' width='50px' height='50px'>" 
                            : "no image";

                $image_2 = ($value->other_image_2 != '') ? 
                            "<img src='" . base_url() . "uploads/article/" . $value->other_image_2 . "' width='50px' height='50px'>" 
                            : "no image";
                $action = "
                    <a href='".base_url()."admin_panel/article/edit/".$value->id."' 
                        class='btn btn-success' 
                        style='margin-right: 5px;' title='Edit'>
                        <i class='fa fa-edit'></i>
                    </a>

                    <a onclick='".'return confirm("'."delete this item?".'")'."'
                        href='".base_url()."admin_panel/article/delete/".$value->id."' class='btn btn-danger delete-list'>
                        <i class='fa fa-trash'></i>
                    </a>
                ";
                $check_box = "<input type='checkbox' id='data' name='data[]' class='checkboxes' value='{$value->id}' />";

                $posts[$key]->description = '<p data-toggle="tooltip" data-placement="bottom" title="'.$value->description.'">' . substr($value->description, 0, 20) . '...</p>';
                $posts[$key]->image = $image;
                $posts[$key]->other_image_1 = $image_1;
                $posts[$key]->other_image_2 = $image_2;
                $posts[$key]->action = $action;
                $posts[$key]->no = $no;
                $posts[$key]->check_box = $check_box;
            }
        }

        $json_data = [
            "start"           => $start,
            "length"          => $length,
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

        if($type == 'print') {

            $this->QRCode($array_id);

        }

        if($type == 'delete') {

            $delete = $this->Article_model->delete_article_by_array_id($array_id);

            // echo json_encode($delete);
            // die();

            if($delete) {
                $this->session->set_flashdata('success', 'delete data successfully');
                redirect(base_url("admin_panel/article/index"));
            } else {
                $this->session->set_flashdata('failed', 'delete data failed');
                redirect(base_url("admin_panel/article/index"));
            }
        }
    }
    public function background($id="")
    {
        $data['filePage'] = 'admin_panel/pages/about/background';

        $get_background     = $this->Background_model->get_background('Article');
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
                'type'  => 'Article',
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

            redirect(base_url("admin_panel/article/background"));
        }
    }


}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificate extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // for load helper
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->load->model('Certificate_model');
        
		if($this->session->userdata('is_login') != "true"){
			redirect(base_url("admin_panel/auth"));
        }
    }
    
    public function index()
    {
        $data['filePage'] = 'admin_panel/pages/certificate/index';

        $this->load->view('admin_panel/app', $data);

    }

    public function create()
    {
        $data['filePage'] = 'admin_panel/pages/certificate/create';

        $this->load->view('admin_panel/app', $data);
    }

    public function edit($id = NULL)
    {
        $data['filePage'] = 'admin_panel/pages/certificate/edit';
        
        $data['value'] = $this->Certificate_model->get_certificate_by_id($id);

        $this->load->view('admin_panel/app', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');

        if ($this->form_validation->run() == FALSE){
            $data['filePage'] = 'admin_panel/pages/certificate/create';
            $this->load->view('admin_panel/app', $data);
        } else {
            $filename = $_FILES['image']['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);

            $target_dir = "uploads/certificate/";
            $target_file = $target_dir . basename($filename);
        
            if (!$filename) {
                
                $data = [
                    'title' => $this->input->post('title'),
                    // 'slug' => $this->slug($this->input->post('title')),
                    'description' => $this->input->post('description'),    
                    'image'     => '',//$_FILES['image']['name'],
                ];
                
                $this->Certificate_model->set_certificate($data);

                $this->session->set_flashdata('success', 'save data successfully');

                redirect(base_url("admin_panel/solutions/certificate/create"));

                // $message = 'The image filed is required.';

                // $this->session->set_flashdata('failed', $message);

                // redirect(base_url("admin_panel/solutions/certificate/create"));

            } elseif ($ext != "jpg" && $ext != "png" && $ext != "jpeg" && $ext != "gif") {
                
                $message = 'The filetype you are attempting to upload is not allowed.';

                $this->session->set_flashdata('failed', $message);

                redirect(base_url("admin_panel/solutions/certificate/create"));
            
            } elseif ($_FILES["image"]["size"] > 2000000) {
                
                $message = 'Sorry, your file is too large.';

                $this->session->set_flashdata('failed', $message);

                redirect(base_url("admin_panel/solutions/certificate/create"));

            } else {
        
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

                    $data = [
                        'title' => $this->input->post('title'),
                        // 'slug' => $this->slug($this->input->post('title')),
                        'description' => $this->input->post('description'),
                        // 'type' => $this->input->post('type'),
                        
                        
                        'image'     => $_FILES['image']['name'],
                    ];
                    
                    $this->Certificate_model->set_certificate($data);

                    $this->session->set_flashdata('success', 'save data successfully');
    
                    redirect(base_url("admin_panel/solutions/certificate/create"));

                } else {

                    $message = 'Upload image failed';

                    $this->session->set_flashdata('failed', $message);

                    redirect(base_url("admin_panel/solutions/certificate/create"));

                }
            }
            // $data = [
            //     'title' => $this->input->post('title'),
            //     'description' => $this->input->post('description'),
            //     // 'created_by' => 1,
            // ];
            
            // $this->Certificate_model->set_certificate($data);

            // $this->session->set_flashdata('success', 'save data successfully');

            // redirect(base_url("admin_panel/solutions/certificate/create"));

        }
    }
        
    public function update()
    {
        $id = $this->input->post('id');

        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');

        if ($this->form_validation->run() == FALSE){
            $data['filePage'] = 'admin_panel/pages/certificate/edit';
            
            $this->load->view('admin_panel/app', $data);
        } else {

            $filename = $_FILES['image']['name'];

            if(!$filename) {

                $data = [
                    'title' => $this->input->post('title'),
                    // 'slug' => $this->slug($this->input->post('title')),
                    'description' => $this->input->post('description'),
                    'image' => $this->input->post('image_hidden'), //$_FILES['image']['name'],
                ];

                $this->Certificate_model->update_certificate_by_id($id, $data);
                $this->session->set_flashdata('success', 'update data successfully');

                redirect(base_url("admin_panel/solutions/certificate/index"));

            } else {

                $ext = pathinfo($filename, PATHINFO_EXTENSION);

                $target_dir = "uploads/certificate/";
                $target_file = $target_dir . basename($filename);
            
                if ($ext != "jpg" && $ext != "png" && $ext != "jpeg" && $ext != "gif") {
                    
                    $message = 'The filetype you are attempting to upload is not allowed.';

                    $this->session->set_flashdata('failed', $message);

                    redirect(base_url("admin_panel/solutions/certificate/index"));
                
                } elseif ($_FILES["image"]["size"] > 2000000) {
                    
                    $message = 'Sorry, your file is too large.';

                    $this->session->set_flashdata('failed', $message);

                    redirect(base_url("admin_panel/solutions/certificate/index"));

                } else {

                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

                        $data = [
                            'title' => $this->input->post('title'),
                            // 'slug' => $this->slug($this->input->post('title')),
                            'description' => $this->input->post('description'),    
                            // 'type' => $this->input->post('type'),    
                            'image' => $_FILES['image']['name'],
                        ];
                        
                        $this->Certificate_model->update_certificate_by_id($id, $data);

                        $this->session->set_flashdata('success', 'save data successfully');
        
                        redirect(base_url("admin_panel/solutions/certificate/index"));

                    } else {

                        $message = 'Upload image failed';

                        $this->session->set_flashdata('failed', $message);

                        redirect(base_url("admin_panel/solutions/certificate/index"));

                    }
                }
            }
            // $data = [
            //     'title' => $this->input->post('title'),
            //     'description' => $this->input->post('description'),
            // ];

            // $this->Certificate_model->update_certificate_by_id($id, $data);
            // $this->session->set_flashdata('success', 'update data successfully');

            // redirect(base_url("admin_panel/solutions/certificate/index"));

        }
    }

    public function delete($id = NULL)
    {

        $message = 'Success delete data';

        $this->Certificate_model->delete_certificate_by_id($id);

        $this->session->set_flashdata('success', $message);

        redirect(base_url("admin_panel/solutions/certificate/index"));
        
    }

    public function ajax_certificate($q = NULL)
    {
        $q = $this->input->get('q') ? $this->input->get('q') : NULL;
        
        $data = $this->Certificate_model->ajax_get_certificate($q);

        echo json_encode($data);
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

        $totalFiltered = count($this->Certificate_model->get_ajax_list_certificate($array));

        //check the length parameter and then take records
        if ($length > 0) {
            $array['start']  = $start;
            $array['length'] = $length;
        }

        $posts = $this->Certificate_model->get_ajax_list_certificate($array);

        if(sizeof($posts) > 0) {
            $no = $start;
            foreach($posts as $key => $value) {        
                $no++;

                $image = "<img src='" . base_url() . "uploads/certificate/" . $value->image . "' width='50px' height='50px'>";
                
                $action = "
                    <a href='".base_url()."admin_panel/solutions/certificate/edit/".$value->id."' 
                        class='btn btn-success' 
                        style='margin-right: 5px;' title='Edit'>
                        <i class='fa fa-edit'></i>
                    </a>

                    <a onclick='".'return confirm("'."delete this item?".'")'."'
                        href='".base_url()."admin_panel/solutions/certificate/delete/".$value->id."' class='btn btn-danger delete-list'>
                        <i class='fa fa-trash'></i>
                    </a>
                ";

                $posts[$key]->no = $no;
                $posts[$key]->description = '<p data-toggle="tooltip" data-placement="bottom" title="'.$value->description.'">' . substr($value->description, 0, 20) . '...</p>';
                
                $posts[$key]->image = $image;
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

}
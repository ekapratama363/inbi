<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Raw_material extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // for load helper
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->load->model('Raw_material_model');
    }
    
    public function index()
    {
        $data['filePage'] = 'admin_panel/pages/raw_material/index';

        $this->load->view('admin_panel/app', $data);

    }

    public function create()
    {
        $data['filePage'] = 'admin_panel/pages/raw_material/create';

        $this->load->view('admin_panel/app', $data);
    }

    public function edit($id = NULL)
    {
        $data['filePage'] = 'admin_panel/pages/raw_material/edit';
        
        $data['value'] = $this->Raw_material_model->get_raw_material_by_id($id);

        $this->load->view('admin_panel/app', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');

        if ($this->form_validation->run() == FALSE){
            $data['filePage'] = 'admin_panel/pages/raw_material/create';
            $this->load->view('admin_panel/app', $data);
        } else {
            $filename = $_FILES['image']['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);

            $target_dir = "uploads/raw_material/";
            $target_file = $target_dir . basename($filename);
        
            if (!$filename) {
                
                $data = [
                    'title' => $this->input->post('title'),
                    // 'slug' => $this->slug($this->input->post('title')),
                    'description' => $this->input->post('description'),    
                    'image'     => '',//$_FILES['image']['name'],
                ];
                
                $this->Raw_material_model->set_raw_material($data);

                $this->session->set_flashdata('success', 'save data successfully');

                redirect(base_url("admin_panel/products/raw_material/create"));

                // $message = 'The image filed is required.';

                // $this->session->set_flashdata('failed', $message);

                // redirect(base_url("admin_panel/products/raw_material/create"));

            } elseif ($ext != "jpg" && $ext != "png" && $ext != "jpeg" && $ext != "gif") {
                
                $message = 'The filetype you are attempting to upload is not allowed.';

                $this->session->set_flashdata('failed', $message);

                redirect(base_url("admin_panel/products/raw_material/create"));
            
            } elseif ($_FILES["image"]["size"] > 2000000) {
                
                $message = 'Sorry, your file is too large.';

                $this->session->set_flashdata('failed', $message);

                redirect(base_url("admin_panel/products/raw_material/create"));

            } else {
        
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

                    $data = [
                        'title' => $this->input->post('title'),
                        // 'slug' => $this->slug($this->input->post('title')),
                        'description' => $this->input->post('description'),
                        // 'type' => $this->input->post('type'),
                        
                        
                        'image'     => $_FILES['image']['name'],
                    ];
                    
                    $this->Raw_material_model->set_raw_material($data);

                    $this->session->set_flashdata('success', 'save data successfully');
    
                    redirect(base_url("admin_panel/products/raw_material/create"));

                } else {

                    $message = 'Upload image failed';

                    $this->session->set_flashdata('failed', $message);

                    redirect(base_url("admin_panel/products/raw_material/create"));

                }
            }
            // $data = [
            //     'title' => $this->input->post('title'),
            //     'description' => $this->input->post('description'),
            //     // 'created_by' => 1,
            // ];
            
            // $this->Raw_material_model->set_raw_material($data);

            // $this->session->set_flashdata('success', 'save data successfully');

            // redirect(base_url("admin_panel/products/raw_material/create"));

        }
    }
        
    public function update()
    {
        $id = $this->input->post('id');

        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');

        if ($this->form_validation->run() == FALSE){
            $data['filePage'] = 'admin_panel/pages/raw_material/edit';
            
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

                $this->Raw_material_model->update_raw_material_by_id($id, $data);
                $this->session->set_flashdata('success', 'update data successfully');

                redirect(base_url("admin_panel/products/raw_material/index"));

            } else {

                $ext = pathinfo($filename, PATHINFO_EXTENSION);

                $target_dir = "uploads/raw_material/";
                $target_file = $target_dir . basename($filename);
            
                if ($ext != "jpg" && $ext != "png" && $ext != "jpeg" && $ext != "gif") {
                    
                    $message = 'The filetype you are attempting to upload is not allowed.';

                    $this->session->set_flashdata('failed', $message);

                    redirect(base_url("admin_panel/products/raw_material/index"));
                
                } elseif ($_FILES["image"]["size"] > 2000000) {
                    
                    $message = 'Sorry, your file is too large.';

                    $this->session->set_flashdata('failed', $message);

                    redirect(base_url("admin_panel/products/raw_material/index"));

                } else {

                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

                        $data = [
                            'title' => $this->input->post('title'),
                            // 'slug' => $this->slug($this->input->post('title')),
                            'description' => $this->input->post('description'),    
                            // 'type' => $this->input->post('type'),    
                            'image' => $_FILES['image']['name'],
                        ];
                        
                        $this->Raw_material_model->update_raw_material_by_id($id, $data);

                        $this->session->set_flashdata('success', 'save data successfully');
        
                        redirect(base_url("admin_panel/products/raw_material/index"));

                    } else {

                        $message = 'Upload image failed';

                        $this->session->set_flashdata('failed', $message);

                        redirect(base_url("admin_panel/products/raw_material/index"));

                    }
                }
            }
            // $data = [
            //     'title' => $this->input->post('title'),
            //     'description' => $this->input->post('description'),
            // ];

            // $this->Raw_material_model->update_raw_material_by_id($id, $data);
            // $this->session->set_flashdata('success', 'update data successfully');

            // redirect(base_url("admin_panel/products/raw_material/index"));

        }
    }

    public function delete($id = NULL)
    {

        $message = 'Success delete data';

        $this->Raw_material_model->delete_raw_material_by_id($id);

        $this->session->set_flashdata('success', $message);

        redirect(base_url("admin_panel/products/raw_material/index"));
        
    }

    public function ajax_raw_material($q = NULL)
    {
        $q = $this->input->get('q') ? $this->input->get('q') : NULL;
        
        $data = $this->Raw_material_model->ajax_get_raw_material($q);

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

        $totalFiltered = count($this->Raw_material_model->get_ajax_list_raw_material($array));

        //check the length parameter and then take records
        if ($length > 0) {
            $array['start']  = $start;
            $array['length'] = $length;
        }

        $posts = $this->Raw_material_model->get_ajax_list_raw_material($array);

        if(sizeof($posts) > 0) {
            $no = $start;
            foreach($posts as $key => $value) {        
                $no++;

                $image = "<img src='" . base_url() . "uploads/raw_material/" . $value->image . "' width='50px' height='50px'>";
                
                $action = "
                    <a href='".base_url()."admin_panel/products/raw_material/edit/".$value->id."' 
                        class='btn btn-success' 
                        style='margin-right: 5px;' title='Edit'>
                        <i class='fa fa-edit'></i>
                    </a>

                    <a onclick='".'return confirm("'."delete this item?".'")'."'
                        href='".base_url()."admin_panel/products/raw_material/delete/".$value->id."' class='btn btn-danger delete-list'>
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

    public function slug($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        // trim
        $text = trim($text, '-');
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // lowercase
        $text = strtolower($text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        if (empty($text))
        {
            return 'n-a';
        }
        return $text;
    }

}
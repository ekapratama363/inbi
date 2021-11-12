<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_description extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // for load helper
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');

		$this->load->helper('upload_file');

        $this->load->model('Product_description_model');
        
		if($this->session->userdata('is_login') != "true"){
			redirect(base_url("admin_panel/auth"));
        }
    }
    
    public function index()
    {
        $data['filePage'] = 'admin_panel/pages/product_description/index';

        $this->load->view('admin_panel/app', $data);

    }

    public function create()
    {
        $data['filePage'] = 'admin_panel/pages/product_description/create';

        $this->load->view('admin_panel/app', $data);
    }

    public function edit($id = NULL)
    {
        $data['filePage'] = 'admin_panel/pages/product_description/edit';
        
        $data['value'] = $this->Product_description_model->get_product_description_by_id($id);

        $this->load->view('admin_panel/app', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('image_title', 'image title', 'required');
        $this->form_validation->set_rules('image_caption', 'image caption', 'required');

        if ($this->form_validation->run() == FALSE){
            $data['filePage'] = 'admin_panel/pages/product_description/create';
            $this->load->view('admin_panel/app', $data);
        } else {
            $filename = $_FILES['image']['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);

            $target_dir = "uploads/product_description/";
            $target_file = $target_dir . basename($filename);
        
            if (!$filename) {
                
                $data = [
                    'title' => $this->input->post('title'),
                    // 'slug' => $this->slug($this->input->post('title')),
                    'description' => $this->input->post('description'),    
                    'image_title' => $this->input->post('image_title'),    
                    'image_caption' => $this->input->post('image_caption'),    
                    'image'     => '',//$_FILES['image']['name'],
                ];
                
                $this->Product_description_model->set_product_description($data);

                $this->session->set_flashdata('success', 'save data successfully');

                redirect(base_url("admin_panel/products/product_description/create"));

                // $message = 'The image filed is required.';

                // $this->session->set_flashdata('failed', $message);

                // redirect(base_url("admin_panel/products/product_description/create"));

            } elseif ($ext != "jpg" && $ext != "png" && $ext != "jpeg" && $ext != "gif") {
                
                $message = 'The filetype you are attempting to upload is not allowed.';

                $this->session->set_flashdata('failed', $message);

                redirect(base_url("admin_panel/products/product_description/create"));
            
            } elseif ($_FILES["image"]["size"] > 2000000) {
                
                $message = 'Sorry, your file is too large.';

                $this->session->set_flashdata('failed', $message);

                redirect(base_url("admin_panel/products/product_description/create"));

            } else {
        
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

                    $data = [
                        'title' => $this->input->post('title'),
                        // 'slug' => $this->slug($this->input->post('title')),
                        'description' => $this->input->post('description'),
                        // 'type' => $this->input->post('type'),
                        'image_title' => $this->input->post('image_title'),    
                        'image_caption' => $this->input->post('image_caption'),    
                            
                        
                        'image'     => $_FILES['image']['name'],
                    ];
                    
                    $this->Product_description_model->set_product_description($data);

                    $this->session->set_flashdata('success', 'save data successfully');
    
                    redirect(base_url("admin_panel/products/product_description/create"));

                } else {

                    $message = 'Upload image failed';

                    $this->session->set_flashdata('failed', $message);

                    redirect(base_url("admin_panel/products/product_description/create"));

                }
            }
            // $data = [
            //     'title' => $this->input->post('title'),
            //     'description' => $this->input->post('description'),
            //     // 'created_by' => 1,
            // ];
            
            // $this->Product_description_model->set_product_description($data);

            // $this->session->set_flashdata('success', 'save data successfully');

            // redirect(base_url("admin_panel/products/product_description/create"));

        }
    }
        
    public function update()
    {
        $id = $this->input->post('id');

        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');

        if ($this->form_validation->run() == FALSE){
            $data['filePage'] = 'admin_panel/pages/product_description/edit';
            
            $this->load->view('admin_panel/app', $data);
        } else {

            $data = [
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),    
                'image_title' => $this->input->post('image_title'),    
            ];

            $message = "";
            if($_FILES['image']['name'] || $_FILES['image_title']['name']) {
                foreach($_FILES as $key => $file) {
                    if($file['name']) {
                        $upload = upload_file($file, 'product_description');
                        if($upload == $file['name']) {
                            $image  = [$key => $upload];
                            $data = array_merge($data, $image);
                        } else {
                            $message = $upload;
                        }
                    }
                }
            } 

            $save = $this->Product_description_model->update_product_description_by_id($id, $data);
     
            if($message) {
                $this->session->set_flashdata('failed', $message);
            } else {
                $this->session->set_flashdata('success', 'save data successfully');
            }

            redirect(base_url("admin_panel/products/product_description/edit/{$id}"));
        }
    }

    public function delete($id = NULL)
    {

        $message = 'Success delete data';

        $this->Product_description_model->delete_product_description_by_id($id);

        $this->session->set_flashdata('success', $message);

        redirect(base_url("admin_panel/products/product_description/index"));
        
    }

    public function ajax_product_description($q = NULL)
    {
        $q = $this->input->get('q') ? $this->input->get('q') : NULL;
        
        $data = $this->Product_description_model->ajax_get_product_description($q);

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

        $totalFiltered = count($this->Product_description_model->get_ajax_list_product_description($array));

        //check the length parameter and then take records
        if ($length > 0) {
            $array['start']  = $start;
            $array['length'] = $length;
        }

        $posts = $this->Product_description_model->get_ajax_list_product_description($array);

        if(sizeof($posts) > 0) {
            $no = $start;
            foreach($posts as $key => $value) {        
                $no++;

                $image = "<img src='" . base_url() . "uploads/product_description/" . $value->image . "' width='50px' height='50px'>";
                $image_title = "<img src='" . base_url() . "uploads/product_description/" . $value->image_title . "' width='50px' height='50px'>";
                
                $action = "
                    <a href='".base_url()."admin_panel/products/product_description/edit/".$value->id."' 
                        class='btn btn-success' 
                        style='margin-right: 5px;' title='Edit'>
                        <i class='fa fa-edit'></i>
                    </a>
                ";

                $posts[$key]->no = $no;
                $posts[$key]->description = '<p data-toggle="tooltip" data-placement="bottom" title="'.$value->description.'">' . substr($value->description, 0, 20) . '...</p>';
                
                $posts[$key]->image = $image;
                $posts[$key]->image_title = $image_title;
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
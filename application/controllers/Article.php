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
        $this->load->library('pagination');

        $this->load->helper('pagination_helper');
        $this->load->model('Article_model');
        $this->load->model('Company_profile_model');
        $this->load->model('Background_model');
    }

    public function index($start = "")
    {

        $total                = $this->Article_model->count_article();
        $config['base_url']   = base_url()."article/";
        $config['total_rows'] = $total;
        $config['per_page']   = 6;

        $pagination = pagination($config);

        $this->pagination->initialize($pagination);	
        $data['articles'] = $this->Article_model->get_article($config['per_page'], $start);
        $data['background'] = $this->Background_model->get_background($this->uri->segment(1));


        $data['filePage'] = 'frontend/pages/article/index';

        $data['company_profile'] = $this->Company_profile_model->get_company_profile();

        $this->load->view('frontend/app', $data);
    }

    public function page($id) 
    {
        $data['background'] = $this->Background_model->get_background($this->uri->segment(1));
        $data['company_profile'] = $this->Company_profile_model->get_company_profile();
        $data['article'] = $this->Article_model->get_article_by_id($id);
        $data['recent_articles'] = $this->Article_model->get_article(3, 0);
        
        $data['filePage'] = 'frontend/pages/article/page';
        $this->load->view('frontend/app', $data);
    }

}
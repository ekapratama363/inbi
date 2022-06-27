<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_halal extends CI_Controller {

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

        $this->load->model('Product_description_model');
        $this->load->model('Company_profile_model');
        $this->load->model('Raw_material_model');
        $this->load->model('Product_category_model');
        $this->load->model('Product_model');
        $this->load->model('Product_category_detail_model');
        $this->load->model('Background_model');
        $this->load->model('Product_description_model');
    }

    private function get_products($length, $start)
    {
        $data['length'] = $length;
        $data['start']  = $start;
        $product_categories = $this->Product_category_model->get_ajax_list_product_category($data, $is_halal = 1);
        
        foreach ($product_categories as $key => $product_category ) {
            $product_categories[$key]->prod_cat_details = $this->Product_category_detail_model->get_product_category_detail_by_product_category_id($product_category->id);
        }
        
        $products_all = $product_categories;
        foreach ($products_all as $key => $product_category ) {
            foreach ($product_category->prod_cat_details as $k => $prod_cat_details) {
                $product = $this->Product_model->get_product_by_id($prod_cat_details->product_id);
                
                if($product) {
                    $products_all[$key]->prod_cat_details[$k]->products = $product;

                    $product_category = $this->Product_category_detail_model->get_product_category_detail_by_product_id($prod_cat_details->product_id);
                    $products_all[$key]->prod_cat_details[$k]->categories = $product_category;
                } else {
                    unset($products_all[$key]->prod_cat_details[$k]);
                }
            }
        }

        return $products_all;
    }

    public function index($start = "")
    {
        $data['filePage'] = 'frontend/pages/product_halal/index';

        $data['company_profile'] = $this->Company_profile_model->get_company_profile();

        $data['background'] = $this->Background_model->get_background($this->uri->segment(1));

        $total                = $this->Product_category_model->count_categories($is_halal = 1);
        $config['base_url']   = base_url()."product_halal/";
        $config['total_rows'] = $total;
        $config['per_page']   = 3;

        $pagination = pagination($config);

        $this->pagination->initialize($pagination);	
        $data['products'] = $this->get_products($config['per_page'], $start);
        $data['product_description'] = $this->Product_description_model->get_data($is_halal = 1);

        $this->load->view('frontend/app', $data);
    }

}
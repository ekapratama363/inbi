<?php

class Product_category_detail_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function set_product_category_detail($data) 
    {
        return $this->db->insert('product_category_details', $data);
    }

    public function delete_product_category_detail_by_product_id($product_id)
    {
        $this->db->where(['product_id' => $product_id]);
	    $this->db->delete('product_category_details');
    }

    public function get_product_category_detail_by_product_category_id($product_category_id)
    {
        $query = $this->db->get_where('product_category_details', ['product_category_id' => $product_category_id]);

        return $query->result_object();
    }

    public function get_product_category_detail_by_product_id($product_id)
    {
        $query = $this->db->get_where('product_category_details', ['product_id' => $product_id]);

        return $query->result_object();
    }

}
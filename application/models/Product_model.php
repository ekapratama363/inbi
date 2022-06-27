<?php

class Product_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function set_product($data) 
    {
        $this->db->insert('products', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function ajax_product()
    {
        $query = $this->db->order_by('id', 'desc')
                ->get('products'); 

        return $query->row_object();
    }

    public function get_ajax_list_product($data = NULL, $is_halal = null)
    {
        $match = isset($data['search']) ? $data['search'] : '';
        
        $query = $this->db->select('*')
                ->where('(title LIKE \'%'.$match.'%\' 
                            or description LIKE \'%'.$match.'%\')')
                ->order_by('id', isset($data['order']) ? 'asc' : 'desc');
        
        if ($is_halal !== NULL) {
            $query = $query->where('is_halal', $is_halal);
        }

        if (isset($data['length']) && isset($data['start'])) {
            $query = $query->limit($data['length'], $data['start']);
        }

        $query = $query->get('products');

        return $query->result_object();
    }

    public function get_product_by_product_id($id)
    {
    
        $query = $this->db
                ->select('*')
                ->from('products')
                ->where('product.id', $id)
                ->get();

        return $query->result_object();

        // $query = $this->db->get_where('products', ['id' => $id]);

        // return $query->row_object();
    }

    public function get_product_by_id($id)
    {
    
        $query = $this->db
                ->select('*')
                ->from('products')
                ->where('products.id', $id)
                ->get();

        return $query->row_object();

        // $query = $this->db->get_where('products', ['id' => $id]);

        // return $query->row_object();
    }

    public function update_product_by_id($id, $data)
    {
        $query = $this->db->where('id', $id)->update('products', $data);

        return $query;
    }

    public function delete_product_by_id($id)
    {
        $this->db->where(['id' => $id]);
	    $this->db->delete('products');
    }

    public function ajax_get_product($q = NULL)
    {
        if($q) {
            $this->db->like('category', $q);
        } else {
            $this->db->limit(15);
        }

        $query = $this->db->get('products');

        return $query->result_object();
    }

    public function get_product($limit = NULL, $start = NULL, $category = NULL)
    {
        $query = $this->db
                ->select('products.id, products.title, products.description, products.image,
                    product_categories.description as product_categories_description, product_categories.category,
                    product_categories.slug')
                ->from('products')
                ->join('product_categories', 'product_categories.id = products.product_categories_id', 'left')
                // ->where('(products.title LIKE \'%'.$match.'%\' 
                //             or products.description LIKE \'%'.$match.'%\'
                //             or product_categories.category LIKE \'%'.$match.'%\')')
                ->where('product_categories.slug', $category)
                ->order_by('products.id', 'desc')
                ->limit($limit, $start)
                ->get();
        
        return $query->result_object();
    }

    public function count_product($category = NULl)
    {
        $query = $this->db
                ->select('products.id, products.title, products.description, products.image,
                    product_categories.description as product_categories_description, product_categories.category,
                    product_categories.slug')
                ->from('products')
                ->join('product_categories', 'product_categories.id = product.product_categories_id', 'left')
                // ->where('(product.title LIKE \'%'.$match.'%\' 
                //             or product.description LIKE \'%'.$match.'%\'
                //             or product_categories.category LIKE \'%'.$match.'%\')')
                ->where('product_categories.category', $category)
                ->order_by('products.id', 'desc')
                // ->limit($limit, $start);
                ->get();

        return $query->num_rows();

		// return $this->db->get('products')->num_rows();
	}

    public function delete_product_by_array_id($id)
    {
        $query = $this->db->where_in('id', $id)->delete('products');

        return $query;
    }

}
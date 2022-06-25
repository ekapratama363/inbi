<?php

class Product_image_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function set_product($data) 
    {
        $this->db->insert('product_images', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function ajax_product()
    {
        $query = $this->db->order_by('id', 'desc')
                ->get('product_images'); 

        return $query->row_object();
    }

    public function get_ajax_list_product($data = NULL)
    {
        $match = isset($data['search']) ? $data['search'] : '';
        
        $query = $this->db->select('*')
                ->where('(title LIKE \'%'.$match.'%\' 
                            or description LIKE \'%'.$match.'%\')')
                ->order_by('id', isset($data['order']) ? 'asc' : 'desc');
                
        if(isset($data['length']) && isset($data['start'])) {
            $query = $query->limit($data['length'], $data['start']);
        }

        $query = $query->get('product_images');

        return $query->result_object();
    }

    public function get_product_by_product_id($id)
    {
    
        $query = $this->db
                ->select('*')
                ->from('product_images')
                ->where('product.id', $id)
                ->get();

        return $query->result_object();

        // $query = $this->db->get_where('product_images', ['id' => $id]);

        // return $query->row_object();
    }

    public function get_product_by_id($id)
    {
    
        $query = $this->db
                ->select('*')
                ->from('product_images')
                ->where('product_images.id', $id)
                ->get();

        return $query->row_object();

        // $query = $this->db->get_where('product_images', ['id' => $id]);

        // return $query->row_object();
    }

    public function update_product_by_id($id, $data)
    {
        $query = $this->db->where('id', $id)->update('product_images', $data);

        return $query;
    }

    public function delete_product_by_id($id)
    {
        $this->db->where(['id' => $id]);
	    $this->db->delete('product_images');
    }

    public function ajax_get_product($q = NULL)
    {
        if($q) {
            $this->db->like('category', $q);
        } else {
            $this->db->limit(15);
        }

        $query = $this->db->get('product_images');

        return $query->result_object();
    }

    public function get_product($limit = NULL, $start = NULL, $category = NULL)
    {
        $query = $this->db
                ->select('product_images.id, product_images.title, product_images.description, product_images.image,
                    product_categories.description as product_categories_description, product_categories.category,
                    product_categories.slug')
                ->from('product_images')
                ->join('product_categories', 'product_categories.id = product_images.product_categories_id', 'left')
                // ->where('(product_images.title LIKE \'%'.$match.'%\' 
                //             or product_images.description LIKE \'%'.$match.'%\'
                //             or product_categories.category LIKE \'%'.$match.'%\')')
                ->where('product_categories.slug', $category)
                ->order_by('product_images.id', 'desc')
                ->limit($limit, $start)
                ->get();
        
        return $query->result_object();
    }

    public function count_product($category = NULl)
    {
        $query = $this->db
                ->select('product_images.id, product_images.title, product_images.description, product_images.image,
                    product_categories.description as product_categories_description, product_categories.category,
                    product_categories.slug')
                ->from('product_images')
                ->join('product_categories', 'product_categories.id = product.product_categories_id', 'left')
                // ->where('(product.title LIKE \'%'.$match.'%\' 
                //             or product.description LIKE \'%'.$match.'%\'
                //             or product_categories.category LIKE \'%'.$match.'%\')')
                ->where('product_categories.category', $category)
                ->order_by('product_images.id', 'desc')
                // ->limit($limit, $start);
                ->get();

        return $query->num_rows();

		// return $this->db->get('product_images')->num_rows();
	}

    public function delete_product_by_array_id($id)
    {
        $query = $this->db->where_in('id', $id)->delete('product_images');

        return $query;
    }

}
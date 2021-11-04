<?php

class Article_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function set_article($data) 
    {
        $this->db->insert('articles', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function ajax_article()
    {
        $query = $this->db->order_by('id', 'desc')
                ->get('articles'); 

        return $query->row_object();
    }

    public function get_articles($limit = NULL, $start = NULL, $search = NULL)
    {
        $query = $this->db->select('*')
            ->from('articles');

        $query = $query->order_by('id', 'desc')
            ->limit($limit, $start)
            ->get();
        
        return $query->result_object();
    }

    public function count_article_only()
    {
        $query = $this->db
            ->select('*')
            ->from('articles');

        return $query->count_all_results();
    }

    public function get_ajax_list_article($data = NULL)
    {
        $match = isset($data['search']) ? $data['search'] : '';
        
        $query = $this->db->select('*')
                ->where('(title LIKE \'%'.$match.'%\' 
                            or description LIKE \'%'.$match.'%\')')
                ->order_by('id', isset($data['order']) ? 'desc' : 'asc');
                
        if(isset($data['length']) && isset($data['start'])) {

            $start = $data['start'] == 1 ? 0 : $data['start'];

            $query = $query->limit($data['length'], $start);
        }

        $query = $query->get('articles');

        return $query->result_object();
    }

    public function get_article_by_id($id)
    {
    
        $query = $this->db
                ->select('*')
                ->from('articles')
                ->where('articles.id', $id)
                ->get();

        return $query->row_object();
    }

    public function update_article_by_id($id, $data)
    {
        $query = $this->db->where('id', $id)->update('articles', $data);

        return $query;
    }

    public function delete_article_by_id($id)
    {
        $this->db->where(['id' => $id]);
	    $this->db->delete('articles');
    }

    public function ajax_get_article($q = NULL)
    {
        if($q) {
            $this->db->like('category', $q);
        } else {
            $this->db->limit(15);
        }

        $query = $this->db->get('articles');

        return $query->result_object();
    }

    public function get_article($limit = NULL, $start = NULL, $q = NULL)
    {
        $query = $this->db
                ->select('*')
                ->where('(title LIKE \'%'.$q.'%\' 
                            or description LIKE \'%'.$q.'%\')')
                ->limit($limit, $start)
                ->get('articles');
        
        return $query->result_object();
    }

    public function count_article()
    {
        $query = $this->db
                ->select('*')
                ->from('articles')
                ->get();

        return $query->num_rows();
	}

    public function delete_article_by_array_id($id)
    {
        $query = $this->db->where_in('id', $id)->delete('articles');

        return $query;
    }

}
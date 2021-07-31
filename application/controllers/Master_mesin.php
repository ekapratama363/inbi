<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_mesin extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Master_mesin_model');
	}

    public function select2($q = NULL)
    {
        $q = $this->input->get('q') ? $this->input->get('q') : NULL;
        
        $master_mesin = $this->Master_mesin_model->select2_master_mesin($q);

        echo json_encode($master_mesin);
    }

    public function by_id($id = NULL)
    {
        $master_mesin = $this->Master_mesin_model->get_by_id($id);

        echo json_encode($master_mesin);
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

        $totalFiltered = count($this->Master_mesin_model->datatable($array));

        //check the length parameter and then take records
        if ($length > 0) {
            $array['start']  = $start;
            $array['length'] = $length;
        }

        $posts = $this->Master_mesin_model->datatable($array);

        if(sizeof($posts) > 0) {
            $no = $start;
            foreach($posts as $key => $value) {    
                $no++;

                $radio_button = "<input type='radio' class='radioButtonMasterMesin' id='radio{$no}' name='radio' value='{$value->id_mesin}'>";

                $posts[$key]->no = $no;
                $posts[$key]->radio_button = $radio_button;
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
}

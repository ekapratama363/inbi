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
}

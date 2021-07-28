<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance_request_detail extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Maintenance_request_detail_model');
	}

    public function store()
    {
        $posts = $this->input->post();

        foreach(array_keys($posts['no']) as $key) {
            $data_insert[] = [
                'id_mesin' => $posts['id_mesin'][$key],
                'date' => $posts['date'][$key],
                'remarks2' => $posts['remarks2'][$key],
            ];
        }

        $insert = $this->Maintenance_request_detail_model->insert_batch_maintenance_requests_detail($data_insert);

        echo json_encode($insert);
    }
}

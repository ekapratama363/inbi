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
                'id_mtr_head' => $posts['id_mtr_head'],
                'id_mesin'    => $posts['id_mesin'][$key],
                'date'        => $posts['date'][$key],
                'remarks2'    => $posts['remarks2'][$key],
            ];
        }

        $insert = $this->Maintenance_request_detail_model->insert_batch($data_insert);

        echo json_encode($insert);
    }

    public function update()
    {
        $posts = $this->input->post();

        foreach(array_keys($posts['no']) as $key) {
            $data_update[] = [
                'id_mtr_head' => $posts['id_mtr_head'],
                'id_mesin'    => $posts['id_mesin'][$key],
                'date'        => $posts['date'][$key],
                'remarks2'    => $posts['remarks2'][$key],
            ];
        }
        $id = $posts['id_mtr_head'];

        $insert = $this->Maintenance_request_detail_model->update_batch($data_update, $id);

        echo json_encode($insert);
    }
}

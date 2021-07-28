<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance_request extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Maintenance_request_model');
		$this->load->model('Maintenance_request_detail_model');
	}

	public function index()
	{
		$data['title'] = 'SSK Program - Maintenance Request';
		//$data['stat'] = $this->Statistik_model->stock();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/top_panel');
		$this->load->view('templates/left_panel');
		

		$this->load->view('master_maintenance_request/list');
		$this->load->view('templates/footer');
	}

	public function view()
	{
		$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
		$limit = $_POST['length']; // Ambil data limit per page
		$start = $_POST['start']; // Ambil data start
		$order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
		$order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
		$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"
		$sql_total = $this->Maintenance_request_model->count_all(); // Panggil fungsi count_all pada SiswaModel
		$sql_data = $this->Maintenance_request_model->filter($search, $limit, $start, $order_field, $order_ascdesc); // Panggil fungsi filter pada SiswaModel
		$sql_filter = $this->Maintenance_request_model->count_filter($search); // Panggil fungsi count_filter pada SiswaModel
		$callback = array(
			'draw'=>$_POST['draw'], // Ini dari datatablenya
			'recordsTotal'=>$sql_total,
			'recordsFiltered'=>$sql_filter,
			'data'=>$sql_data
		);
		header('Content-Type: application/json');
		echo json_encode($callback); // Convert array $callback ke json
	}

	public function edit($id_mtr='')
	{
        // ====get list mtr details====
        $mtr_details = $this->Maintenance_request_detail_model->get_by_id_mtr_head($id_mtr);
        $data['mtr_details'] = $mtr_details;
        // ====end get list mtr details====

		$hasil = $this->Maintenance_request_model->getMasterById($id_mtr);
        $hasil = $hasil->result();

        $data['id_mtr'] = $hasil[0]->id_mtr;
        $data['no_bukti_mtr'] = $hasil[0]->no_bukti_mtr;
        $data['kode_ddi_mtr'] = $hasil[0]->kode_ddi_mtr;
        $data['kode_dept'] = $hasil[0]->kode_dept;
        $data['nama_dept'] = $hasil[0]->nama_dept;
        $data['grup_user_to'] = $hasil[0]->grup_user_to;
        $data['kode_machine'] = $hasil[0]->kode_machine;
        $data['nama_machine'] = $hasil[0]->nama_machine;
        $data['merk_machine'] = $hasil[0]->merk_machine;
        $data['allocation'] = $hasil[0]->allocation;
        $data['key_code'] = $hasil[0]->key_code;
        $data['tgl_req'] = $hasil[0]->tgl_req;
        $data['keterangan_mtr'] = $hasil[0]->keterangan_mtr;
        $data['id_user'] = $hasil[0]->id_user;
        $data['pic_requester'] = $hasil[0]->pic_requester;
        $data['no_bukti_wo'] = $hasil[0]->no_bukti_wo;
        $data['status'] = $hasil[0]->status;
        $data['created_date'] = $hasil[0]->created_date;
        $data['created_time'] = $hasil[0]->created_time;
        $data['updated_date'] = $hasil[0]->updated_date;
        $data['updated_time'] = $hasil[0]->updated_time;
        $data['user_closed'] = $hasil[0]->user_closed;
        $data['note_tambahan'] = $hasil[0]->note_tambahan;

        $data['title'] = 'SSK Program - Maintenance Request';
		//$data['stat'] = $this->Statistik_model->stock();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/left_panel');
		$this->load->view('templates/top_panel');

		$this->load->view('master_maintenance_request/edit');
		$this->load->view('templates/footer');
	}

	public function tambah ()
	{
		$data['key_code'] =$this->get_keycode_mtr();

		$data['title'] = 'SSK Program - Maintenance Request';
		// $data['stat'] = $this->Statistik_model->stock();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/left_panel');
		$this->load->view('templates/top_panel');

		$this->load->view('master_maintenance_request/tambah');
		$this->load->view('templates/footer');
	}

	public function simpan_ajax() 
    { 
        $kode_dept = $this->input->post('kode_dept');
        $kode_ddi_mtr = $this->input->post('kode_ddi_mtr');
        $datepicker = $this->input->post('datepicker');

        $status_mtr = 'Waiting';
        $status_upd = 'ADD-NEW-DATA';
        $no_bukti_mtr = $this->generate_no_fak();
        $date_mtr = date('Y-m-d');
        $time_mtr = date('H:i:s');

        #simpan head
        if($this->input->post('type')==1)
		{
	        $this->db->query("INSERT INTO mtr_head SET 
					            no_bukti_mtr = '$no_bukti_mtr',
					            kode_ddi_mtr = '$kode_ddi_mtr',
					            kode_dept = '$kode_dept',
					            tgl_req = '$datepicker'
	        				");

        	echo json_encode(array(
				"statusCode"=>200,
				"no_bukti_mtr"=>$no_bukti_mtr
			));

			$this->load->helper('url');
            redirect('Maintenance_request', 'refresh');
        }
    }

	public function generate_no_fak() 
	{
        $arr_bln = array("","A","B","C","D","E","F","G","H","I","J","K","L");
        $bulan = date('n');
        $tahun = date('Y');
        $head = "MTR-GENERAL-" . $arr_bln[$bulan] . substr($tahun, -2) . "-";
        $faktur = "";

        $q = $this->db->query("SELECT * FROM nofak WHERE head = '$head'");
        if ($q->num_rows() == 0) 
        {
            $this->db->query("INSERT INTO nofak SET head = '$head', counter = 2");
            $faktur = $head . "0001";
        } 
        else 
        {
            $q = $q->row();
            $faktur = $head . substr("0000",0,4-strlen($q->counter)) . $q->counter;
            $this->db->query("UPDATE nofak SET counter = counter + 1 WHERE head = '$head'");
        }
        return $faktur;
    }

    public function get_keycode_mtr() 
    {
        $arr_bln = array("","A","B","C","D","E","F","G","H","I","J","K","L");
        $day = date('d');
        $bulan = date('n');
        $tahun = date('Y');
        $detik = date('s');     
        $u= $this->session->userdata("id_user");   
        $user=substr($u, 0,4);
        $head = "MTR-" . $arr_bln[$bulan] . substr($tahun, -2).$day.$user;
        $faktur = "";

        $q = $this->db->query("SELECT * FROM counter_key WHERE key_code = '$head'");
        if ($q->num_rows() == 0) 
        {
            $this->db->query("INSERT INTO counter_key SET key_code = '$head', counter_key = 2");
            $faktur = $head.$detik . "00001";
        } 
        else
         {
            $q = $q->row();
            $faktur = $head.$detik . substr("00000",0,5-strlen($q->counter_key)) . $q->counter_key;
            $this->db->query("UPDATE counter_key SET counter_key = counter_key + 1 WHERE key_code = '$head'");
        }
        return $faktur;
    }
}

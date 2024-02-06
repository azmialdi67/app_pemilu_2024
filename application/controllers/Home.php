<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends AUTH_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_penyelenggara', 'penyelenggara');
		$this->load->model('M_calon', 'calon');
		$this->load->model('M_hasil', 'hasil');
		$this->load->model('M_tps', 'tps');
		$this->load->model('M_desa', 'desa');
		$this->load->model('M_csv', 'csv');
		// $this->load->model('Tps_model', 'Tps');
	}

	public function index()
	{

		// $this->readCsvAndInsertToTpsDb();
		// $this->readCsvAndInsertToDesaDb();


		$jmlcalon				= $this->calon->select_jml_calon($this->session->userdata('id_kec'));
		$jmlpemilih				= $this->penyelenggara->select_jml_pemilih($this->session->userdata('id_kec'));
		$jmldesa				= $this->penyelenggara->select_jml_desa();

		$data['jmlcalon']		= $jmlcalon;
		$data['jmlpemilih']		= $jmlpemilih;
		$data['jmldesa']		= $jmldesa;
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "Dashboard";
		$data['judul'] 			= "Dashboard";
		$data['deskripsi'] 		= "";
		$this->template->views('home', $data);
	}

	// private function readCsvAndInsertToTpsDb()
	// {
	// 	$csvData = $this->csv->read('assets\csv\data_tps_2.csv');
	// 	foreach ($csvData as $row) {
	// 		$desaName = explode(";", $row[0]);
	// 		$data = array();
	// 		$desa = $this->desa->select_by_name(trim(strtoupper($desaName[0])));

	// 		if (!empty($desa)) {
	// 			if ($desa[0] == null) {
	// 				var_dump("got null , name = " . $desaName[0]);
	// 			}
	// 			$desaDecoded = get_object_vars($desa[0]);
	// 			$data['id_desa'] = $desaDecoded['id_desa'];
	// 			$data['nama_tps'] = trim(strtoupper($desaName[1]));

	// 			// Insert data into your_table
	// 			$this->tps->insert($data);
	// 		} else {
	// 			$data['nama_tps'] = trim(strtoupper($desaName[1]));
	// 			// Insert data into your_table
	// 			$this->tps->insert($data);
	// 		}
	// 	}
	// }

// 	private function readCsvAndInsertToDesaDb()
// 	{
// 		$csvData = $this->csv->read('assets\csv\desa_fix.csv');

// 		foreach ($csvData as $row) {
// 			$csv = explode(";", $row[0]);
// 			$data = array();

// 			$data['id_desa'] = $csv[0];
// 			$data['kecamatan_id'] = $csv[1];
// 			$data['nama_desa'] = trim(strtoupper($csv[2]));

// 			// Insert data into your_table
// 			$this->desa->insertFromCsv($data);
// 		}
// 	}
}


/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
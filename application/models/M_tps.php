<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tps extends CI_Model
{


	public function select_all()
	{
		$this->db->select('*');
		$this->db->from('tbl_tps');
		$this->db->order_by('nama_tps', 'asc');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_tps()
	{
		if ($this->session->userdata('id_role') == 3) {
			$this->db->select('*');
			$this->db->from('tbl_tps');
			$this->db->like('id_desa', $this->session->userdata('id_desa'));
			$this->db->order_by('nama_tps', 'asc');
		} else {
			$this->db->select('*');
			$this->db->from('tbl_tps');
			$this->db->order_by('nama_tps', 'asc');
		}

		$data = $this->db->get();

		return $data->result();
	}


	public function select_by_id($id)
	{
		$sql = "SELECT * FROM tbl_tps WHERE id_tps = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}


	public function insert($data)
	{
		$sql = "INSERT INTO tbl_wdesa VALUES('','" . $data['nama_tps'] . "')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insertFromCsv($data)
	{
		$this->db->insert("tbl_tps", $data);
		return $this->db->insert_id();
	}

	public function insert_batch($data)
	{
		$this->db->insert_batch('tbl_tps', $data);

		return $this->db->affected_rows();
	}

	public function update($data)
	{
		$sql = "UPDATE tbl_tps SET nama_tps='" . $data['nama_tps'] . "' WHERE id_tps='" . $data['id'] . "'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id)
	{
		$sql = "DELETE FROM tbl_wdesa WHERE id_desa='" . $id . "'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama)
	{
		$this->db->where('nama_tps', $nama);
		$data = $this->db->get('tbl_tps');

		return $data->num_rows();
	}

	public function select_by_name($nama)
	{
		$this->db->where('nama_tps', $nama);
		$data = $this->db->get('tbl_tps');

		return $data->result();
	}

	public function total_rows()
	{
		$data = $this->db->get('tbl_tps');

		return $data->num_rows();
	}


	public function get_tps_data()
	{
		$query = $this->db->get('tbl_tps');
		return $query->result();  // Menggunakan result() untuk mengambil seluruh data
	}

	// ... kode lainnya ...

	// ... kode lainnya ...
}

/* End of file M_desa.php */
/* Location: ./application/models/M_desa.php */
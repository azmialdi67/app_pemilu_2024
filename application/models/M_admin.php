<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
	
	public function update($data, $id) {
		$this->db->where("id", $id);
		$this->db->update("tbl_user", $data);

		return $this->db->affected_rows();
	}
}


/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function get_pengguna()
	{
		# code...
		return $this->db->join('jabatan', 'jabatan.id_jabatan = pengguna.id_jabatan')
						->join('bagian', 'bagian.id_bagian=pengguna.id_bagian')
						->get('pengguna')
						->result();
	}

	public function get_jabatan()
	{
		return $this->db->get('jabatan')
						->result();
	}

	public function get_bagian()
	{
		return $this->db->get('bagian')
						->result();
	}

	public function tambah_pengguna()
	{
		$data = array(
					'nik' => $this->input->post('nik'), 
					'nama_depan' => $this->input->post('nama_depan'), 
					'nama_belakang' => $this->input->post('nama_belakang'), 
					'password' => $this->input->post('password'), 
					'id_jabatan' => $this->input->post('jabatan'), 
					'id_bagian' => $this->input->post('bagian'), 
				);

		$this->db->insert('pengguna', $data);

		if ($this->db->affected_rows()>0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function hapus_pengguna($id_pengguna)
	{
		$this->db->where('id_pengguna', $id_pengguna)
				 ->delete('pengguna');

		if ($this->db->affected_rows()>0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function ubah_pengguna($id_pengguna)
	{
		$data = array(
					'nik' => $this->input->post('nik'), 
					'nama_depan' => $this->input->post('nama_depan'), 
					'nama_belakang' => $this->input->post('nama_belakang'), 
					'password' => $this->input->post('password'), 
					'id_jabatan' => $this->input->post('jabatan'), 
					'id_bagian' => $this->input->post('bagian'), 
				);

		$this->db->where('id_pengguna', $id_pengguna)
				 ->update('pengguna', $data);

		if ($this->db->affected_rows()>0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

}

/* End of file pengguna_model.php */
/* Location: ./application/models/pengguna_model.php */
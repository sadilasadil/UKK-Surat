<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function user_check()
	{
		# code...
		$query = $this->db->join('jabatan', 'jabatan.id_jabatan = pengguna.id_jabatan')
						  ->join('bagian', 'bagian.id_bagian = pengguna.id_bagian')
						  ->where('nik', $this->input->post('nik'))
						  ->where('password', $this->input->post('password'))
						  ->get('pengguna');

		if ($query->num_rows() == 1) {
			# code...
			$data_pengguna = $query->row();
			$session = array(
				'logged_in'		=>	TRUE,
				'nik' 			=> $data_pengguna->nik,
				'id_pengguna' 	=> $data_pengguna->id_pengguna,
				'nama_depan' 	=> $data_pengguna->nama_depan,
				'id_jabatan' 	=> $data_pengguna->id_jabatan,
				'nama_jabatan' 	=> $data_pengguna->nama_jabatan,
				'id_bagian' 	=> $data_pengguna->id_bagian,
				'nama_bagian' 	=> $data_pengguna->nama_bagian,
				'level' 		=> $data_pengguna->level
			);

			$this->session->set_userdata($session);

			return TRUE;
		}else{
			return FALSE;
		}
	}

}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */
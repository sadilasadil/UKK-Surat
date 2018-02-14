<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function get_disposisi($id_surat_masuk)
	{
		return $this->db->join('disposisi', 'disposisi.id_surat_masuk = surat_masuk.id_surat_masuk')
					 	->join('pengguna', 'pengguna.id_pengguna = disposisi.id_penerima')
					 	->join('jabatan', 'pengguna.id_jabatan = jabatan.id_jabatan')
					 	->join('bagian', 'pengguna.id_bagian = bagian.id_bagian')
					 	->where('disposisi.id_surat_masuk', $id_surat_masuk)
					 	->get('surat_masuk')
					 	->result();
	}

	public function get_pengguna()
	{
		return $this->db->join('jabatan', 'jabatan.id_jabatan = pengguna.id_jabatan')
						->join('bagian', 'bagian.id_bagian = pengguna.id_bagian')
				 		->where('level > '.$this->session->userdata('level'))
				 		->get('pengguna')
				 		->result();
	}

	public function tambah_disposisi($id_surat_masuk)
	{
		$data = array(
			'id_surat_masuk' => $id_surat_masuk,
			'id_pengirim'	 =>$this->session->userdata('id_pengguna'),
			'id_penerima'	 => $this->input->post('tujuan'),
			'tanggal_disposisi' => $this->input->post('tanggal'),
			'catatan'		=> $this->input->post('catatan'),
			'status_surat'		=> '0'
		);

		$this->db->insert('disposisi', $data);

		if ($this->db->affected_rows()>0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function hapus_disposisi($id_disposisi)
	{
		# code...
		$this->db->where('id_disposisi', $id_disposisi)
				 ->delete('disposisi');
				 
		if ($this->db->affected_rows()>0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

}

/* End of file disposisi_model.php */
/* Location: ./application/models/disposisi_model.php */

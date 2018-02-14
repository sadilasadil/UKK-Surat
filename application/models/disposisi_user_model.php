<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi_user_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function get_disposisi_masuk($id_penerima)
	{
		return $this->db->join('disposisi', 'disposisi.id_surat_masuk = surat_masuk.id_surat_masuk')
					 	->join('pengguna', 'pengguna.id_pengguna = disposisi.id_pengirim')
					 	->join('jabatan', 'pengguna.id_jabatan = jabatan.id_jabatan')
					 	->join('bagian', 'pengguna.id_bagian = bagian.id_bagian')
					 	->where('id_penerima', $id_penerima)
					 	->get('surat_masuk')
					 	->result();
	}

	public function get_disposisi_keluar($id_pengirim)
	{
		return $this->db->join('disposisi', 'disposisi.id_surat_masuk = surat_masuk.id_surat_masuk')
					 	->join('pengguna', 'pengguna.id_pengguna = disposisi.id_penerima')
					 	->join('jabatan', 'pengguna.id_jabatan = jabatan.id_jabatan')
					 	->join('bagian', 'pengguna.id_bagian = bagian.id_bagian')
					 	->where('disposisi.id_pengirim', $this->session->userdata('id_pengguna'))
					 	->where('disposisi.id_surat_masuk', $this->uri->segment(3))
					 	->get('surat_masuk')
					 	->result();
	}

	public function tambah_disposisi_keluar($id_surat_masuk)
	{
		$data = array(
			'id_surat_masuk' 	=> $id_surat_masuk,
			'id_pengirim'		=>$this->session->userdata('id_pengguna'),
			'id_penerima'	 	=> $this->input->post('tujuan'),
			'tanggal_disposisi' => $this->input->post('tanggal'),
			'catatan'			=> $this->input->post('catatan'),
			'status_surat'		=> '0',
			// 'id_disposisi_id' 	=> $this->input->post('id_disposisi')
		);

		$this->db->insert('disposisi', $data);

		if ($this->db->affected_rows()>0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

}

/* End of file disposisi_masuk_model.php */
/* Location: ./application/models/disposisi_masuk_model.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_masuk_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function get_data_dashboard()
	{
		# code...
		$surat_masuk = $this->db->select('count(*) as total')
								->get('surat_masuk')
								->row();
		$surat_keluar = $this->db->select('count(*) as total')
								 ->get('surat_keluar')
								 ->row();
		$pengguna = $this->db->select('count(*) as total')
								 ->get('pengguna')
								 ->row();

		return array(
			'surat_masuk' => $surat_masuk->total,
			'surat_keluar' => $surat_keluar->total,
			'pengguna' => $pengguna->total
			);
	}

	public function get_jenis_surat()
	{
		return $this->db->get('jenis_surat')
						->result();
	}

	public function get_surat_masuk()
	{
		# code...
		return $this->db->join('jenis_surat', 'jenis_surat.id_jenis_surat = surat_masuk.id_jenis_surat')
						->get('surat_masuk')
				 		->result();
	}

	/*public function get_surat_masuk_by_id($id_surat_masuk)
	{
		$query = $this->db->where('id_surat_masuk', $id_surat_masuk)
						->get('surat_masuk')
						->row();
		echo json_encode($query);
	}*/

	public function tambah_surat($data_surat)
	{
		$data = array(
				'nomor_agenda' => $this->input->post('nomor_agenda'),
				'nomor_surat' => $this->input->post('nomor_surat'),
				'id_jenis_surat' => $this->input->post('jenis'),
				'pengirim' => $this->input->post('pengirim'),
				'penerima' => $this->input->post('penerima'),
				'tanggal_kirim' => $this->input->post('tanggal_kirim'),
				'tanggal_terima' => $this->input->post('tanggal_terima'),
				'perihal' => $this->input->post('perihal'),
				'data_surat' => $data_surat['file_name']
			);

		$this->db->insert('surat_masuk', $data);
		if ($this->db->affected_rows()>0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function hapus_surat($id_surat_masuk)
	{
		# code...
		$this->db->where('id_surat_masuk', $id_surat_masuk)
				 ->delete('surat_masuk');
				 
		if ($this->db->affected_rows()>0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function ubah_surat($id_surat_masuk)
	{
		$data = array(
				'nomor_agenda' => $this->input->post('edit_nomor_agenda'),
				'nomor_surat' => $this->input->post('edit_nomor_surat'),
				'id_jenis_surat' => $this->input->post('edit_jenis'),
				'pengirim' => $this->input->post('edit_pengirim'),
				'penerima' => $this->input->post('edit_penerima'),
				'tanggal_kirim' => $this->input->post('edit_tanggal_kirim'),
				'tanggal_terima' => $this->input->post('edit_tanggal_terima'),
				'perihal' => $this->input->post('edit_perihal')
			);

		$this->db->where('id_surat_masuk', $id_surat_masuk)
				 ->update('surat_masuk', $data);
				 
		if ($this->db->affected_rows()>0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function ubah_file_surat($data_surat, $id_surat_masuk)
	{
		$data = array('data_surat' => $data_surat['file_name']);

		$this->db->where('id_surat_masuk', $id_surat_masuk)
				 ->update('surat_masuk', $data);

		if ($this->db->affected_rows()>0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */
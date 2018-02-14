<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DisKeluar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('disposisi_model');
		$this->load->model('disposisi_user_model');
		$this->load->model('surat_masuk_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')==TRUE) {
			$data['main_view'] = 'pegawai/disposisi_keluar_view';
			$this->load->view('template_view', $data);
		}else{
			redirect('login');
		}
	}

	public function disKeluar($id_surat_masuk)
	{
		if ($this->session->userdata('logged_in')==TRUE) {
			$data['main_view'] = 'pegawai/disposisi_keluar_view';
			$data['data_tujuan'] = $this->disposisi_model->get_pengguna();
			$data['data_diskeluar'] = $this->disposisi_user_model->get_disposisi_keluar($this->session->userdata('id_pengguna'));
			$data['data_surat']	=$this->surat_masuk_model->get_surat_masuk_by_id($id_surat_masuk);
			$this->load->view('template_view', $data);
		}else{
			redirect('login');
		}
	}

	public function tambah_disposisi_keluar()
	{
		if ($this->session->userdata('logged_in')==TRUE) {
			$this->form_validation->set_rules('tujuan', 'Tujuan', 'trim|required');
			$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
			$this->form_validation->set_rules('catatan', 'Catatan', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if ($this->disposisi_user_model->tambah_disposisi_keluar($this->uri->segment(3))==TRUE) {
					$this->session->set_flashdata('notif', 'Tambah disposisi berhasil');
					if ($this->session->userdata('nama_jabatan')!='Admin') {
						redirect('disKeluar/disKeluar/'.$this->uri->segment(3));
					}else{
						redirect('');
					}
				}else{
					$this->session->set_flashdata('notif', 'Tambah disposisi gagal');
					if ($this->session->userdata('nama_jabatan')!='Admin') {
						redirect('disKeluar/disKeluar/'.$this->uri->segment(3));
					}else{
						redirect('');
					}
				}
			} else {
				$this->session->set_flashdata('notif', validattion_errors());
				if ($this->session->userdata('nama_jabatan')!='Admin') {
					redirect('disKeluar/disKeluar/'.$this->uri->segment(3));
				}else{
					redirect('');
				}
			}
		}else{
			redirect('login');
		}
	}

}

/* End of file disKeluar.php */
/* Location: ./application/controllers/disKeluar.php */
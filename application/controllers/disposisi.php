<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('disposisi_model');
		$this->load->model('surat_masuk_model');
		
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')==TRUE) {
			# code...
			if ($this->session->userdata('nama_jabatan')=='Admin') {
				# code...
				$data['main_view'] = 'admin/disposisi_admin_view';
				$this->load->view('template_view', $data);
			}else{
				redirect('login'); //sementara
			}
		}else{
			redirect('login');
		}
	}

	public function disposisi($id_surat_masuk)
	{
		if ($this->session->userdata('logged_in')==TRUE) {
			# code...
			if ($this->session->userdata('nama_jabatan')=='Admin') {
				# code...
				$data['main_view'] = 'admin/disposisi_admin_view';
				$data['data_tujuan'] = $this->disposisi_model->get_pengguna();
				$data['data_surat'] = $this->surat_masuk_model->get_surat_masuk_by_id($this->uri->segment(3));
				$data['data_disposisi'] = $this->disposisi_model->get_disposisi($id_surat_masuk);
				$this->load->view('template_view', $data);
			}else{
				redirect('login'); //sementara
			}
		}else{
			redirect('login');
		}
	}

	public function tambah_disposisi()
	{
		if ($this->session->userdata('logged_in')==TRUE) {
			$this->form_validation->set_rules('tujuan', 'Tujuan', 'trim|required');
			$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
			$this->form_validation->set_rules('catatan', 'Catatan', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if ($this->disposisi_model->tambah_disposisi($this->uri->segment(3))==TRUE) {
					$this->session->set_flashdata('notif', 'Tambah disposisi berhasil');
					if ($this->session->userdata('nama_jabatan')=='Admin') {
						redirect('disposisi/disposisi/'.$this->uri->segment(3));
					}else{
						redirect('');
					}
				}else{
					$this->session->set_flashdata('notif', 'Tambah disposisi gagal');
					if ($this->session->userdata('nama_jabatan')=='Admin') {
						redirect('disposisi/disposisi/'.$this->uri->segment(3));
					}else{
						redirect('');
					}
				}
			} else {
				$this->session->set_flashdata('notif', validattion_errors());
				if ($this->session->userdata('nama_jabatan')=='Admin') {
					redirect('disposisi/disposisi/'.$this->uri->segment(3));
				}else{
					redirect('');
				}
			}
		}else{
			redirect('login');
		}
	}

	public function hapus_disposisi($id_surat,$id_disposisi)
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->disposisi_model->hapus_disposisi($id_disposisi) == TRUE){
				$this->session->set_flashdata('notif', 'Hapus disposisi berhasil');
				redirect('disposisi/disposisi/'. $id_surat);
			} else {
				$this->session->set_flashdata('notif', 'Hapus disposisi gagal');
				redirect('disposisi/disposisi/'.$id_surat);
			}
		} else {
			redirect('login');
		}
	}


}

/* End of file disposisi.php */
/* Location: ./application/controllers/disposisi.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pengguna_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')==TRUE) {
			# code...
			if ($this->session->userdata('nama_jabatan')=='Admin') {
				# code...
				$data['main_view'] = 'admin/pengguna_view';
				$data['data_pengguna'] = $this->pengguna_model->get_pengguna();
				$data['data_jabatan'] = $this->pengguna_model->get_jabatan();
				$data['data_bagian'] = $this->pengguna_model->get_bagian();				
				$this->load->view('template_view', $data);
			}else{
				redirect('login'); //sementara
			}
		}else{
			redirect('login');
		}
	}

	public function tambah_pengguna()
	{
		if ($this->session->userdata('logged_in')==TRUE) {
			if ($this->session->userdata('nama_jabatan')=='Admin') {
				$this->form_validation->set_rules('nik', 'NIK', 'trim|required|numeric');
				$this->form_validation->set_rules('nama_depan', 'Nama Depan', 'trim|required');
				$this->form_validation->set_rules('nama_belakang', 'Nama Belakang', 'trim|required');
				$this->form_validation->set_rules('password', 'Password', 'trim|required');
				$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
				$this->form_validation->set_rules('bagian', 'Bagian', 'trim|required');

				if ($this->form_validation->run() == TRUE) {
					if ($this->pengguna_model->tambah_pengguna()==TRUE) {
						$this->session->set_flashdata('notif', 'Tambah Pengguna Berhasil');
						redirect('pengguna');
					}else{
						$this->session->set_flashdata('notif', 'Tambah Anggota Gagal');
						redirect('pengguna');
					}
				} else {
					$this->session->set_flashdata('notif', validation_errors());
					redirect('pengguna');
				}
			}
		}else{
			redirect('login');
		}
	}

	public function hapus_pengguna($id_pengguna)
	{
		if ($this->session->userdata('logged_in')==TRUE) {
			if ($this->session->userdata('nama_jabatan')=='Admin') {
				if ($this->pengguna_model->hapus_pengguna($id_pengguna)==TRUE) {
					$this->session->set_flashdata('notif', 'Hapus Pengguna Berhasil');
					redirect('pengguna');
				}else{
					$this->session->set_flashdata('notif', 'Hapus Pengguna Gagal');
					redirect('Pengguna');
				}
			}
		}else{
			redirect('login');
		}
	}

	public function ubah_pengguna($id_pengguna)
	{
		if ($this->session->userdata('logged_in')==TRUE) {
			if ($this->session->userdata('nama_jabatan')=='Admin') {
				$this->form_validation->set_rules('nik', 'NIK', 'trim|required|numeric');
				$this->form_validation->set_rules('nama_depan', 'Nama Depan', 'trim|required');
				$this->form_validation->set_rules('nama_belakang', 'Nama Belakang', 'trim|required');
				$this->form_validation->set_rules('password', 'Password', 'trim|required');
				$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
				$this->form_validation->set_rules('bagian', 'Bagian', 'trim|required');

				if ($this->form_validation->run() == TRUE) {
					if ($this->pengguna_model->ubah_pengguna($id_pengguna)==TRUE) {
						$this->session->set_flashdata('notif', 'Ubah Pengguna Berhasil');
						redirect('pengguna');
					}else{
						$this->session->set_flashdata('notif', 'Ubah Pengguna Gagal');
						redirect('pengguna');
					}
				} else {
					$this->session->set_flashdata('notif', validation_errors());
					redirect('pengguna');
				}
			}
		}redirect('login');
	}

}

/* End of file pengguna.php */
/* Location: ./application/controllers/pengguna.php */
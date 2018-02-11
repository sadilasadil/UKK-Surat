<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('surat_masuk_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->session->userdata('nama_jabatan') == 'Admin') {
				# code...
				$data['main_view'] = 'admin/dashboard_view';
				$data['data_dashboard'] = $this->surat_masuk_model->get_data_dashboard();
				$this->load->view('template_view', $data);

			}else{
				$data['main_view'] = 'pegawai/dashboard_pegawai_view';
				$this->load->view('template_view', $data);
			}
			
		}else{
			redirect('login');
		}
	}

	public function surat_masuk()
	{
		if ($this->session->userdata('logged_in')==TRUE) {
			# code...
			if ($this->session->userdata('nama_jabatan')=='Admin') {
				# code...
				$data['main_view'] = 'admin/surat_masuk_view';
				$data['data_surat_masuk'] = $this->surat_masuk_model->get_surat_masuk();
				$data['data_jenis'] = $this->surat_masuk_model->get_jenis_surat();
				$this->load->view('template_view', $data);
			}else{
				$data['main_view'] = 'pegawai/dashboard_pegawai_view';
				$this->load->view('template_view', $data);
			}
		}else{
			redirect('login');
		}		
	}

	public function hapus_surat($id_surat_masuk)
	{
		if ($this->session->userdata('logged_in')==TRUE) {
			if ($this->session->userdata('nama_jabatan')=='Admin') {
				if ($this->surat_masuk_model->hapus_surat($id_surat_masuk)==TRUE) {
					$this->session->set_flashdata('notif', 'Hapus Surat Berhasil');
					redirect('masuk/surat_masuk');
				}else{
					$this->session->set_flashdata('notif', 'Hapus Surat Gagal');
					redirect('masuk/surat_masuk');
				}
			}
		}else{
			redirect('login');
		}
	}

	public function tambah_surat()
	{
		if ($this->session->userdata('logged_in')==TRUE) {
			if ($this->session->userdata('nama_jabatan')=='Admin') {
				$this->form_validation->set_rules('nomor_agenda', 'Nomor Agenda', 'trim|required');
				$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'trim|required');
				$this->form_validation->set_rules('jenis', 'Jenis', 'trim|required');
				$this->form_validation->set_rules('pengirim', 'Pengirim', 'trim|required');
				$this->form_validation->set_rules('penerima', 'Penerima', 'trim|required');
				$this->form_validation->set_rules('tanggal_kirim', 'Tanggal Kirim', 'trim|required|date');
				$this->form_validation->set_rules('tanggal_terima', 'Tanggal Terima', 'trim|required|date');
				$this->form_validation->set_rules('perihal', 'Perihal', 'trim|required');

				if ($this->form_validation->run() == TRUE) {
					$config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'pdf';
					$config['max_size']  = 2000;
					
					$this->load->library('upload', $config);
					
					if ($this->upload->do_upload('data_surat')){
						
						if ($this->surat_masuk_model->tambah_surat($this->upload->data())==TRUE) {
							# code...
							$this->session->set_flashdata('notif', 'Tambah Surat Berhasil');
							redirect('masuk/surat_masuk');
						}else{
							$this->session->set_flashdata('notif', 'Tambah Surat Gagal');
							redirect('masuk/surat_masuk');
						}
					}else{
						$this->session->set_flashdata('notif', $this->upload->display_errors());
						redirect('masuk/surat_masuk');
					}	
			} else{
				$this->session->set_flashdata('notif', validation_errors());
				redirect('masuk/surat_masuk');
			}
		}
		} else {
			redirect('login');
		}

	}


	public function ubah_surat($id_surat_masuk)
	{
		if ($this->session->userdata('logged_in')==TRUE) {
			if ($this->session->userdata('nama_jabatan')=='Admin') {
				$this->form_validation->set_rules('edit_nomor_agenda', 'Nomor Agenda', 'trim|required');
				$this->form_validation->set_rules('edit_nomor_surat', 'Nomor Surat', 'trim|required');
				$this->form_validation->set_rules('edit_jenis', 'Jenis', 'trim|required');
				$this->form_validation->set_rules('edit_pengirim', 'Pengirim', 'trim|required');
				$this->form_validation->set_rules('edit_penerima', 'Penerima', 'trim|required');
				$this->form_validation->set_rules('edit_tanggal_kirim', 'Tanggal Kirim', 'trim|required|date');
				$this->form_validation->set_rules('edit_tanggal_terima', 'Tanggal Terima', 'trim|required|date');
				$this->form_validation->set_rules('edit_perihal', 'Perihal', 'trim|required');

				if ($this->form_validation->run() == TRUE) {
					if ($this->surat_masuk_model->ubah_surat($id_surat_masuk) == TRUE) {
						$this->session->set_flashdata('notif', 'Ubah Surat Berhasil');
						redirect('masuk/surat_masuk');
					}else{
						$this->session->set_flashdata('notif', 'Ubah Surat Gagal');
						redirect('masuk/surat_masuk');
					}
				} else {
					$this->session->set_flashdata('notif', validation_errors());
					redirect('masuk/surat_masuk');
				}
			}
		}else{
			redirect('login');
		}
	}

	public function ubah_file_surat($id_surat_masuk)
	{
		if ($this->session->userdata('logged_in')==TRUE) {
			if ($this->session->userdata('nama_jabatan')=='Admin') {
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'pdf';
				
				$this->load->library('upload', $config);
				
				if ($this->upload->do_upload('edit_data_surat')){
					if ($this->surat_masuk_model->ubah_file_surat($this->upload->data(),$id_surat_masuk)==TRUE) {
						$this->session->set_flashdata('notif', 'Ubah File Surat Berhasil');
						redirect('masuk/surat_masuk');
					}else{
						$this->session->set_flashdata('notif', 'Ubah File Surat Gagal');
						redirect('masuk/surat_masuk');
					}
				}else{
					$this->session->set_flashdata('notif', $this->upload->display_errors());
					redirect('masuk/surat_masuk');
				}
			}
		}else{
			redirect('login');
		}
	}


}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
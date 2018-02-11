<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluar extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('logged_in')==TRUE) {
			# code...
			if ($this->session->userdata('nama_jabatan')=='Admin') {
				# code...
				$data['main_view'] = 'admin/surat_keluar_view';
				$this->load->view('template_view', $data);
			}else{
				redirect('login'); //sementara
			}
		}else{
			redirect('login');
		}
	}

}

/* End of file keluar.php */
/* Location: ./application/controllers/keluar.php */
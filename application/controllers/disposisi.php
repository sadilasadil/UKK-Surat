<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
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

}

/* End of file disposisi.php */
/* Location: ./application/controllers/disposisi.php */
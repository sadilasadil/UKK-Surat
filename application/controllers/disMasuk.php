<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DisMasuk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')==TRUE) {
			$data['main_view'] = 'pegawai/disposisi_masuk_view';
			$this->load->view('template_view', $data);
		}else{
			redirect('login');
		}
	}

}

/* End of file disMasuk.php */
/* Location: ./application/controllers/disMasuk.php */
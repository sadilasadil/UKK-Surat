<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DisMasuk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('disposisi_user_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')==TRUE) {
			$data['main_view'] = 'pegawai/dashboard_pegawai_view';
			$this->load->view('template_view', $data);
		}else{
			redirect('login');
		}
	}

	public function disMasuk()
	{
		if ($this->session->userdata('logged_in')==TRUE) {
			$data['main_view'] = 'pegawai/disposisi_masuk_view';
			$data['data_dismasuk'] = $this->disposisi_user_model->get_disposisi_masuk($this->session->userdata('id_pengguna'));
			$this->load->view('template_view', $data);
		}else{
			redirect('login');
		}
	}

}

/* End of file disMasuk.php */
/* Location: ./application/controllers/disMasuk.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')==TRUE) {
			# code...
			redirect('masuk');
		}else{
			$this->load->view('login_view');
		}
		
	}

	public function do_login()
	{
		# code...
		if ($this->session->userdata('logged_in') == TRUE) {
			# code...
			redirect('masuk');
		}else{
			$this->form_validation->set_rules('nik', 'NIK', 'trim|required|numeric');
			$this->form_validation->set_rules('password', 'password', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				# code...
				if ($this->login_model->user_check()==TRUE) {
					# code...
					$this->session->set_flashdata('notif', 'Login Berhasil');
					redirect('masuk');
				}else{
					$this->session->set_flashdata('notif', 'NIK atau Password salah');
					redirect('login');
					}
			} else {
				# code...
				$this->session->set_flashdata('notif', validation_errors());
				redirect('login');
			} 
		}
	}

	public function logout()
	{
		# code...
		if ($this->session->userdata('logged_in')==TRUE) {
			# code...
			$this->session->sess_destroy();
			redirect('login');
		}
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('surat_model');
		$this->load->model('auth_model');
	}
	public function index()
	{
		if ($this->session->userdata('logged_in') != TRUE) {
				$this->load->view('login_v');
			}
		else{
			redirect('');
		}	
	}
	public function login(){
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$data = $this->auth_model->check_login();
			if ($data == TRUE) {
				$this->session->set_flashdata('notif', 'Anda sukses login');
				$this->session->set_flashdata('tipe_notif', 'success');
				redirect('');
			}
			else{
				$this->session->set_flashdata('notif', 'Maaf, nama atau password anda salah');
				$this->session->set_flashdata('tipe_notif', 'danger');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('notif', validation_errors());
			$this->session->set_flashdata('tipe_notif', 'warning');
			redirect('auth');
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('auth');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
	}

	public function check_login(){
		$nama = explode(" ", $this->input->post('nama'));
		$password = md5($this->input->post('password'));
		$nama_depan = $nama[0];
		$nama_belakang = $nama[1];
		$query_check = $this->GetUser(['nama_depan'=> $nama_depan,'nama_belakang'=> $nama_belakang,'kata_sandi'=>$password]);
		$level_jb = $this->home_model->GetData(['id_jabatan'=> $query_check->row('id_jabatan')],'jabatan')->row('level');
		if ($query_check->num_rows() > 0) {
			$data =[
				'nama_depan' => $nama_depan,
				'logged_id'	 => $query_check->row('id_pengguna'),
				'logged_in'	 => TRUE,
				'level'		 => $level_jb,
			];
			
			$this->session->set_userdata( $data );
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	public function GetUser($where){
		return $this->db->where($where)->get('pengguna');
	}

}

/* End of file auth.model.php */
/* Location: ./application/models/auth.model.php */
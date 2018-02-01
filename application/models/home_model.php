<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
	}
	public function get_user($limit,$mulai,$where){
		if ($where == '') {
			return $this->db->limit($limit, $mulai)
						->join('jabatan','pengguna.id_jabatan = jabatan.id_jabatan')
						->join('bagian','bagian.id_bagian = pengguna.id_bagian')
						->group_by('id_pengguna')
						->order_by('id_pengguna', 'ASC')
						->get('pengguna')->result();	
		}
		else{
			return $this->db->where($where)->limit($limit, $mulai)
						->join('jabatan','pengguna.id_jabatan = jabatan.id_jabatan')
						->join('bagian','bagian.id_bagian = pengguna.id_bagian')
						->group_by('id_pengguna')
						->order_by('id_pengguna', 'ASC')
						->get('pengguna')->result();	
		}
		
	}
	public function get_surat_masuk($limit,$mulai,$where){
		if ($where == '') {
			return $this->db->limit($limit, $mulai)
						->join('jenis_surat','surat_masuk.id_jenis_surat = jenis_surat.id_jenis_surat')
						->order_by('id_surat_masuk', 'ASC')
						->group_by('id_surat_masuk')
						->get('surat_masuk')->result();	
		}
		else{
			return $this->db->where($where)->limit($limit, $mulai)
						->join('jenis_surat','surat_masuk.id_jenis_surat = jenis_surat.id_jenis_surat')
						->order_by('id_surat_masuk', 'ASC')
						->group_by('id_surat_masuk')
						->get('surat_masuk')->result();	
		}
		
	}
	public function get_surat_keluar($limit,$mulai,$where){
		if ($where == '') {
			return $this->db->limit($limit, $mulai)
						->join('jenis_surat','surat_keluar.id_jenis_surat = jenis_surat.id_jenis_surat')
						->order_by('id_surat_keluar', 'ASC')
						->group_by('id_surat_keluar')
						->get('surat_keluar')->result();
		}
		else{
			return $this->db->where($where)->limit($limit, $mulai)
						->join('jenis_surat','surat_keluar.id_jenis_surat = jenis_surat.id_jenis_surat')
						->order_by('id_surat_keluar', 'ASC')
						->group_by('id_surat_keluar')
						->get('surat_keluar')->result();
		}
			
		
		
	}

	public function get_disposisi($limit,$mulai,$where,$or_where){
		if ($where == '' && $or_where=='') {
		return $this->db
						->limit($limit, $mulai)
						->join('surat_masuk','disposisi.id_surat_masuk = surat_masuk.id_surat_masuk')
						->join('pengguna','pengguna.id_pengguna = disposisi.kepada_id')
						->join('jabatan', 'jabatan.id_jabatan = disposisi.kepada_kat')
						->order_by('id_disposisi', 'DESC')
						->group_by('id_disposisi')
						->get('disposisi')->result();
		}
		else if ($or_where == ''){
			return $this->db->where($where)->limit($limit, $mulai)
						->join('surat_masuk','disposisi.id_surat_masuk = surat_masuk.id_surat_masuk')
						->join('pengguna','pengguna.id_pengguna = disposisi.kepada_id')
						->join('jabatan', 'jabatan.id_jabatan = disposisi.kepada_kat')
						->order_by('id_disposisi', 'DESC')
						->group_by('id_disposisi')
						->get('disposisi')
						->result();
		}
		else{
			return $this->db->where($where)->or_where($or_where)->limit($limit, $mulai)
						->join('surat_masuk','disposisi.id_surat_masuk = surat_masuk.id_surat_masuk')
						->join('pengguna','pengguna.id_pengguna = disposisi.kepada_id')
						->join('jabatan', 'jabatan.id_jabatan = disposisi.kepada_kat')
						->order_by('id_disposisi', 'DESC')
						->group_by('id_disposisi')
						->get('disposisi')->result();
		}	
	}
	public function get_mini_disposisi(){
		$user_id = $this->session->userdata('logged_id');
		$jb_user = $this->auth_model->GetUser(['id_pengguna'=> $user_id])->row('id_jabatan');

		$disposisi_statusnol = count($this->GetData(['kepada_id' => $user_id,'status_surat'=>'0'],'disposisi')->result());
		if ($disposisi_statusnol > 5) {
			$limit = 0;
			$mulai = 0;
		}
		else{
			$limit = 5;
			$mulai = 0;	
		}
		return $this->db->where(['kepada_id' => $user_id])->or_where(['kepada_kat' => $jb_user])->limit($limit, $mulai)
						->join('surat_masuk','disposisi.id_surat_masuk = surat_masuk.id_surat_masuk')
						->join('pengguna','pengguna.id_pengguna = disposisi.kepada_id')
						->join('jabatan', 'jabatan.id_jabatan = disposisi.kepada_kat')
						->order_by('status_surat', 'ASC')
						->group_by('id_disposisi')
						->get('disposisi')->result();
	}
	public function insert_user(){
		$data =[
			'nama_depan'=> $this->input->post('nama_depan'),
			'nama_belakang'=> $this->input->post('nama_belakang'),
			'id_jabatan'=> $this->input->post('id_jabatan'),
			'id_bagian'=> $this->input->post('id_bagian'),
			'kata_sandi' => md5($this->input->post('nama_depan')),
		];
		$this->db->insert('pengguna',$data);
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	public function tambah($data, $table){
		$this->db->insert($table,$data);
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	public function delete($where,$table){
		$this->db->where($where)
				 ->delete($table);
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	public function update($data,$where,$table){
		$this->db->where($where)
				 ->update($table,$data);
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	public function GetData($where, $table){
		return $this->db->where($where)->get($table);
	}
	public function GetDataOR($where,$where_or,$table){
		return $this->db->where($where)->or_where($where_or)->get($table);
	}
	public function GetAllData($table){
		return $this->db->get($table)->result();
	}

}

/* End of file home_mode.php */
/* Location: ./application/models/home_mode.php */
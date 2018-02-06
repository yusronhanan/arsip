<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_model extends CI_Model {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
		$this->load->model('home_model');
	}
	public function insert_surat_masuk($img){
		$data =[
			'no_agenda'=> $this->input->post('no_agenda'),
			'nomor_surat'=> $this->input->post('nomor_surat'),
			'id_jenis_surat'=> $this->input->post('id_jenis_surat'),
			'pengirim'=> $this->input->post('pengirim'),
			'penerima'=> $this->input->post('penerima'),
			'tanggal_kirim'=> $this->input->post('tanggal_kirim'),
			'tanggal_terima'=> $this->input->post('tanggal_terima'),
			'perihal'=>  $this->input->post('perihal'),
			'file_surat'=> $img['file_name'],
		];
		$this->db->insert('surat_masuk',$data);
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	public function edit_surat_masuk(){
		$data =[
			'no_agenda'=> $this->input->post('noo_agenda'),
			'nomor_surat'=> $this->input->post('nomorr_surat'),
			'id_jenis_surat'=> $this->input->post('idd_jenis_surat'),
			'pengirim'=> $this->input->post('pengirimm'),
			'penerima'=> $this->input->post('penerimaa'),
			'tanggal_kirim'=> $this->input->post('tanggall_kirim'),
			'tanggal_terima'=> $this->input->post('tanggall_terima'),
			'perihal'=>  $this->input->post('perihall'),
		];
		$this->db->where(['id_surat_masuk'=> $this->input->post('idd_surat_masuk')])->update('surat_masuk',$data);
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	public function edit_surat_keluar(){
		$data =[
			'no_agenda'=> $this->input->post('noo_agenda'),
			'nomor_surat'=> $this->input->post('nomorr_surat'),
			'id_jenis_surat'=> $this->input->post('idd_jenis_surat'),
			'pengirim'=> $this->input->post('pengirimm'),
			'penerima'=> $this->input->post('penerimaa'),
			'tanggal_kirim'=> $this->input->post('tanggall_kirim'),
			'perihal'=>  $this->input->post('perihall'),
		];
		$this->db->where(['id_surat_keluar'=> $this->input->post('idd_surat_keluar')])->update('surat_keluar',$data);
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	public function edit_file_surat_masuk($img){
		$data =[
		'file_surat'=> $img['file_name'],
		];
		$this->db->where(['id_surat_masuk'=> $this->input->post('iddd_surat_masuk')])->update('surat_masuk',$data);
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	public function edit_file_surat_keluar($img){
		$data =[
		'file_surat'=> $img['file_name'],
		];
		$this->db->where(['id_surat_keluar'=> $this->input->post('iddd_surat_keluar')])->update('surat_keluar',$data);
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	public function insert_surat_keluar($img){
		$data =[
			'no_agenda'=> $this->input->post('no_agenda'),
			'nomor_surat'=> $this->input->post('nomor_surat'),
			'id_jenis_surat'=> $this->input->post('id_jenis_surat'),
			'pengirim'=> $this->input->post('pengirim'),
			'penerima'=> $this->input->post('penerima'),
			'tanggal_kirim'=> $this->input->post('tanggal_kirim'),
			'perihal'=>  $this->input->post('perihal'),
			'file_surat'=> $img['file_name'],
		];
		$this->db->insert('surat_keluar',$data);
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	public function insert_disposisi_parent()
	{
		$data =[
			'id_surat_masuk'=> $this->input->post('idddd_surat_masuk'),
			'kepada_kat'=> $this->input->post('kepada_kat'),
			'kepada_id'=> $this->input->post('kepada_id'),
			'catatan'=> $this->input->post('catatan'),
			'id_parent_disposisi'=> '0',
		];
		$this->db->insert('disposisi',$data);
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	public function get_jb_bagian($where,$or_where){
			return $this->db->select('jabatan.nama_jabatan, jabatan.id_jabatan')
						->where($where)
						->or_where($or_where)
						->join('bagian', 'bagian.id_bagian = pengguna.id_bagian')
						->join('jabatan', 'jabatan.id_jabatan = pengguna.id_jabatan')
						// ->order_by('id_pengguna', 'ASC')
						->group_by('pengguna.id_pengguna')
						->get('pengguna')
						->result();
			
	}
	public function get_pg_bagian($where,$or_where){
			return $this->db
			->select('pengguna.id_pengguna, pengguna.nama_depan, pengguna.nama_belakang')
						->where($where)
						->or_where($or_where)
						->join('bagian', 'bagian.id_bagian = pengguna.id_bagian')
						->join('jabatan', 'jabatan.id_jabatan = pengguna.id_jabatan')
						// ->order_by('id_pengguna', 'ASC')
						->group_by('pengguna.id_pengguna')
						->get('pengguna')
						->result();
			
	}
	public function lihat_alur_parent($where){
			return $this->db->where($where)
						->join('surat_masuk','disposisi.id_surat_masuk = surat_masuk.id_surat_masuk')
						->join('pengguna','pengguna.id_pengguna = disposisi.kepada_id')
						->join('jabatan', 'jabatan.id_jabatan = disposisi.kepada_kat')
						->order_by('id_disposisi', 'ASC')
						->group_by('id_disposisi')
						->get('disposisi')->row();
			
	}
	public function lihat_alur_child($where){
			return $this->db->where($where)
						->join('surat_masuk','disposisi.id_surat_masuk = surat_masuk.id_surat_masuk')
						->join('pengguna','pengguna.id_pengguna = disposisi.kepada_id')
						->join('jabatan', 'jabatan.id_jabatan = disposisi.kepada_kat')
						->order_by('id_disposisi', 'ASC')
						->group_by('id_disposisi')
						->get('disposisi')->result();
			
	}
	public function terima_disposisi(){
		$id_disposisi = $this->input->post('iddd_disposisi');
		$id_surat_masuk = $this->home_model->GetData(['id_disposisi'=> $id_disposisi],'disposisi')->row('id_surat_masuk');
		$cek = $this->home_model->GetData(['id_disposisi'=> $id_disposisi],'disposisi')->row('id_parent_disposisi');

		if ($cek == '0') {
		$update_berfore = [
			'status_surat'=> '2',
			'tanggapan'=> $this->input->post('tanggapan'),
		];
		$this->db->where(['id_disposisi'=> $id_disposisi])
				->update('disposisi',$update_berfore);
		
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	else{
	$update_berfore = [
			'status_surat'=> '2',
			'tanggapan'=> $this->input->post('tanggapan'),
		];
	$update_parent = [
			'status_surat'=> '2',
		];
		$this->db->where(['id_disposisi'=> $cek]) //parent change
				->update('disposisi',$update_parent);

		$this->db->where(['id_parent_disposisi'=> $cek]) // with id parent disposisi change
				->update('disposisi',$update_parent);

		$this->db->where(['id_disposisi'=> $id_disposisi]) // id disposisi change
				->update('disposisi',$update_berfore);
		
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}
		else{
			return FALSE;
		}
		// 0 waiting, 1 get respone, 2 all proses in line done (only on parent and last line)
	}
	}
	public function insert_disposisi_child()
	{
		$id_disposisi = $this->input->post('idd_disposisi');
		$id_surat_masuk = $this->home_model->GetData(['id_disposisi'=> $id_disposisi],'disposisi')->row('id_surat_masuk');
		$cek = $this->home_model->GetData(['id_disposisi'=> $id_disposisi],'disposisi')->row('id_parent_disposisi');
		if ($cek == '0') {
		$update_berfore = [
			'status_surat'=> '1',
			'tanggapan'=> $this->input->post('tanggapan'),
		];
		$this->db->where(['id_disposisi'=> $id_disposisi])
				->update('disposisi',$update_berfore);
		$data =[
			'id_surat_masuk'=> $id_surat_masuk,
			'kepada_kat'=> $this->input->post('kepada_kat'),
			'kepada_id'=> $this->input->post('kepada_id'),
			'catatan'=> $this->input->post('catatan'),
			'id_parent_disposisi'=> $id_disposisi,

		];
		$this->db->insert('disposisi',$data);
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	else{
	$update_berfore = [
			'status_surat'=> '1',
			'tanggapan'=> $this->input->post('tanggapan'),
		];
		$this->db->where(['id_disposisi'=> $id_disposisi])
				->update('disposisi',$update_berfore);
		$data =[
			'id_surat_masuk'=> $id_surat_masuk,
			'kepada_kat'=> $this->input->post('kepada_kat'),
			'kepada_id'=> $this->input->post('kepada_id'),
			'catatan'=> $this->input->post('catatan'),
			'id_parent_disposisi'=> $cek, //id parent

		];
		$this->db->insert('disposisi',$data);
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	}
}

/* End of file surat_model.php */
/* Location: ./application/models/surat_model.php */
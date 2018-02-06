<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('auth_model');
		$this->load->model('surat_model');
	}
	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			
		$data = [
			'main_view' => 'dashboard_v',
		];
		$this->load->view('template',$data);
		}
		else{
			redirect('auth');
		}	
	}
	public function user()
	{	
		if ($this->session->userdata('logged_in') == TRUE) {
			
		$user = count($this->home_model->GetAllData('pengguna'));
		// $this->load->library('pagination');
		// $config['page_query_string'] = TRUE;
		// $config['base_url'] = base_url().'user';
		// $config['total_rows'] = $user;
		// $config['per_page'] = 5;
		// $config['uri_segment'] = 3;
		// $config['num_links'] = 3;
		// $config['full_tag_open'] = '<p>';
		// $config['full_tag_close'] = '</p>';
		// $config['first_link'] = 'First';
		// $config['first_tag_open'] = '<div>';
		// $config['first_tag_close'] = '</div>';
		// $config['last_link'] = 'Last';
		// $config['last_tag_open'] = '<div>';
		// $config['last_tag_close'] = '</div>';
		// $config['next_link'] = '&gt;';
		// $config['next_tag_open'] = '<div>';
		// $config['next_tag_close'] = '</div>';
		// $config['prev_link'] = '&lt;';
		// $config['prev_tag_open'] = '<div>';
		// $config['prev_tag_close'] = '</div>';
		// $config['cur_tag_open'] = '<b>';
		// $config['cur_tag_close'] = '</b>';
		
		// $this->pagination->initialize($config);
		// $mulai = $this->input->get('per_page');
		// $where =
		$rows = $this->home_model->get_user('','','');
		$data = [
			'rows'		=> $rows,
			// 'per_page'  => $mulai,
			'main_view' => 'user_v',
			// 'pagination'=> $this->pagination->create_links(),
			'jabatan' => $this->home_model->GetAllData('jabatan'),
			'bagian' => $this->home_model->GetAllData('bagian'),
			
		];
		$this->load->view('template',$data);
		}
		else{
			redirect('auth');
		}	
	}
	public function surat_masuk()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			
		// $this->load->library('pagination');
		// $config['page_query_string'] = TRUE;
		// $config['base_url'] = base_url().'surat_masuk';
		// $config['total_rows'] = $surat_masuk;
		// $config['per_page'] = 5;
		// $config['uri_segment'] = 3;
		// $config['num_links'] = 3;
		// $config['full_tag_open'] = '<p>';
		// $config['full_tag_close'] = '</p>';
		// $config['first_link'] = 'First';
		// $config['first_tag_open'] = '<div>';
		// $config['first_tag_close'] = '</div>';
		// $config['last_link'] = 'Last';
		// $config['last_tag_open'] = '<div>';
		// $config['last_tag_close'] = '</div>';
		// $config['next_link'] = '&gt;';
		// $config['next_tag_open'] = '<div>';
		// $config['next_tag_close'] = '</div>';
		// $config['prev_link'] = '&lt;';
		// $config['prev_tag_open'] = '<div>';
		// $config['prev_tag_close'] = '</div>';
		// $config['cur_tag_open'] = '<b>';
		// $config['cur_tag_close'] = '</b>';
		
		// $this->pagination->initialize($config);
		// $mulai = $this->input->get('per_page');
		// $where =
		$rows = $this->home_model->get_surat_masuk('');
		$data = [
			'rows'		=> $rows,
			'main_view' => 'surat_masuk_v',
			// 'per_page'  => $mulai,
			'jenis_surat' => $this->home_model->GetAllData('jenis_surat'),
			'jabatan' => $this->home_model->GetAllData('jabatan'),
			'pengguna' => $this->home_model->GetAllData('pengguna'),
			// 'pagination'=> $this->pagination->create_links(),
		];
		$this->load->view('template',$data);
		}else{
			redirect('auth');
		}		
	}
	
public function surat_keluar()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			
		// $surat_keluar = count($this->home_model->GetAllData('surat_keluar'));
		// $this->load->library('pagination');
		// $config['page_query_string'] = TRUE;
		// $config['base_url'] = base_url().'surat_keluar';
		// $config['total_rows'] = $surat_keluar;
		// $config['per_page'] = 5;
		// $config['uri_segment'] = 3;
		// $config['num_links'] = 3;
		// $config['full_tag_open'] = '<p>';
		// $config['full_tag_close'] = '</p>';
		// $config['first_link'] = 'First';
		// $config['first_tag_open'] = '<div>';
		// $config['first_tag_close'] = '</div>';
		// $config['last_link'] = 'Last';
		// $config['last_tag_open'] = '<div>';
		// $config['last_tag_close'] = '</div>';
		// $config['next_link'] = '&gt;';
		// $config['next_tag_open'] = '<div>';
		// $config['next_tag_close'] = '</div>';
		// $config['prev_link'] = '&lt;';
		// $config['prev_tag_open'] = '<div>';
		// $config['prev_tag_close'] = '</div>';
		// $config['cur_tag_open'] = '<b>';
		// $config['cur_tag_close'] = '</b>';
		
		// $this->pagination->initialize($config);
		// $mulai = $this->input->get('per_page');
		// $where =
		$rows = $this->home_model->get_surat_keluar('');
		$data = [
			'rows'		=> $rows,
			'main_view' => 'surat_keluar_v',
			// 'per_page'  => $mulai,
			// 'pagination'=> $this->pagination->create_links(),
			'jenis_surat' => $this->home_model->GetAllData('jenis_surat'),
		];
		$this->load->view('template',$data);	
		}else{
			redirect('auth');
		}	
	}
	public function mini_disposisi(){
		if ($this->session->userdata('logged_in') == TRUE) {
			$user_id = $this->session->userdata('logged_id');
			if ($this->input->post('mini_disposisi')) {
			$jb_user = $this->auth_model->GetUser(['id_pengguna'=> $user_id])->row('id_jabatan');
			$result = $this->home_model->get_mini_disposisi();
			$disposisi_statusnol = count($this->home_model->GetData(['kepada_id' => $user_id,'status_surat'=>'0'],'disposisi')->result());;
			$disposisi_statusnol += count($this->home_model->GetData(['kepada_kat' => $jb_user,'status_surat'=>'0'],'disposisi')->result());;
			$output = '';
			if (!empty($result)) {
			foreach ($result as $res) {
				if ($res->status_surat == 0) {
					$status_name = 'Belum Direspon';
				}
				else if ($res->status_surat == 1) {
					$status_name = 'Sudah Direspon, Disposisi belum selesai';
				}
				else if ($res->status_surat == 2) {
					$status_name = 'Sudah Direspon, Disposisi selesai';
				}
				$output .= '
				<li>
                            <a href="#">
                                <div>
                                    <strong>'.$res->nama_depan.' '.$res->nama_belakang.'</strong>
                                    <span class="pull-right text-muted">
                                        <em>'.$status_name.'</em>
                                    </span>
                                </div>
                                <div>'.$res->catatan.'</div>
                            </a>
                        </li>
                        <li class="divider"></li>';
			}
		}
		$output .= '<li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>';
			echo $output.'|'.$disposisi_statusnol;
		}
		}
		else{
			redirect('auth');
		}
	}
	public function disposisi()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$user_id = $this->session->userdata('logged_id');
			$jb_user = $this->auth_model->GetUser(['id_pengguna'=> $user_id])->row('id_jabatan');
		if ($this->session->userdata('level') == '0') {
		// $disposisi = count($this->home_model->GetAllData('disposisi'));	
		$where = '';
		$or_where = '';
		}
		else{
		// $disposisi = count($this->home_model->GetDataOR(['kepada_id' => $user_id],['kepada_kat' => $jb_user],'disposisi')->result());
		$where = ['kepada_id' => $user_id];
		$or_where = ['kepada_kat' => $jb_user];	
		}
		// $this->load->library('pagination');
		// $config['page_query_string'] = TRUE;
		// $config['base_url'] = base_url().'disposisi';
		// $config['total_rows'] = $disposisi;
		// $config['per_page'] = 5;
		// $config['uri_segment'] = 3;
		// $config['num_links'] = 3;
		// $config['full_tag_open'] = '<p>';
		// $config['full_tag_close'] = '</p>';
		// $config['first_link'] = 'First';
		// $config['first_tag_open'] = '<div>';
		// $config['first_tag_close'] = '</div>';
		// $config['last_link'] = 'Last';
		// $config['last_tag_open'] = '<div>';
		// $config['last_tag_close'] = '</div>';
		// $config['next_link'] = '&gt;';
		// $config['next_tag_open'] = '<div>';
		// $config['next_tag_close'] = '</div>';
		// $config['prev_link'] = '&lt;';
		// $config['prev_tag_open'] = '<div>';
		// $config['prev_tag_close'] = '</div>';
		// $config['cur_tag_open'] = '<b>';
		// $config['cur_tag_close'] = '</b>';
		
		// $this->pagination->initialize($config);
		// $mulai = $this->input->get('per_page');
		
		
		$rows = $this->home_model->get_disposisi($where,$or_where);
			if ($this->session->userdata('level') == '0') {
				$list_jb = $this->home_model->GetAllData('jabatan');
				$list_pengguna = $this->home_model->GetAllData('pengguna');
			}
			else{
				$bg_user = $this->auth_model->GetUser(['id_pengguna'=> $user_id])->row('id_bagian');
				$level = $this->session->userdata('level');
				$level_tambah_1 = $level + 1;
				$list_jb = $this->surat_model->get_jb_bagian(['pengguna.id_bagian'=>$bg_user,'jabatan.level >'=> $level, 'pengguna.id_pengguna !=' =>$user_id],['jabatan.level'=> $level_tambah_1]);
				$list_pengguna = $this->surat_model->get_pg_bagian(['pengguna.id_bagian'=>$bg_user,'jabatan.level >'=> $level, 'pengguna.id_pengguna !=' =>$user_id],['jabatan.level'=> $level_tambah_1]);
			}
		$data = [
			'rows'		=> $rows,
			'main_view' => 'disposisi_v',
			// 'per_page'  => $mulai,

			// 'pagination'=> $this->pagination->create_links(),
			'jenis_surat' => $this->home_model->GetAllData('jenis_surat'),
			
			'jabatan' => $list_jb,
			'pengguna' => $list_pengguna,
		];
		$this->load->view('template',$data);	
		}else{
			redirect('auth');
		}	
	}
	 public function tambah_user(){
	 	if ($this->session->userdata('logged_in') == TRUE) {
			
		$this->form_validation->set_rules('nama_depan', 'Nama Depan', 'required');
		$this->form_validation->set_rules('nama_belakang', 'Nama Belakang', 'required');
		$this->form_validation->set_rules('id_jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('id_bagian', 'Bagian', 'required');
			
		if ($this->form_validation->run() == TRUE) {
			$data = $this->home_model->insert_user();
			if ($data == TRUE) {
				$this->session->set_flashdata('notif', 'Anda sukses menambah data');
				$this->session->set_flashdata('tipe_notif', 'success');
				redirect('user');
			}
			else{
				$this->session->set_flashdata('notif', 'Maaf, anda gagal menambah data');
				$this->session->set_flashdata('tipe_notif', 'danger');
				redirect('user');
			}
		} else {
			$this->session->set_flashdata('notif', validation_errors());
			$this->session->set_flashdata('tipe_notif', 'warning');
			redirect('user');
		}
	}
	else{
		redirect('auth');
		
	}
	}
	public function tambah_list(){
		$tipe = $this->input->post('tipe');
		if ($tipe == 'jabatan') {
			$data = ['nama_jabatan'=>$this->input->post('nama_jabatan'),'level'=>$this->input->post('level')];
		}
		else if ($tipe == 'bagian') {
			$data = ['nama_bagian'=>$this->input->post('nama_bagian')];
		}
		else if ($tipe == 'jenis_surat') {
			$data = ['jenis_surat'=>$this->input->post('jenis_surat')];
		}
		$result = $this->home_model->tambah($data,$tipe);
		if ($result == TRUE) {
				$this->session->set_flashdata('notif', 'Anda sukses menambah data');
				$this->session->set_flashdata('tipe_notif', 'success');
				redirect('surat/setting');
			}
			else{
				$this->session->set_flashdata('notif', 'Maaf, anda gagal menambah data');
				$this->session->set_flashdata('tipe_notif', 'danger');
				redirect('surat/setting');
			}		
		
	}
	public function edit_user(){
		$data = [
			'nama_depan' => $this->input->post('namaa_depan'),
			'nama_belakang' => $this->input->post('namaa_belakang'),
			'id_jabatan' => $this->input->post('idd_jabatan'),
			'id_bagian' => $this->input->post('idd_bagian'),
		];
		// $per_page = $this->input->post('per_page');
		$result = $this->home_model->update($data,['id_pengguna'=> $this->input->post('idd_pengguna')],'pengguna');
		if ($result == TRUE) {
				$this->session->set_flashdata('notif', 'Anda sukses mengupdate data');
				$this->session->set_flashdata('tipe_notif', 'success');
				// if ($per_page != "") {
				// redirect('user/?per_page='.$per_page);	
				// }
				// else{
				redirect('user');		
				// }
			}
			else{
				$this->session->set_flashdata('notif', 'Maaf, anda gagal mengupdate data');
				$this->session->set_flashdata('tipe_notif', 'danger');
				// if ($per_page != "") {
				// redirect('user/?per_page='.$per_page);	
				// }
				// else{
				redirect('user');		
				// }
			}	
	}
	public function edit_list(){
		$tipe = $this->input->post('tipe');
		if ($tipe == 'jabatan') {
			$data = ['nama_jabatan'=>$this->input->post('namaa_jabatan'),'level'=>$this->input->post('levell')];
			$where = ['id_jabatan'=> $this->input->post('idd_jabatan')];
		}
		else if ($tipe == 'bagian') {
			$data = ['nama_bagian'=>$this->input->post('namaa_bagian')];
			$where = ['id_bagian'=> $this->input->post('idd_bagian')];
		}
		else if ($tipe == 'jenis_surat') {
			$data = ['jenis_surat'=>$this->input->post('jeniss_surat')];
			$where = ['id_jenis_surat'=> $this->input->post('idd_jenis_surat')];
		}
		$result = $this->home_model->update($data,$where,$tipe);
		if ($result == TRUE) {
				$this->session->set_flashdata('notif', 'Anda sukses mengupdate data');
				$this->session->set_flashdata('tipe_notif', 'success');
				redirect('surat/setting');
			}
			else{
				$this->session->set_flashdata('notif', 'Maaf, anda gagal mengupdate data');
				$this->session->set_flashdata('tipe_notif', 'danger');
				redirect('surat/setting');
			}		
		
	}
	public function get_jb(){
		$result = $this->home_model->GetData(['id_jabatan'=> $this->input->post('id_jabatan')],'jabatan')->row();
		echo $result->nama_jabatan.'|'.$result->level;
	}
	public function get_bg(){
		$result = $this->home_model->GetData(['id_bagian'=> $this->input->post('id_bagian')],'bagian')->row();
		echo $result->nama_bagian;
	}
	public function get_js(){
		$result = $this->home_model->GetData(['id_jenis_surat'=> $this->input->post('id_jenis_surat')],'jenis_surat')->row();
		echo $result->jenis_surat;
	}
	public function get_user(){
		$result = $this->home_model->GetData(['id_pengguna'=> $this->input->post('id_pengguna')],'pengguna')->row();
		echo $result->nama_depan.'|'.$result->nama_belakang.'|'.$result->id_jabatan.'|'.$result->id_bagian;
	}
	public function get_surat_masuk(){
		$result = $this->home_model->GetData(['id_surat_masuk'=> $this->input->post('id_surat_masuk')],'surat_masuk')->row();
		echo $result->no_agenda.'|'.$result->nomor_surat.'|'.$result->id_jenis_surat.'|'.$result->pengirim.'|'.$result->penerima.'|'.$result->tanggal_kirim.'|'.$result->tanggal_terima.'|'.$result->perihal;
	}
	public function get_surat_keluar(){
		$result = $this->home_model->GetData(['id_surat_keluar'=> $this->input->post('id_surat_keluar')],'surat_keluar')->row();
		echo $result->no_agenda.'|'.$result->nomor_surat.'|'.$result->id_jenis_surat.'|'.$result->pengirim.'|'.$result->penerima.'|'.$result->tanggal_kirim.'|'.$result->perihal;
	}
	public function get_list_disposisi(){
		if ($this->input->post('selected_list') =='pengguna') {
			$result = $this->home_model->GetData(['id_pengguna'=> $this->input->post('id')],'pengguna')->row('id_jabatan');
		}
		else if ($this->input->post('selected_list') =='jabatan') {
			$result = $this->home_model->GetData(['id_jabatan'=> $this->input->post('id')],'pengguna')->row('id_pengguna');
		}
		echo $result;
	}

	public function del_jb(){
		$id = $this->input->post('id_jabatan');
		$cek_exist = $this->home_model->GetData(['id_jabatan'=> $id],'pengguna')->num_rows();
		if ($cek_exist > 0) {
			echo 'exist_using';
		}
		else{
			$result = $this->home_model->delete(['id_jabatan'=> $id],'jabatan');
			if ($result == TRUE) {
				echo 'true';
			}
			else{
				echo 'false';
			}
		}
	}
	public function del_bg(){
		$id = $this->input->post('id_bagian');
		$cek_exist = $this->home_model->GetData(['id_bagian'=> $id],'pengguna')->num_rows();
		if ($cek_exist > 0) {
			echo 'exist_using';
		}
		else{
			$result = $this->home_model->delete(['id_bagian'=> $id],'bagian');
			if ($result == TRUE) {
				echo 'true';
			}
			else{
				echo 'false';
			}
		}
	}
	public function del_js(){
		$id = $this->input->post('id_jenis_surat');
		$cek_exist1 = $this->home_model->GetData(['id_jenis_surat'=> $id],'surat_masuk')->num_rows();
		$cek_exist2 = $this->home_model->GetData(['id_jenis_surat'=> $id],'surat_keluar')->num_rows();
		if ($cek_exist1 > 0 || $cek_exist2 > 0) {
			echo 'exist_using';
		}
		else{
			$result = $this->home_model->delete(['id_jenis_surat'=> $id],'jenis_surat');
			if ($result == TRUE) {
				echo 'true';
			}
			else{
				echo 'false';
			}
		}
	}
	public function del_user(){
		$id = $this->input->post('id_pengguna');
			$result = $this->home_model->delete(['id_pengguna'=> $id],'pengguna');
			if ($result == TRUE) {
				echo 'true';
			}
			else{
				echo 'false';
			}
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
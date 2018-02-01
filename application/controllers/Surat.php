<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('surat_model');
		$this->load->model('auth_model');
	}
	public function index()
	{
		
	}
	public function tambah_surat_masuk(){
		if ($this->session->userdata('logged_in') == TRUE) {
			
		$this->form_validation->set_rules('no_agenda', 'No Agenda', 'trim|required');
		$this->form_validation->set_rules('nomor_surat', 'No Surat', 'trim|required');
		$this->form_validation->set_rules('id_jenis_surat', 'Jenis Surat', 'trim|required');
		$this->form_validation->set_rules('pengirim', 'Pengirim', 'required');
		$this->form_validation->set_rules('penerima', 'Penerima', 'required');
		$this->form_validation->set_rules('tanggal_kirim', 'Tanggal Kirim', 'required');
		$this->form_validation->set_rules('tanggal_terima', 'Tanggal Terima', 'required');
		$this->form_validation->set_rules('perihal', 'Perihal', 'required');

			$config['upload_path'] = './assets/surat';
			$config['allowed_types'] = 'jpg|png|pdf';
			$config['max_size']  = '2000';
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			if ($this->upload->do_upload('file_surat')){
			
		if ($this->form_validation->run() == TRUE) {
			$data = $this->surat_model->insert_surat_masuk($this->upload->data());
			if ($data == TRUE) {
				$this->session->set_flashdata('notif', 'Anda sukses menambah data');
				$this->session->set_flashdata('tipe_notif', 'success');
				redirect('surat_masuk');
			}
			else{
				$this->session->set_flashdata('notif', 'Maaf, anda gagal menambah data');
				$this->session->set_flashdata('tipe_notif', 'danger');
				redirect('surat_masuk');
			}
		} else {
			$this->session->set_flashdata('notif', validation_errors());
			$this->session->set_flashdata('tipe_notif', 'warning');
			redirect('surat_masuk');
		}
		}
			else{
				$this->session->set_flashdata('notif', $this->upload->display_errors());
				$this->session->set_flashdata('tipe_notif', 'warning');
				redirect('surat_masuk');
			}
		}else{
			redirect('auth');
		}
	}


	public function edit_surat_masuk(){
		if ($this->session->userdata('logged_in') == TRUE) {
		$this->form_validation->set_rules('idd_surat_masuk', 'ID Surat Masuk', 'trim|required');
		$this->form_validation->set_rules('noo_agenda', 'No Agenda', 'trim|required');
		$this->form_validation->set_rules('nomorr_surat', 'No Surat', 'trim|required');
		$this->form_validation->set_rules('idd_jenis_surat', 'Jenis Surat', 'trim|required');
		$this->form_validation->set_rules('pengirimm', 'Pengirim', 'required');
		$this->form_validation->set_rules('penerimaa', 'Penerima', 'required');
		$this->form_validation->set_rules('tanggall_kirim', 'Tanggal Kirim', 'required');
		$this->form_validation->set_rules('tanggall_terima', 'Tanggal Terima', 'required');
		$this->form_validation->set_rules('perihall', 'Perihal', 'required');

			$per_page = $this->input->post('per_page');
		if ($this->form_validation->run() == TRUE) {
			$data = $this->surat_model->edit_surat_masuk();
			if ($data == TRUE) {
				$this->session->set_flashdata('notif', 'Anda sukses mengedit data surat');
				$this->session->set_flashdata('tipe_notif', 'success');
				if ($per_page != "") {
				redirect('surat_masuk/?per_page='.$per_page);	
				}
				else{
				redirect('surat_masuk');		
				}
				
			}
			else{
				$this->session->set_flashdata('notif', 'Maaf, anda gagal mengedit data surat');
				$this->session->set_flashdata('tipe_notif', 'danger');
				if ($per_page != "") {
				redirect('surat_masuk/?per_page='.$per_page);	
				}
				else{
				redirect('surat_masuk');		
				}
			}
		} else {
			$this->session->set_flashdata('notif', validation_errors());
			$this->session->set_flashdata('tipe_notif', 'warning');
			if ($per_page != "") {
				redirect('surat_masuk/?per_page='.$per_page);	
				}
				else{
				redirect('surat_masuk');		
				}
		}
		}else{
			redirect('auth');
		}
	}
	public function edit_file_surat_masuk(){
		if ($this->session->userdata('logged_in') == TRUE) {
			
			$config['upload_path'] = './assets/surat';
			$config['allowed_types'] = 'jpg|png|pdf';
			$config['max_size']  = '2000';
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			$per_page = $this->input->post('per_page');
			if ($this->upload->do_upload('filee_surat')){
			
			$data = $this->surat_model->edit_file_surat_masuk($this->upload->data());
			if ($data == TRUE) {
				$this->session->set_flashdata('notif', 'Anda sukses mengedit file data');
				$this->session->set_flashdata('tipe_notif', 'success');
				if ($per_page != "") {
				redirect('surat_masuk/?per_page='.$per_page);	
				}
				else{
				redirect('surat_masuk');		
				}
			}
			else{
				$this->session->set_flashdata('notif', 'Maaf, anda gagal mengedit file data');
				$this->session->set_flashdata('tipe_notif', 'danger');
				if ($per_page != "") {
				redirect('surat_masuk/?per_page='.$per_page);	
				}
				else{
				redirect('surat_masuk');		
				}
			}
		}
			else{
				$this->session->set_flashdata('notif', $this->upload->display_errors());
				$this->session->set_flashdata('tipe_notif', 'warning');
				if ($per_page != "") {
				redirect('surat_masuk/?per_page='.$per_page);	
				}
				else{
				redirect('surat_masuk');		
				}
			}
		}else{
			redirect('auth');
		}
	}
	public function edit_surat_keluar(){
		if ($this->session->userdata('logged_in') == TRUE) {
		$this->form_validation->set_rules('idd_surat_keluar', 'ID Surat Keluar', 'trim|required');
		$this->form_validation->set_rules('noo_agenda', 'No Agenda', 'trim|required');
		$this->form_validation->set_rules('nomorr_surat', 'No Surat', 'trim|required');
		$this->form_validation->set_rules('idd_jenis_surat', 'Jenis Surat', 'trim|required');
		$this->form_validation->set_rules('pengirimm', 'Pengirim', 'required');
		$this->form_validation->set_rules('penerimaa', 'Penerima', 'required');
		$this->form_validation->set_rules('tanggall_kirim', 'Tanggal Kirim', 'required');
		$this->form_validation->set_rules('perihall', 'Perihal', 'required');

			$per_page = $this->input->post('per_page');
		if ($this->form_validation->run() == TRUE) {
			$data = $this->surat_model->edit_surat_keluar();
			if ($data == TRUE) {
				$this->session->set_flashdata('notif', 'Anda sukses mengedit data surat');
				$this->session->set_flashdata('tipe_notif', 'success');
				if ($per_page != "") {
				redirect('surat_keluar/?per_page='.$per_page);	
				}
				else{
				redirect('surat_keluar');		
				}
				
			}
			else{
				$this->session->set_flashdata('notif', 'Maaf, anda gagal mengedit data surat');
				$this->session->set_flashdata('tipe_notif', 'danger');
				if ($per_page != "") {
				redirect('surat_keluar/?per_page='.$per_page);	
				}
				else{
				redirect('surat_keluar');		
				}
			}
		} else {
			$this->session->set_flashdata('notif', validation_errors());
			$this->session->set_flashdata('tipe_notif', 'warning');
			if ($per_page != "") {
				redirect('surat_keluar/?per_page='.$per_page);	
				}
				else{
				redirect('surat_keluar');		
				}
		}
		}else{
			redirect('auth');
		}
	}
	public function edit_file_surat_keluar(){
		if ($this->session->userdata('logged_in') == TRUE) {
			
			$config['upload_path'] = './assets/surat';
			$config['allowed_types'] = 'jpg|png|pdf';
			$config['max_size']  = '2000';
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			$per_page = $this->input->post('per_page');
			if ($this->upload->do_upload('filee_surat')){
			
			$data = $this->surat_model->edit_file_surat_keluar($this->upload->data());
			if ($data == TRUE) {
				$this->session->set_flashdata('notif', 'Anda sukses mengedit file data');
				$this->session->set_flashdata('tipe_notif', 'success');
				if ($per_page != "") {
				redirect('surat_keluar/?per_page='.$per_page);	
				}
				else{
				redirect('surat_keluar');		
				}
			}
			else{
				$this->session->set_flashdata('notif', 'Maaf, anda gagal mengedit file data');
				$this->session->set_flashdata('tipe_notif', 'danger');
				if ($per_page != "") {
				redirect('surat_keluar/?per_page='.$per_page);	
				}
				else{
				redirect('surat_keluar');		
				}
			}
		}
			else{
				$this->session->set_flashdata('notif', $this->upload->display_errors());
				$this->session->set_flashdata('tipe_notif', 'warning');
				if ($per_page != "") {
				redirect('surat_keluar/?per_page='.$per_page);	
				}
				else{
				redirect('surat_keluar');		
				}
			}
		}else{
			redirect('auth');
		}
	}
	public function tambah_surat_keluar(){
		if ($this->session->userdata('logged_in') == TRUE) {
			
		$this->form_validation->set_rules('no_agenda', 'No Agenda', 'trim|required');
		$this->form_validation->set_rules('nomor_surat', 'No Surat', 'trim|required');
		$this->form_validation->set_rules('id_jenis_surat', 'Jenis Surat', 'trim|required');
		$this->form_validation->set_rules('pengirim', 'Pengirim', 'required');
		$this->form_validation->set_rules('penerima', 'Penerima', 'required');
		$this->form_validation->set_rules('tanggal_kirim', 'Tanggal Kirim', 'required');
		$this->form_validation->set_rules('perihal', 'Perihal', 'required');
		
			$config['upload_path'] = './assets/surat';
			$config['allowed_types'] = 'jpg|png|pdf';
			$config['max_size']  = '2000';
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			if ($this->upload->do_upload('file_surat')){
			
		if ($this->form_validation->run() == TRUE) {
			$data = $this->surat_model->insert_surat_keluar($this->upload->data());
			if ($data == TRUE) {
				$this->session->set_flashdata('notif', 'Anda sukses menambah data');
				$this->session->set_flashdata('tipe_notif', 'success');
				redirect('surat_keluar');
			}
			else{
				$this->session->set_flashdata('notif', 'Maaf, anda gagal menambah data');
				$this->session->set_flashdata('tipe_notif', 'danger');
				redirect('surat_keluar');
			}
		} else {
			$this->session->set_flashdata('notif', validation_errors());
			$this->session->set_flashdata('tipe_notif', 'warning');
			redirect('surat_keluar');
		}
		}
			else{
				$this->session->set_flashdata('notif', $this->upload->display_errors());
				$this->session->set_flashdata('tipe_notif', 'warning');
				redirect('surat_keluar');
			}
		}
			else{
				redirect('auth');
			}
	}

	public function setting(){
		if ($this->session->userdata('logged_in') == TRUE ) {
			// && $this->session->userdata('level') == TRUE
			$data = [
				'main_view'=> 'setting_v',

				'list_jb' => $this->home_model->GetAllData('jabatan'),
				'list_bg' => $this->home_model->GetAllData('bagian'),
				'list_js' => $this->home_model->GetAllData('jenis_surat'),
			];
			$this->load->view('template', $data);
		}
		else{
			redirect('auth');
		}
	}
	public function go_disposisi(){ //disposisi parent
		if ($this->session->userdata('logged_in') == TRUE) {
			
		$this->form_validation->set_rules('idddd_surat_masuk', 'ID Surat Masuk', 'trim|required');
		$this->form_validation->set_rules('kepada_kat', 'Jabatan', 'trim|required');
		$this->form_validation->set_rules('kepada_id', 'Pegawai', 'trim|required');
		$this->form_validation->set_rules('catatan', 'Catatan', 'trim|required');
		$per_page = $this->input->post('per_page');
		if ($this->form_validation->run() == TRUE) {
			$data = $this->surat_model->insert_disposisi_parent();
			if ($data == TRUE) {
				$this->session->set_flashdata('notif', 'Anda sukses melakukan disposisi');
				$this->session->set_flashdata('tipe_notif', 'success');
				if ($per_page != "") {
				redirect('surat_masuk/?per_page='.$per_page);	
				}
				else{
				redirect('surat_masuk');		
				}
			}
			else{
				$this->session->set_flashdata('notif', 'Maaf, anda gagal melakukan disposisi');
				$this->session->set_flashdata('tipe_notif', 'danger');
				if ($per_page != "") {
				redirect('surat_masuk/?per_page='.$per_page);	
				}
				else{
				redirect('surat_masuk');		
				}
			}
		} else {
			$this->session->set_flashdata('notif', validation_errors());
			$this->session->set_flashdata('tipe_notif', 'warning');
			if ($per_page != "") {
				redirect('surat_masuk/?per_page='.$per_page);	
				}
				else{
				redirect('surat_masuk');		
				}
		}
		
		}
			else{
				redirect('auth');
			}
	}
	public function lihat_alur_disposisi(){
		$id_disposisi = $this->input->post('id_disposisi');
		$id_parent = $this->home_model->GetData(['id_disposisi'=> $id_disposisi],'disposisi')->row('id_parent_disposisi');

		$output = '';
		if ($id_parent == 0) {
		$result_parent = $this->surat_model->lihat_alur_parent(['id_disposisi'=> $id_disposisi]);
		$result_child = $this->surat_model->lihat_alur_child(['id_parent_disposisi'=> $id_disposisi]);
		}
		else{
		$result_parent = $this->surat_model->lihat_alur_parent(['id_disposisi'=> $id_parent]);
		$result_child = $this->surat_model->lihat_alur_child(['id_parent_disposisi'=> $id_parent]);
		}
		if (!empty($result_parent)) {
									if ($result_parent->status_surat == 0) {
                                        $status_name= 'Belum Direspon';
                                        }
                                        else if ($result_parent->status_surat == 1) {
                                        $status_name= 'Sudah direspon, disposisi belum selesai';
                                        }
                                        else if ($result_parent->status_surat == 2) {
                                        $status_name='Sudah direspon, disposisi selesai';
                                        }
					$output .= '
									<tr>
                                        <td>'. $result_parent->id_disposisi.'</td>
                                        <td>'. $result_parent->id_parent_disposisi.'</td>
                                        <td>'. $result_parent->id_surat_masuk.'</td>
                                        <td>'. $result_parent->no_agenda.'</td>
                                        <td>'. $result_parent->nomor_surat.'</td>
                                        <td class="center">'. $result_parent->nama_jabatan.'</td>
                                        <td class="center">'. $result_parent->nama_depan.'</td>
                                        <td class="center">'. $result_parent->catatan.'</td>
                                        <td class="center">'. $status_name.'</td>
                                        <td class="center">'. $result_parent->tanggapan.'</td>

                                    </tr>
					';
				
		}
		if (!empty($result_child)) {
			foreach ($result_child as $child) {
				if ($child->status_surat == 0) {
                                        $status_name= 'Belum Direspon';
                                        }
                                        else if ($child->status_surat == 1) {
                                        $status_name= 'Sudah direspon, disposisi belum selesai';
                                        }
                                        else if ($child->status_surat == 2) {
                                        $status_name='Sudah direspon, disposisi selesai';
                                        }
                         $output .= '
                                             <tr>
                                        <td>'. $child->id_disposisi.'</td>
                                        <td>'. $child->id_parent_disposisi.'</td>
                                        <td>'. $child->id_surat_masuk.'</td>
                                        <td>'. $child->no_agenda.'</td>
                                        <td>'. $child->nomor_surat.'</td>
                                        <td class="center">'. $child->nama_jabatan.'</td>
                                        <td class="center">'. $child->nama_depan.'</td>
                                        <td class="center">'. $child->catatan.'</td>
                                        <td class="center">'. $status_name.'</td>
                                        <td class="center">'. $child->tanggapan.'</td>

                                    </tr>
                         ';
                    }	
		}

		
		echo $output.'|'.$result_parent->file_surat;
	}
	public function terima_disposisi(){
		if ($this->session->userdata('logged_in') == TRUE) {
			
		$this->form_validation->set_rules('iddd_disposisi', 'ID Disposisi', 'trim|required');
		$this->form_validation->set_rules('tanggapan', 'Tanggapan', 'trim|required');

		$per_page = $this->input->post('per_page');
		if ($this->form_validation->run() == TRUE) {
			$data = $this->surat_model->terima_disposisi();
			if ($data == TRUE) {
				$this->session->set_flashdata('notif', 'Anda sukses melakukan terima disposisi');
				$this->session->set_flashdata('tipe_notif', 'success');
				if ($per_page != "") {
				redirect('disposisi/?per_page='.$per_page);	
				}
				else{
				redirect('disposisi');		
				}
			}
			else{
				$this->session->set_flashdata('notif', 'Maaf, anda gagal melakukan terima disposisi');
				$this->session->set_flashdata('tipe_notif', 'danger');
				if ($per_page != "") {
				redirect('disposisi/?per_page='.$per_page);	
				}
				else{
				redirect('disposisi');		
				}
			}
		} else {
			$this->session->set_flashdata('notif', validation_errors());
			$this->session->set_flashdata('tipe_notif', 'warning');
			if ($per_page != "") {
				redirect('disposisi/?per_page='.$per_page);	
				}
				else{
				redirect('disposisi');		
				}
		}
		
		}
			else{
				redirect('auth');
			}
	}
	public function go_disposisi_go(){ //disposisi child 
		if ($this->session->userdata('logged_in') == TRUE) {
			
		$this->form_validation->set_rules('idd_disposisi', 'ID Disposisi', 'trim|required');
		$this->form_validation->set_rules('kepada_kat', 'Jabatan', 'trim|required');
		$this->form_validation->set_rules('kepada_id', 'Pegawai', 'trim|required');
		$this->form_validation->set_rules('catatan', 'Catatan', 'trim|required');
		$this->form_validation->set_rules('tanggapan', 'Tanggapan', 'trim|required');
		$per_page = $this->input->post('per_page');
		if ($this->form_validation->run() == TRUE) {
			$data = $this->surat_model->insert_disposisi_child();
			if ($data == TRUE) {
				$this->session->set_flashdata('notif', 'Anda sukses melakukan disposisi');
				$this->session->set_flashdata('tipe_notif', 'success');
				if ($per_page != "") {
				redirect('disposisi/?per_page='.$per_page);	
				}
				else{
				redirect('disposisi');		
				}
			}
			else{
				$this->session->set_flashdata('notif', 'Maaf, anda gagal melakukan disposisi');
				$this->session->set_flashdata('tipe_notif', 'danger');
				if ($per_page != "") {
				redirect('disposisi/?per_page='.$per_page);	
				}
				else{
				redirect('disposisi');		
				}
			}
		} else {
			$this->session->set_flashdata('notif', validation_errors());
			$this->session->set_flashdata('tipe_notif', 'warning');
			if ($per_page != "") {
				redirect('disposisi/?per_page='.$per_page);	
				}
				else{
				redirect('disposisi');		
				}
		}
		
		}
			else{
				redirect('auth');
			}
	}
}

/* End of file Surat.php */
/* Location: ./application/controllers/Surat.php */
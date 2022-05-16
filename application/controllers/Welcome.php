<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		// validation
		$this->_rules();
		if($this->form_validation->run()==FALSE)
		{
			$data['title'] = "Form Login";

			$this->load->view('templates_admin/header',$data);
			$this->load->view('form_login');
		}else{

			$username = $this->input->post('username');
			$password = $this->input->post('password');
			// setelah data disimmpan dalam var->cek ke database
			// data yang dimasukkan sudah sesuai apa belum

			$cek_nana = $this->penggajian_models->cek_login_nana($username,$password);
			// yang kita cek $username dan $password -> yang menampung data yang diinputkan

			if($cek_nana == FALSE){
				// data yang kta masukkan ga ada seusi dgn yang didatabase
				
				$this->session->set_flashdata('pesan','
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Username atau Password yang Anda Masukkan Salah!</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
				redirect ('welcome');
			}else{
				// ini kalau data yang kita masukkan ada di dalam database
				// dicek role-idnya/hak_aksesnya
				$this->session->set_userdata('hak_akses',$cek_nana->hak_akses);
				// untuk set sessionnya
				$this->session->set_userdata('nama_pegawai',$cek_nana->nama_pegawai);
				$this->session->set_userdata('foto',$cek_nana->foto);
				$this->session->set_userdata('id_pegawai',$cek_nana->id_pegawai);
				$this->session->set_userdata('nik',$cek_nana->nik);


				switch ($cek_nana->hak_akses) {
					// kalau 1 -> admin diarahkan ke dashboard admin
					case 1 : redirect('admin/dashboard');
							break;

					// kalau 2 -> pegawai diarahkan ke dashboard pegawai
					case 2 : redirect('pegawai/dashboard');
							break;

					default: break;
				}
			}
		}
		
	}

	public function _rules(){
		
		// validation rules
		$this->form_validation->set_rules('username', 'username','required');
		$this->form_validation->set_rules('password', 'password','required');
	}

	public function logout(){

		$this->session->sess_destroy();
		redirect('welcome');
	}
}

<?php
class ganti_password extends CI_Controller{

    public function index(){

        $data['title'] = "Ganti Password";

        $this->load->view('templates_pegawai/header',$data);
        $this->load->view('templates_pegawai/sidebar');
        $this->load->view('pegawai/ganti_password',$data);
        $this->load->view('templates_pegawai/footer');
    }

    public function ganti_password_aksi(){

        // Data yang diinput disimpam dalam variable
        $passbaru_nana   = $this->input->post('passbaru');
        $passulangi_nana = $this->input->post('ulangipass');

        $this->form_validation->set_rules('passbaru','Password Baru','required|matches[ulangipass] ');
        $this->form_validation->set_rules('ulangipass','Ulangi Password ','required');

        if ($this->form_validation->run() != FALSE) {
            // Kalau form_validationnya tidak false = true
            $data = array('password' => md5($passbaru_nana));

            $id = array('id_pegawai' => $this->session->userdata('id_pegawai'));

            // masukkan query
            $this->penggajian_models->update_data('data_pegawai',$data,$id);
            $this->session->set_flashdata('pesan','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Password Berhasil di Ubah</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');

            redirect('welcome');
        }else{
            $data['title'] = "Ganti Password";
            $this->load->view('templates_pegawai/header',$data);
            $this->load->view('templates_pegawai/sidebar');
            $this->load->view('pegawai/ganti_password',$data);
            $this->load->view('templates_pegawai/footer');
        }
    }
}
?>
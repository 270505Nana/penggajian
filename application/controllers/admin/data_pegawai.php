<?php

class data_pegawai extends CI_Controller{

    public function index(){

        $data['title'] = "Data Pegawai";
        $data['pegawai'] = $this->penggajian_models->get_data('data_pegawai')->result();

        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_pegawai',$data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_data(){

        $data['title']   = "Tambah Data Pegawai";
        $data['jabatan'] = $this->penggajian_models->get_data('data_jabatan')->result();

        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambah_data_pegawai',$data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_data_aksi_nana(){
        
        // $this->_rules();

        // if($this->form_validation->run() == FALSE){
        //     $this->tambah_data();

        // }else{
            $nik           = $this->input->post('nik');
            $nama_pegawai  = $this->input->post('nama_pegawai');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $jabatan       = $this->input->post('jabatan');
            $tanggal_masuk = $this->input->post('tanggal_masuk');
            $status        = $this->input->post('status');
            $foto          = $_FILES['foto'] ['name'];
            if($foto=''){}else{
                $config ['upload_path']   = './assets/photo';
                // directory foto
                $config ['allowed_types'] = 'jpg|jpeg|gif|png|tiff|webp';
                $this->load->library('upload',$config);

                if(!$this->upload->do_upload('foto')){
                    // field yang sesuai di database
                    echo"Foto Gagal di Upload";
                }else{
                    $foto=$this->upload->data('file_name');
                }
            }

            $data = array(
                'nik'            => $nik,
                'nama_pegawai'   => $nama_pegawai,
                'jenis_kelamin'  => $jenis_kelamin,
                'jabatan'        => $jabatan,
                'tanggal_masuk'  => $tanggal_masuk,
                'status'         => $status,
                'foto'           => $foto,
            );
            $this->penggajian_models->insert_data($data,'data_pegawai');
            $this->session->set_flashdata('pesan','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data Berhasil di Tambahkan</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');

            redirect('admin/data_pegawai');

        //}

        
    }
    // public function _rules(){

    //     // melakukan form_validation
    //     $this->form_validation->set_rules('nik','NIK','required');
    //     $this->form_validation->set_rules('nama_pegawai','Nama Pegawai','required');
    //     $this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
    //     $this->form_validation->set_rules('jabatan','Jabatan','required');
    //     $this->form_validation->set_rules('tanggal_masuk','Tanggal Masuk','required');
    //     $this->form_validation->set_rules('status','Status','required');

    // }

    public function update_data($id){

        $where  = array('id_pegawai' => $id);
        $data['title'] = 'Update Data Pegawai';
        $data['jabatan'] = $this->penggajian_models->get_data('data_jabatan')->result();
        $data['pegawai'] = $this->db->query("SELECT * FROM data_pegawai WHERE id_pegawai='$id'")->result();
       
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/update_data_pegawai',$data);
        $this->load->view('templates_admin/footer');
    }

   

    public function update_data_aksi(){

        // Untun mengirim data

        // $this->_rules();

        // if($this->form_validation->run() == FALSE){

        //     $this->update_data();

        // }else{
            $id            = $this->input->post('id_pegawai');
            $nik           = $this->input->post('nik');
            $nama_pegawai  = $this->input->post('nama_pegawai');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $jabatan       = $this->input->post('jabatan');
            $tanggal_masuk = $this->input->post('tanggal_masuk');
            $status        = $this->input->post('status');
            // ditangkap
            $data = array(
                // disimpan
                'nik'            => $nik,
                'nama_pegawai'   => $nama_pegawai,
                'jenis_kelamin'  => $jenis_kelamin,
                'jabatan'        => $jabatan,
                'tanggal_masuk'  => $tanggal_masuk,
                'status'         => $status,
                
            );

            $where =  array(
                'id_pegawai' => $id
            );

            $this->penggajian_models->update_data('data_pegawai',$data,$where);
            $this->session->set_flashdata('pesan','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data Berhasil di Ubah</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');

            redirect('admin/data_pegawai');
        // } 
    }

    
    public function delete_data($id){

        $where = array('id_pegawai' => $id);
        $this->penggajian_models->delete_data($where,'data_pegawai');

        $this->session->set_flashdata('pesan','
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data Berhasil di Hapus</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');

        redirect('admin/data_pegawai');

    }


}
?>
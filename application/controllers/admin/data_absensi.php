<?php

class data_absensi extends CI_Controller{

    public function index(){

        $data['title']    = "Data Absensi Pegawai";
       
        // Membuat percabangan
        // Ada data yang dimasukkan akan menampilkan data sesuai dengan bulan dan tahun yang diinput
        if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
            $bulan =$_GET['bulan'];
            $tahun =$_GET['tahun'];

            $bulantahun = $bulan . $tahun;
        }else{
            // Jika tidak ada, maka akan menampilkan bulan dan tahun sekarang
            $bulan = date('m'); //bulan
            $tahun = date('Y'); //tahun

            $bulantahun = $bulan . $tahun;
        }
      
        $data['absensi']  = $this->db->query("SELECT data_kehadiran.*,data_pegawai.nama_pegawai, data_pegawai.jenis_kelamin, data_pegawai.jabatan
        FROM data_kehadiran
        INNER JOIN data_pegawai ON data_kehadiran.nik=data_pegawai.nik
        
        INNER JOIN data_jabatan ON data_pegawai.jabatan = data_jabatan.nama_jabatan
        WHERE data_kehadiran.bulan='$bulantahun' 
        ORDER BY data_pegawai.nama_pegawai ASC")->result();
       
        // -- nik yang ada di data_kehadiran == nik yang di data_pegawai
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_absensi',$data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_absensi_nana(){

        if($this->input->post('submit',TRUE) == 'submit'){
            $post = $this->input->post();

            foreach ($post['bulan'] as $key => $value) {
                if($post['bulan'][$key] !='' || $post['nik'][$key] )
                // || atau

                {
                    $simpan[]=array(
                        'bulan'        => $post['bulan'][$key],
                        // ['bulan'] : nama field
                        'nik'          => $post['nik'][$key],
                        'jenis_kelamin'=> $post['jenis_kelamin'][$key],
                        'nama_jabatan' => $post['nama_jabatan'][$key],
                        'jumlah_hadir' => $post['jumlah_hadir'][$key],
                        'sakit'        => $post['sakit'][$key],
                        'alpha'        => $post['alpha'][$key],

                    );
                }
            }
            $this->penggajian_models->insert_batch('data_kehadiran',$simpan);
            $this->session->set_flashdata('pesan','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data Berhasil di Tambahkan</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');

            redirect('admin/data_absensi');

        }

        $data['title'] = "Form Input Absensi";
        if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan.$tahun;
        }else{
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan.$tahun;
        }     
        //  $data['input_absensi']  = $this->db->query("SELECT data_kehadiran.*,data_pegawai.nama_pegawai, data_pegawai.jenis_kelamin, data_pegawai.jabatan
        // FROM data_kehadiran
        // INNER JOIN data_pegawai ON data_kehadiran.nik=data_pegawai.nik
        
        // INNER JOIN data_jabatan ON data_pegawai.jabatan = data_jabatan.nama_jabatan
        // WHERE data_kehadiran.bulan='$bulantahun' 
        // ORDER BY data_pegawai.nama_pegawai ASC")->result();

        $data['input_absensi'] = $this->db->query("SELECT data_pegawai.*, data_jabatan.nama_jabatan FROM data_pegawai
        INNER JOIN data_jabatan ON data_pegawai.jabatan=data_jabatan.nama_jabatan
        WHERE NOT EXISTS(SELECT * FROM data_kehadiran WHERE  bulan='$bulantahun' AND data_pegawai.nik=data_kehadiran.nik)
        ORDER BY data_pegawai.nama_pegawai ASC")->result();
       
        // -- nik yang ada di data_kehadiran == nik yang di data_pegawai
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambah_data_absensi',$data);
        $this->load->view('templates_admin/footer');
    }
}
?>

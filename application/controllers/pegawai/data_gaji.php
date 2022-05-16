<?php

class data_gaji extends CI_Controller{

    
    public function __construct(){
        parent:: __construct();

        if($this->session->userdata('hak_akses') !='2'){
            $this->session->set_flashdata('pesan','
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong> Anda Belum Login! </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect ('welcome');

        }
    }

    public function index(){
    
        $data['title'] = "Data Gaji";
        $nik=                   $this->session->userdata('nik');
        $data['potongan_nana'] = $this->penggajian_models->get_data('potongan_gaji')->result();

        
        $data['gaji_nana'] = $this->db->query("SELECT
        data_pegawai.nama_pegawai,
        data_pegawai.nik,
        data_jabatan.gaji_pokok,
        data_jabatan.tj_transport,
        data_jabatan.uang_makan,
        data_kehadiran.alpha,
        data_kehadiran.bulan,
        data_kehadiran.id_kehadiran
        FROM data_pegawai
        INNER JOIN data_kehadiran ON data_kehadiran.nik=data_pegawai.nik
        INNER JOIN data_jabatan ON data_jabatan.nama_jabatan=data_pegawai.jabatan
        WHERE data_kehadiran.nik='$nik'
        ORDER BY data_kehadiran.bulan DESC")->result();
        // ' * ' untuk memilih semua file

        // $nik untk menyimpan nik sesuai denggan usn yang masuk, session
 
        
        $this->load->view('templates_pegawai/header',$data);
        $this->load->view('templates_pegawai/sidebar');
        $this->load->view('pegawai/data_gaji',$data);
        $this->load->view('templates_pegawai/footer');

    }
}

?>
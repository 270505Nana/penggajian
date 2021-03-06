<?php
class laporan_gaji extends CI_Controller{

    
    public function __construct(){
        parent:: __construct();

        if($this->session->userdata('hak_akses') !='1'){
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
        $data['title'] = "Laporan Gaji Pegawai";

        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/filter_laporan_gaji');
        $this->load->view('templates_admin/footer');
    }

    public function cetak_laporan_gaji(){

        $data['title']    = "Cetak Laporan Gaji Pegawai";

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
        $data['potongan']  = $this->penggajian_models->get_data('potongan_gaji')->result();


        $data['cetak_gaji']     = $this->db->query("SELECT 
        data_pegawai.nik, 
        data_pegawai.nama_pegawai, 
        data_pegawai.jenis_kelamin, 
        data_jabatan.nama_jabatan,
        data_jabatan.gaji_pokok,
        data_jabatan.tj_transport,
        data_jabatan.uang_makan,
        data_kehadiran.alpha
        FROM data_pegawai
        INNER JOIN data_kehadiran ON data_kehadiran.nik=data_pegawai.nik 
        INNER JOIN data_jabatan ON data_jabatan.nama_jabatan=data_pegawai.jabatan
        WHERE data_kehadiran.bulan='$bulantahun'
        ORDER BY data_pegawai.nama_pegawai ASC")->result();

        $this->load->view('templates_admin/header',$data);
        $this->load->view('admin/cetak_data_gaji',$data);
    }
}
?>
<?php
class laporan_absensi extends CI_Controller{
   
    public function index(){

        $data['title'] = "Cetak Laporan Absensi";

        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/filter_laporan_absensi');
        $this->load->view('templates_admin/footer');

    }

    public function cetak_laporan_absensi(){

        $data['title'] = "Cetak Laporan Absensi";
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
        $bulantahun = $bulan . $tahun;

        $data['lap_kehadiran'] = $this->db->query("SELECT * FROM data_kehadiran 
        
        WHERE bulan='$bulantahun'
        ORDER BY nama_pegawai ASC")->result();

        $this->load->view('templates_admin/header',$data);
        $this->load->view('admin/cetak_laporan_absensi');
    }
}
?>
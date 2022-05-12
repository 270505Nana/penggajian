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
}
?>

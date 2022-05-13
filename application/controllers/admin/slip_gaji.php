<?php
class slip_gaji extends CI_Controller{

    public function index(){

        $data['title'] = "Slip Gaji Pegawai";
        $data['pegawai'] = $this->penggajian_models->get_data('data_pegawai')->result();

        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/filter_slip_gaji',$data);
        $this->load->view('templates_admin/footer');



    }

    public function cetak_slip_gaji(){

        $data['title'] = "Cetak Slip Gaji";

        $data['potongan'] = $this->penggajian_models->get_data('potongan_gaji')->result();

        $nama  = $this->input->post('nama_pegawai');   
        $bulan = $this->input->post('bulan');   
        $tahun = $this->input->post('tahun'); 
        $bulantahun=$bulan.$tahun;

        $data['print_slip_nana'] = $this->db->query("SELECT 
        data_pegawai.nik,
        data_pegawai.nama_pegawai,
        data_jabatan.nama_jabatan,
        data_jabatan.gaji_pokok,
        data_jabatan.tj_transport,
        data_jabatan.uang_makan,
        data_kehadiran.alpha
        FROM  data_pegawai
        INNER JOIN data_kehadiran ON data_kehadiran.nik=data_pegawai.nik
        INNER JOIN data_jabatan ON data_jabatan.nama_jabatan=data_pegawai.jabatan
        WHERE data_kehadiran.bulan='$bulantahun'
        AND data_kehadiran.nama_pegawai='$nama'
        ")->result();

        
        // data-data yang mau diambil dari lebih dari 1 table
        // dan mau ditampilkan, metode lain dari join table
        // namatable.namafield

        $this->load->view('templates_admin/header',$data);
        $this->load->view('admin/cetak_slip_gaji',$data);
    }
}
?>
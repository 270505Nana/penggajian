<?php

class Dashboard extends CI_Controller{

    public function index(){

        $data['title'] = "Dashboard";
        $pegawai_nana     = $this->db->query("SELECT * FROM data_pegawai");
        $admin_nana       = $this->db->query("SELECT * FROM data_pegawai WHERE jabatan = 'Admin'");
        $jabatan_nana     = $this->db->query("SELECT * FROM data_jabatan");
        $kehadiran_nana   = $this->db->query("SELECT * FROM data_kehadiran");

        $data['pegawai']   = $pegawai_nana->num_rows();
        $data['admin']     = $admin_nana->num_rows();
        $data['jabatan']   = $jabatan_nana->num_rows();
        $data['kehadiran'] = $kehadiran_nana->num_rows();

        

        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard',$data);
        $this->load->view('templates_admin/footer');
    }
}

?>
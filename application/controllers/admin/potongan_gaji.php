 <?php
 class potongan_gaji extends CI_Controller{

    public function index(){
        $data['title']         = "Setting Potongan Gaji";
        $data['potongan_gaji'] =  $this->penggajian_models->get_data('potongan_gaji')->result();

         
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/potongan_gaji',$data);
        $this->load->view('templates_admin/footer');

    }

    public function tambah_data(){
        $data['title']         = "Tambah Potongan Gaji";
         
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambah_potongan_gaji',$data);
        $this->load->view('templates_admin/footer');

    }

    public function tambah_data_aksi(){

        $potongan     = $this->input->post('potongan');
        $jml_potongan = $this->input->post('jml_potongan');
        // ditangkap
        $data = array(
            // disimpan
            'potongan'      => $potongan,
            'jml_potongan'  => $jml_potongan,
            
        );

        $this->penggajian_models->insert_data($data,'potongan_gaji');
        $this->session->set_flashdata('pesan','
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Berhasil di Tambah</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');

        redirect('admin/potongan_gaji');
    }

    public function update_data($id){
        $where = array('id' => $id);
        $data['title'] = "Edit Potongan Gaji";
        $data['potongan_gaji'] = $this->db->query("SELECT * FROM potongan_gaji WHERE id='$id'")->result();

        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/update_potongan_gaji',$data);
        $this->load->view('templates_admin/footer');

    }

    public function update_data_aksi(){

        
        $id            = $this->input->post('id');
        $potongan      = $this->input->post('potongan');
        $jml_potongan  = $this->input->post('jml_potongan');
         // ditangkap
        $data = array(
            // disimpan
            'potongan'       => $potongan,
            'jml_potongan'   => $jml_potongan,
            
        );

        $where =  array(
            'id' => $id
        );

        $this->penggajian_models->update_data('potongan_gaji',$data,$where);
        $this->session->set_flashdata('pesan','
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Berhasil di Ubah</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');

        redirect('admin/potongan_gaji');
    }
    public function delete_data($id){

        $where = array('id' => $id);
        $this->penggajian_models->delete_data($where,'potongan_gaji');

        $this->session->set_flashdata('pesan','
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data Berhasil di Hapus</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');

        redirect('admin/potongan_gaji');

    }
 }
 ?>
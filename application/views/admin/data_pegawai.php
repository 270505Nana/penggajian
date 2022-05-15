<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <?= $this->session->flashdata('pesan')?>
    <a class="btn btn-primary my-3"href="<?= base_url('admin/data_pegawai/tambah_data')?>"><i class="fas fa-plus"></i> Tambah  Data</a>

    <table class="table table-striped  table-bordered">
        <tr>
            <th class="text-cente">No</th>
            <th class="text-cente">NIK</th>
            <th class="text-cente">Nama Pegawai</th>
            <th class="text-cente">Jenis Kelamin</th>
            <th class="text-cente">Jabatan</th>
            <th class="text-cente">Tanggal Masuk</th>
            <th class="text-cente">Status</th>
            <th class="text-cente">Photo</th>
            <th class="text-cente">Hak Akses</th>
            <th class="text-cente">Aksi</th>
        </tr>

        <?php 
        $no = 1;
        foreach ($pegawai as $p):?>

        <tr>
            <td><?= $no++?></td>
            <td><?= $p->nik ?></td>
            <td><?= $p->nama_pegawai ?></td>
            <td><?= $p->jenis_kelamin ?></td>
            <td><?= $p->jabatan ?></td>
            <td><?= $p->tanggal_masuk ?></td>
            <td><?= $p->status ?></td>
            <td><img src="<?= base_url(). 'assets/photo/'.$p->foto?>" width="75px"></td>
            
                <?php if($p->hak_akses=='1') { ?>
                    <td>Admin</td>
                <?php }else{ ?>
                    <td>Pegawai</td>
                <?php } ?>
            
            <td>
                <center>
                    <a href="<?= base_url('admin/data_pegawai/update_data/'.$p->id_pegawai)?>"><i class="fas fa-edit"></i></a>

                    <a onclick="return confirm('Hapus Data?')"class="text-danger "href="<?= base_url('admin/data_pegawai/delete_data/'.$p->id_pegawai)?>"><i class="fas fa-trash"></i></a>
                </center>
            </td>
        </tr>

        <?php endforeach;?>
    </table>
</div>


           
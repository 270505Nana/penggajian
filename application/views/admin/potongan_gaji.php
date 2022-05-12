<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <?= $this->session->flashdata('pesan')?>

    <a class="btn btn-success my-2"href="<?= base_url('admin/potongan_gaji/tambah_data')?>"><i class="fas fa-plus mr-2 mb-2 mt-2"></i>Tambah Data</a>

    <table class="table table-bordered table-striped">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Jenis Potongan</th>
            <th class="text-center">Jumlah Potongan</th>
            <th class="text-center">Aksi</th>
        </tr>

        <?php 
        $no=1;
        foreach ($potongan_gaji as $ptgn ):?>
        <!-- $potongan_gaji : $data di controller potongan_gaji -->
        <tr>
            <td><?= $no++?></td>
            <td><?= $ptgn->potongan ?></td>
            <td>Rp. <?= number_format($ptgn->jml_potongan,0,',','.') ?></td>
            <td>
                <center>
                <a href="<?= base_url('admin/potongan_gaji/update_data/'.$ptgn->id)?>"><i class="fas fa-edit"></i></a>

                <a onclick="return confirm('Hapus Data?')"class="text-danger "href="<?= base_url('admin/potongan_gaji/delete_data/'.$ptgn->id)?>"><i class="fas fa-trash"></i></a>
                </center>
            </td>
        </tr>
        <?php endforeach;?>
    </table>

</div>


           
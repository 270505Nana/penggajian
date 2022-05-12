<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>
    <div class="card"style="width:65%">
        <div class="card-body" >

        <?php foreach ($potongan_gaji as $ptgn):?>
            <form action="<?= base_url('admin/potongan_gaji/update_data_aksi')?>" method="POST">
                <div class="form-group">
                    <label for="">Jenis Potongan</label>
                    <input type="hidden" name="id" class="form-control" value="<?= $ptgn->id?>">
                    <input type="text" name="potongan" class="form-control" value="<?= $ptgn->potongan?>"required>
                </div>

                <div class="form-group">
                    <label for="">Jumlah Potongan</label>
                    <input type="number" name="jml_potongan" class="form-control" value="<?= $ptgn->jml_potongan?>"required>
                </div>
                <!-- Pastikan button submit didalam form, agar menjalan action form  -->
                <button type="submit" class="btn btn-success"value="submit">SIMPAN</button>
                <a href="<?= base_url('admin/potongan_gaji')?>" ><div class="btn btn-primary">BATAL</div></a>
            </form>
            <?php endforeach;?>
        </div>
    </div>
</div>


           
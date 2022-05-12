<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>
    <div class="card">
        <div class="card-body" style="width:65%">
            <form action="<?= base_url('admin/potongan_gaji/tambah_data_aksi')?>" method="POST">
                <div class="form-group">
                    <label for="">Jenis Potongan</label>
                    <input type="text" name="potongan" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Jumlah Potongan</label>
                    <input type="number" name="jml_potongan" class="form-control" required>
                </div>
                <!-- Pastikan button submit didalam form, agar menjalan action form  -->
                <button type="submit" class="btn btn-primary"value="submit">SIMPAN</button>
            </form>
            
        </div>
    </div>
</div>


           
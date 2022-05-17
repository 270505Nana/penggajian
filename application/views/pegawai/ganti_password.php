<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="card" style="width:50%">
        <div class="card-body">
            <form method="POST" action="<?= base_url('pegawai/ganti_password/ganti_password_aksi') ?>" >

                <div class="form-group">
                    <label for="">Password Baru</label>
                    <input type="password" name="passbaru" class="form-control" >
                    <?php echo form_error('passbaru', '<div class="text-small text-danger mb-2 mt-2 ml-2"></div>') ?>
                </div>

                
                <div class="form-group">
                    <label for="">Ulangi Password </label>
                    <input type="password" name="ulangipass" class="form-control" > 
                    <?php echo form_error('ulangipass', '<div class="text-small text-danger mb-2 mt-2 ml-2"></div>') ?>
                </div>

                <button type="submit" class="btn btn-success">UBAH PASSWORD</button>
            </form>
        </div>
    </div>
</div>


           
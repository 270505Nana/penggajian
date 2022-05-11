<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>
    <div class="card" style="width:60%">
        <div class="card-body">

            <?php foreach($jabatan as $jbtn):?>


            <form action="<?= base_url('admin/data_jabatan/update_data_aksi')?>" method="POST">

               <div class="form-group">
                   <label for="">Nama Jabatan</label>
                   <input type="hidden" name="id_jabatan" class="form-control" value="<?= $jbtn->id_jabatan ?>">
                   <input type="text" name="nama_jabatan" class="form-control" value="<?= $jbtn->nama_jabatan ?>" required>
                   <!-- Harusnya muncul alert "FORM HARUS DIISI" tapi error jadi pake required dulu -->
                   <?php echo form_error('nama_jabatan', '<div class="text-danger small mb-2 mt-2 ml-2">', '</div>'); ?>
               </div>

               <div class="form-group">
                   <label for="">Gaji Pokok</label>
                   <input type="number" name="gaji_pokok" class="form-control" value="<?= $jbtn->gaji_pokok ?>" required>
                   <!-- Harusnya muncul alert "FORM HARUS DIISI" tapi error jadi pake required dulu -->
                   <?php echo form_error('nama_jabatan', '<div class="text-danger small mb-2 mt-2 ml-2">', '</div>'); ?>
               </div>

               <div class="form-group">
                   <label for="">Tunjangan Transportasi</label>
                   <input type="number" name="tj_transport" class="form-control" value="<?= $jbtn->tj_transport ?>" required>
                   <!-- Harusnya muncul alert "FORM HARUS DIISI" tapi error jadi pake required dulu -->
                   <?php echo form_error('tj_transport', '<div class="text-danger small mb-2 mt-2 ml-2">', '</div>'); ?>
               </div>

               <div class="form-group">
                   <label for="">Uang Makan</label>
                   <input type="number" name="uang_makan" class="form-control" value="<?= $jbtn->uang_makan ?>" required>
                   <!-- Harusnya muncul alert "FORM HARUS DIISI" tapi error jadi pake required dulu -->
                   <?php echo form_error('nama_jabatan', '<div class="text-danger small mb-2 mt-2 ml-2">', '</div>'); ?>
               </div>

               <button type="submit" class="btn btn-success">UBAH</button>
               <a href="<?= base_url('admin/data_jabatan')?>" ><div class="btn btn-primary">BATAL</div></a>
            </form>

            <?php endforeach;?>
        </div>
    </div>
</div>


           
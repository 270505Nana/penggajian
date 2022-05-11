<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>
    <div class="card" style="width:60%">
        <div class="card-body">
            <form action="<?= base_url('admin/data_jabatan/tambah_data_aksi')?>" method="POST">

               <div class="form-group">
                   <label for="">Nama Jabatan</label>
                   <input type="text" name="nama_jabatan" class="form-control" required>
                   <!-- Harusnya muncul alert "FORM HARUS DIISI" tapi error jadi pake required dulu -->
                   <?php echo form_error('nama_jabatan', '<div class="text-danger small mb-2 mt-2 ml-2">', '</div>'); ?>
               </div>

               <div class="form-group">
                   <label for="">Gaji Pokok</label>
                   <input type="text" name="gaji_pokok" class="form-control" required>
                   <!-- Harusnya muncul alert "FORM HARUS DIISI" tapi error jadi pake required dulu -->
                   <?php echo form_error('nama_jabatan', '<div class="text-danger small mb-2 mt-2 ml-2">', '</div>'); ?>
               </div>

               <div class="form-group">
                   <label for="">Tunjangan Transportasi</label>
                   <input type="text" name="tj_transport" class="form-control" required>
                   <!-- Harusnya muncul alert "FORM HARUS DIISI" tapi error jadi pake required dulu -->
                   <?php echo form_error('tj_transport', '<div class="text-danger small mb-2 mt-2 ml-2">', '</div>'); ?>
               </div>

               <div class="form-group">
                   <label for="">Uang Makan</label>
                   <input type="text" name="uang_makan" class="form-control" required>
                   <!-- Harusnya muncul alert "FORM HARUS DIISI" tapi error jadi pake required dulu -->
                   <?php echo form_error('nama_jabatan', '<div class="text-danger small mb-2 mt-2 ml-2">', '</div>'); ?>
               </div>

               <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
</div>


           
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="card" style="width : 60%">
        <div class="card-body">

            <form method="POST" action="<?= base_url('admin/data_pegawai/tambah_data_aksi_nana')?>" enctype="multipart/form-data">
        
            <div class="from-group">
                <label for="">NIK</label>
                <input type="number" name="nik" class="form-control" required>
                <!-- <?php echo form_error('nik', '<div class="text-danger small mb-2 mt-2 ml-2">', '</div>'); ?> -->
            </div>

            <div class="from-group">
                <label for="">Nama Pegawai</label>
                <input type="text" name="nama_pegawai" class="form-control" required>
                <!-- <?php echo form_error('nama_pegawai', '<div class="text-danger small mb-2 mt-2 ml-2">', '</div>'); ?> -->
            </div>

            <div class="from-group">
                <label for="">Jenis Kelamin</label>
               <select name="jenis_kelamin" class="form-control" required>
                   <option value="">---Pilih Jenis Kelamin</option>
                   <option value="Laki-Laki">Laki-Laki</option>
                   <option value="Perempuan">Perempuan</option>
               </select>
               <!-- <?php echo form_error('jenis_kelamin', '<div class="text-danger small mb-2 mt-2 ml-2">', '</div>'); ?> -->
            </div>
        
        
            
            <div class="from-group">
                <label for="">Jabatan</label>
               <select name="jabatan" class="form-control"required>
                   <option value="">---Pilih Jabatan---</option>
                   <?php foreach ($jabatan as $jbtn): ?>
                   
                   <option value="<?= $jbtn->nama_jabatan?>"><?= $jbtn->nama_jabatan?></option>
                   <?php endforeach;?>
               </select>
               <!-- <?php echo form_error('jabatan', '<div class="text-danger small mb-2 mt-2 ml-2">', '</div>'); ?> -->
            </div>

            <div class="from-group">
                <label for="">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" class="form-control" required >
            <!-- <?php echo form_error('Tanggal Masuk', '<div class="text-danger small mb-2 mt-2 ml-2">', '</div>'); ?> -->
            </div>


            <div class="from-group">
                <label for="">Status</label>
               <select name="status" class="form-control" required >
                   <option value="">---Pilih Status---</option>
                   <option value="Pegawai Tetap">Pegawai Tetap</option>
                   <option value="Pegawai Tidak Tetap">Pegawai Tidak Tetap</option>
               </select>
               <!-- <?php echo form_error('status', '<div class="text-danger small mb-2 mt-2 ml-2">', '</div>'); ?> -->
            </div>

            <div class="from-group">
                <label for="">Foto</label>
                <input type="file" name="foto" class="form-control">
            </div>

            <button type="submit" value="SIMPAN" class="btn btn-primary my-3">SIMPAN</button>

            </form>
        </div>
    </div>
</div>


           

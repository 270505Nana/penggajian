<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="card" style="width : 60%">
        <div class="card-body">

            <?php foreach ($pegawai as $p):?>

            <form method="POST" action="<?= base_url('admin/data_pegawai/update_data_aksi')?>" enctype="multipart/form-data">
        
            <div class="from-group">
                <label for="">NIK</label>
                <input type="hidden" name="id_pegawai" class="form-control" value="<?= $p->id_pegawai?>">
                <input type="number" name="nik" class="form-control" value="<?= $p->nik?>" required>
                <!-- <?php echo form_error('nik', '<div class="text-danger small mb-2 mt-2 ml-2">', '</div>'); ?> -->
            </div>

            <div class="from-group">
                <label for="">Nama Pegawai</label>
                <input type="text" name="nama_pegawai" class="form-control" value="<?= $p->nama_pegawai?>" required>
                <!-- <?php echo form_error('nama_pegawai', '<div class="text-danger small mb-2 mt-2 ml-2">', '</div>'); ?> -->
            </div>

            <div class="from-group">
                <label for="">Username</label>
                <input type="text" name="username" class="form-control" value="<?= $p->username?>" required>
               
            </div>

            <div class="from-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" value="<?= $p->password?>" required>
             
            </div>

            <div class="from-group">
                <label for="">Jenis Kelamin</label>
               <select name="jenis_kelamin" class="form-control" required>
                   <option  value="<?= $p->jenis_kelamin?>"><?= $p->jenis_kelamin?></option>
                   <option value="Laki-Laki">Laki-Laki</option>
                   <option value="Perempuan">Perempuan</option>
               </select>
               <!-- <?php echo form_error('jenis_kelamin', '<div class="text-danger small mb-2 mt-2 ml-2">', '</div>'); ?> -->
            </div>
            
            <div class="from-group">
                <label for="">Jabatan</label>
               <select name="jabatan" class="form-control"required>
                   <option value="<?= $p->jabatan?>"><?= $p->jabatan?></option>
                   <?php foreach ($jabatan as $jbtn): ?>
                   
                   <option value="<?= $jbtn->nama_jabatan?>"><?= $jbtn->nama_jabatan?></option>
                   <?php endforeach;?>
               </select>
               <!-- <?php echo form_error('jabatan', '<div class="text-danger small mb-2 mt-2 ml-2">', '</div>'); ?> -->
            </div>

            <div class="from-group">
                <label for="">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" class="form-control" value="<?= $p->tanggal_masuk?>" required >
            <!-- <?php echo form_error('Tanggal Masuk', '<div class="text-danger small mb-2 mt-2 ml-2">', '</div>'); ?> -->
            </div>


            <div class="from-group">
                <label for="">Status</label>
               <select name="status" class="form-control" required >
               <option value="<?= $p->status?>"><?= $p->status?></option>
                  
                   <option value="Pegawai Tetap">Pegawai Tetap</option>
                   <option value="Pegawai Tidak Tetap">Pegawai Tidak Tetap</option>
               </select>
               <!-- <?php echo form_error('status', '<div class="text-danger small mb-2 mt-2 ml-2">', '</div>'); ?> -->
            </div>

            <div class="from-group">
                <label for="">Foto</label>
                <input type="file" name="foto" class="form-control" value="<?= $p->foto?>" >
            </div>

            <div class="from-group">
                <label for="">Hak Akses</label>
               <select name="hak_akses" id="" class="form-control">
                    <option value="">
                    <?php if ($p->hak_akses == '1') {
                       echo"Admin";
                   } else{
                       echo"Pegawai";
                   } ?>
                   </option>
                    <option value="1">Admin</option>
                    <option value="2">Pegawai</option>
               </select>
            </div>

            <button type="submit" value="SIMPAN" class="btn btn-success my-3">UBAH</button>
            <a href="<?= base_url('admin/data_pegawai')?>" ><div class="btn btn-primary">BATAL</div></a>

            </form>
            <?php endforeach;?>
        </div>
    </div>
</div>


           

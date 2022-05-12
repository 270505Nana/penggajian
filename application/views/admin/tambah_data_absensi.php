<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
           Input Absensi Pegawai
        </div>

        <div class="card-body">
            <form class="form-inline">
                <div class="form-group mb-2">
                    <label for="staticEmail2" class="mr-2" >Bulan : </label>
                    <select class="form-control"name="bulan" id="">
                        <option value="">---Pilih Bulan---</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>

                    </select>
                </div>

                <div class="form-group mb-2">
                    <label for="staticEmail2" class="mr-2 ml-2" >Tahun : </label>
                    <select class="form-control"name="tahun" id="">
                        <option value="">---Pilih Tahun---</option>
                        <?php $tahun = date('Y');
                        for($i = 2022 ;$i<$tahun + 5;$i++){?>
                        <option value="<?= $i?>"><?= $i?></option>
                        <?php } ?>

                    </select>
                </div>
            
                <button type="submit" class="btn btn-primary ml-auto mb-2"><i class="fas fa-eye mr-2"></i>Generate</button>
               
            </form>
        </div>
    </div>
    <?php
    // Membuat percabangan
    // Ada data yang dimasukkan akan menampilkan data sesuai dengan bulan dan tahun yang diinput
    if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
        $bulan =$_GET['bulan'];
        $tahun =$_GET['tahun'];

        $bulantahun = $bulan . $tahun;
    }else{
        // Jika tidak ada, maka akan menampilkan bulan dan tahun sekarang
        $bulan = date('m'); //bulan
        $tahun = date('Y'); //tahun

        $bulantahun = $bulan . $tahun;
    }
    ?>
    <div class="alert alert-info">
        Menampilkan Data Kehadiran Pegawai Bulan: <span class="font-weight-bold"><?= $bulan?> </span> Tahun: <span class="font-weight-bold"><?= $tahun?> </span> 
    </div>
    <?= $this->session->flashdata('pesan')?>
    
    <!-- Kalau ada datanya akan menampilkan datanya ke dalam tabel -->
    <form method="POST" action="">
    
    <button name="submit"class="btn btn-success mb-3" type="submit" value="submit">SIMPAN</button>
    <table class="table table-bordered table-striped">
        <tr>

            <td class="text-center">No</td>
            <td class="text-center">NIK</td>
            <td class="text-center">Nama Pegawai</td>
            <td class="text-center">Jenis Kelamin</td>
            <td class="text-center">Jabatan</td>
            <td class="text-center" width="10%">Hadir</td>
            <td class="text-center"width="10%">Sakit</td>
            <td class="text-center"width="10%">Alpha</td>
        </tr>

        <?php 
        $no=1;
        foreach ($input_absensi as $a) :?>
           <tr>

           <input type="hidden" name="bulan[]"         class="form-control" value="<?= $bulantahun?>">
           <input type="hidden" name="nik[]"           class="form-control" value="<?= $a->nik?>">
           <input type="hidden" name="nama_pegawai[]"  class="form-control" value="<?= $a->nama_pegawai?>">
           <input type="hidden" name="jenis_kelamin[]" class="form-control" value="<?= $a->jenis_kelamin?>">
           <input type="hidden" name="nama_jabatan[]"  class="form-control" value="<?= $a->nama_jabatan?>">



               <td><?= $no++?></td>
               <td><?= $a->nik?></td>
               <td><?= $a->nama_pegawai?></td>
               <td><?= $a->jenis_kelamin?></td>
               <td><?= $a->nama_jabatan?></td>
               <td><input type="number" name="jumlah_hadir[]" class="form-control" value="0"></td>
               <td><input type="number" name="sakit[]"        class="form-control" value="0"></td>
               <td><input type="number" name="alpha[]"        class="form-control" value="0"></td>
           </tr>
        <?php endforeach?>
    </table>
    </form>
</div>


           
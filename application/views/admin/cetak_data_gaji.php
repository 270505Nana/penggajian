<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title?></title>
    <style type="text/css">
        body{
            font-family: Arial;
            color:black;
        }
    </style>
</head>
<body>

        <center>
            <h1>PT.INDONESIA BANGKIT</h1>
            <h2>Daftar Gaji Pegawai</h2>
        </center>

        <?php
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
        <table>
            <tr>
                <td>Bulan</td>
                <td>:</td>
                <td><?= $bulan?></td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td>:</td>
                <td><?= $tahun ?></td>
            </tr>
        </table>
        <table class="table table-bordered table-striped">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">NIK</th>
                <th class="text-center">Nama Pegawai</th>
                <th class="text-center">Jenis Kelamin</th>
                <th class="text-center">Jabatan</th>
                <th class="text-center">Gaji Pokok</th>
                <th class="text-center">Tj.Transport</th>
                <th class="text-center">Uang Makan</th>
                <th class="text-center">Potongan</th>
                <th class="text-center">Total Gaji</th>
            </tr>

            <?php foreach ($potongan as $p ) {

                // untuk potongan gaji
                $alpha = $p->jml_potongan;
            }?>

            <?php 
            $no=1;
            foreach ($cetak_gaji as $cg) : ?>  
            <!-- pengulangan data gaji  -->

            <?php $potongan=$cg->alpha * $alpha?>
            <!-- untuk mengali jumlah alpha dengan potonga gaji
            alpha = 150.000 -->
            <tr>
                <td><?= $no++?></td>
                <td><?= $cg->nik?></td>
                <td><?= $cg->nama_pegawai?></td>
                <td><?= $cg->jenis_kelamin?></td>
                <td><?= $cg->nama_jabatan?></td>
                <td>Rp.<?= number_format($cg->gaji_pokok,0,',','.')?></td>
                <td>Rp.<?= number_format($cg->tj_transport,0,',','.')?></td>
                <td>Rp.<?= number_format($cg->uang_makan,0,',','.')?></td>
                <td>Rp.<?= number_format($potongan,0,',','.')?></td>
                <td>Rp.<?= number_format($cg->gaji_pokok + $cg->tj_transport + $cg->uang_makan - $potongan,0,',','.')?></td>
            </tr>
            <?php endforeach;?>
        </table>

        <table width="100%">
            <tr>
                <td></td> <!-- left -->
                <td width="200px"> <!-- right -->
                    <p>Purwokerto, <?= date("d M Y")?><br>Finance</p>
                    <br>
                    <br>
                    <p>_____________________</p>
                </td>
            </tr>
        </table>
</body>
</html>

<script type="text/javascript">
    window.print()
</script>
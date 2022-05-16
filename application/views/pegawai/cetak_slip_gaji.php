<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title?></title>
    <style type="text/css">
        body{
            /* font-family: Arial; */
            color:black;
        }
    </style>
</head>
<body>
    <center>
        <h1>PT. INDONESIA BANGKIT</h1>
        <h2>Laporan Slip Gaji Pegawai</h2>
        <hr style="width:75%; border-width: 5px; color:black;">
    </center>

    <?php foreach($potongan as $p){

        $potongan=$p->jml_potongan;
    }
    ?>

    <?php
    foreach($print_slip_nana as $sn):?>

    <?php $potongan_gaji=$sn->alpha * $potongan;?>

    <table class="ml-4 mt-4" style="width:100%">
        <tr>
            <td width="20%">Nama Pegawai</td>
            <td width="2%">:</td>
            <td><?= $sn->nama_pegawai?></td>
        </tr>

        <tr>
            <td>NIK</td>
            <td>:</td>
            <td><?= $sn->nik?></td>
        </tr>

        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td><?= $sn->nama_jabatan?></td>
        </tr>

        <tr>
            <td>Bulan</td>
            <td>:</td>
            <td><?= substr($sn->bulan, 0, 2 ) ?></td>
            <!-- substr untuk memecah tgl sama bulannya, karena kan didatabase jadi satu
            jadi satu 052022 -->

            <!-- Bulan itu kan 05 aja, brrti urutannya 0-1
            0 = 0
            5 = 1 -->

            <!-- 0 : argumen, kita ambil dimulai dari urutan keberapa -->
            <!-- 2 : jumlah stringnya, misal itu kan bulan 05 brrti ambilnya dua aja, kalau tahun 4 -->
        </tr>


        <tr>
            <td>Tahun</td>
            <td>:</td>
            <td><?= substr($sn->bulan, 2, 4 ) ?></td>
        </tr>

    </table>
    
    <table class="table table-striped table-bordered mt-3">
        <tr>
            <th class="text-center" width="5%">No</th>
            <th class="text-center">Keterangan</th>
            <th class="text-center">Jumlah</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Gaji Pokok</td>
            <td>Rp.<?= number_format($sn->gaji_pokok,0,',','.')?></td>
        </tr>
        <tr>
            <td>2</td>
            <td>Tunjangan Transportasi</td>
            <td>Rp.<?= number_format($sn->tj_transport,0,',','.')?></td>
        </tr>
        <tr>
            <td>3</td>
            <td>Uang Makan</td>
            <td>Rp.<?= number_format($sn->uang_makan,0,',','.')?></td>
        </tr>
        <tr>
            <td>4</td>
            <td>Potongan Gaji</td>
            <td>Rp.<?= number_format($potongan_gaji,0,',','.')?></td>
        </tr>

        <tr>
            <th colspan="2" style="text-align: right;">Total Gaji</th>
            <th>Rp.<?= number_format($sn->gaji_pokok + $sn->uang_makan + $sn->tj_transport - $potongan_gaji,0,',','.')?></th>
        </tr>
    </table>
    <table width="100%">
        <tr>
            <td></td>
            <td>
                <p>pegawai</p>
                <br>
                <br>
                <br>
                <p class="font-weight-bold"><?= $sn->nama_pegawai?></p>
            </td>

            <td width="200px">
                <p>Purwokerto,<?= date("d M Y ")?> <br> Finance,</p>
                <br>
                <br>
                <p>________________________</p>

            </td>
        </tr>

        
    </table>
    <?php endforeach;?>
</body>
</html>

<script type="text/javascript">
    window.print()
</script>
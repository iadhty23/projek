<?php
error_reporting(0);
session_start();


include 'koneksi.php';
include 'header.php';
// query data pegawai berdasarkan id
$mhs = query("SELECT * FROM bobot ")[0];
$nilai = query("SELECT * FROM nilai2");
?>

 <div id="layoutSidenav_content">
                <main>
<div  style="padding: 50px">

        <?php if ($mhs["c1"] == 0 ) : ?>
        <br><br>
        <center><span>Ubahlah Bobot Terlebih Dahulu, Pada Halaman SPK</span><center>
        <?php elseif ($mhs["c2"] == 0 ) : ?>
        <br><br>
        <center><span>Ubahlah Semua Bobot Terlebih Dahulu, Pada Halaman SPK</span><center>
        <?php elseif ($mhs["c3"] == 0 ) : ?>
        <br><br>
        <center><span>Ubahlah Semua Bobot Terlebih Dahulu, Pada Halaman SPK</span><center>
        <?php elseif ($mhs["c4"] == 0 ) : ?>
        <br><br>
        <center><span>Ubahlah Semua Bobot Terlebih Dahulu, Pada Halaman SPK</span><center>
        <?php elseif ($mhs["c5"] == 0 ) : ?>
        <br><br>
        <center><span>Ubahlah Semua Bobot Terlebih Dahulu, Pada Halaman SPK</span><center>
        <?php elseif ($mhs["c6"] == 0 ) : ?>
        <br><br>
        <center><span>Ubahlah Semua Bobot Terlebih Dahulu, Pada Halaman SPK</span><center>

        <?php else : ?>

        <header>
            <h3 align="center">Hasil Perangkingan</h3>
        </header>
    
        <?php $jumlahBobot = $mhs["c1"] + $mhs["c2"] + $mhs["c3"] + $mhs["c4"] + $mhs["c5"] +$mhs["c6"]  ;?>    
        <?php 
            $w1 = $mhs["c1"] / $jumlahBobot;
            $w2 = $mhs["c2"] / $jumlahBobot;
            $w3 = $mhs["c3"] / $jumlahBobot;
            $w4 = $mhs["c4"] / $jumlahBobot;
            $w5 = $mhs["c5"] / $jumlahBobot;
            $w6 = $mhs["c6"] / $jumlahBobot;
        ?>

    <?php $jumlah = 0; ?>
    <?php foreach ($nilai as $langkah1) :  ?>
        <?php 
        $jumlah_k1 = $langkah2["k1"] + $langkah2["k2"];    
        $kriteria1 = ($jumlah_k1 / 8) * 100;
        
        $jumlah_k2 = $langkah2["k3"] + $langkah2["k4"] + $langkah2["k5"];    
        $kriteria2 = ($jumlah_k2 / 12) * 100;

        $jumlah_k3 = $langkah2["k6"] + $langkah2["k7"];
        $kriteria3 = ($jumlah_k3 / 8) * 100;

        $jumlah_k4 = $langkah2["k8"] + $langkah2["k9"];    
        $kriteria4 = ($jumlah_k4 / 8) * 100;

        $jumlah_k5 = $langkah2["k10"] + $langkah2["k11"];    
        $kriteria5 = ($jumlah_k5 / 8) * 100;

        $jumlah_k6 = $langkah2["k12"] + $langkah2["k13"];    
        $kriteria6 = ($jumlah_k6 / 8) * 100;
        
        
    ?>
    
    <?php $hitung2 =  $kriteria1 ** $w1 * 
                    $kriteria2 ** $w2 * 
                    $kriteria3 ** $w3 *  
                    $kriteria4 ** $w4 * 
                    $kriteria5 ** $w5 *
                    $kriteria6 ** $w6;?>

    <?php $jumlah += $hitung2; ?>
    <?php endforeach; ?>



<h3 align="center">Tabel Nilai dan Perhitungan</h3>

    <table align="center" class="table table-bordered">
    <tr>
        <th rowspan="2">NO.</th>
        <th rowspan="2">Nama</th>
        <th colspan="6">Nilai</th>
        <th colspan="2">Nilai Perhitungan</th>
    </tr>
    <tr>
    <th>Etika dan <br> Perilaku</th>
    <th>Tanggung <br> Jawab</th>
    <th>Kedisiplinan</th>
    <th>Kecakapan <br> Kerja</th>
    <th>Kehadiran</th>
    <th>Integritas</th>
    <th>Hasil vektor S</th>
    <th>Hasil vektor V</th>
    </tr>
    <?php $j = 0; ?>
    <?php $i=1; ?>
    <?php foreach ($nilai as $langkah2) :  ?>
        <?php 
        $jumlah_k1 = $langkah2["k1"] + $langkah2["k2"];    
        $kriteria1 = ($jumlah_k1 / 8) * 100;
        
        $jumlah_k2 = $langkah2["k3"] + $langkah2["k4"] + $langkah2["k5"];    
        $kriteria2 = ($jumlah_k2 / 12) * 100;

        $jumlah_k3 = $langkah2["k6"] + $langkah2["k7"];
        $kriteria3 = ($jumlah_k3 / 8) * 100;

        $jumlah_k4 = $langkah2["k8"] + $langkah2["k9"];    
        $kriteria4 = ($jumlah_k4 / 8) * 100;

        $jumlah_k5 = $langkah2["k10"] + $langkah2["k11"];    
        $kriteria5 = ($jumlah_k5 / 8) * 100;

        $jumlah_k6 = $langkah2["k12"] + $langkah2["k13"];    
        $kriteria6 = ($jumlah_k6 / 8) * 100;
        
        
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $langkah2["nama"]; ?></td>
        <td><?php echo number_format($kriteria1, 2); ?></td>
        <td><?php echo number_format($kriteria2, 2); ?></td>
        <td><?php echo number_format($kriteria3, 2); ?></td>
        <td><?php echo number_format($kriteria4, 2); ?></td>
        <td><?php echo number_format($kriteria5, 2); ?></td>
        <td><?php echo number_format($kriteria6, 2); ?></td>
        <?php $hitung3 =  $kriteria1 ** $w1 * 
                        $kriteria2 ** $w2 * 
                        $kriteria3 ** $w3 *  
                        $kriteria4 ** $w4 * 
                        $kriteria5 ** $w5 *
                        $kriteria6 ** $w6;?>
        <td><?php echo number_format($hitung3, 4); ?></td>
        <?php $kesimpulan = $hitung3/ $jumlah; ?>
        <td> <?php echo number_format($kesimpulan, 4); ?> </td>
        <?php $urut[] = number_format($kesimpulan, 4) . " " .  " ( " .  $langkah2["nama"] . " ) "; ?>        
    <?php $i++; ?>
    <?php $j++ ?>
    <?php endforeach; ?>
    </tr>
    <tr>
    <td colspan="8" align="right"> Jumlah </td>
    <td><?php echo number_format($jumlah, 4); ?></td>    
    </tr>
</table>

<?php rsort($urut); ?>
<br>
<p align="center">Berikut adalah hasil akhir dari perhitungan Metode Weighted Product</p>
<h3 align="center">Hasil Kesimpulan</h3>
<table align="center" class="table table-bordered" >

    <tr>
        <th>Peringkat</th>
        <th>Nama dan Hasil Akhir</th>
    </tr>
<?php $c = 1; ?>
<?php $jumlah = $j; ?>
<?php for( $x=0; $x < $jumlah; $x++ ) : ?>
    <tr>
        <td><?php echo $c; ?></td>
        <td><?php echo $urut[$x]; ?></td>
     </tr>
    
<?php $c++ ?>
<?php endfor; ?>
</table>
<br>
<hr>
<p>*Ubah kedalam format pdf</p>
<form action="reportpdf.php" method="post">
<select class="form-control mb-2 cari" name="bulan" id="" required>
<option value="">Masukkan Bulan</option>
<option value="Januari">Januari</option>
<option value="Februari">Februari</option>
<option value="Maret">Maret</option>
<option value="April">April</option>
<option value="Mei">Mei</option>
<option value="Juni">Juni</option>
<option value="Juli">Juli</option>
<option value="Agustus">Agustus</option>
<option value="September">September</option>
<option value="Oktober">Oktober</option>
<option value="November">November</option>
<option value="Desember">Desember</option>
</select>
<input type="text" class="form-control mb-2 cari" name="tahun" placeholder="Masukkan Tahun" required>
<button type="submit" class=" btn btn-danger cari" name="submit" required>Print</button>
</form>
<?php endif ;?>
</main>
<?php include 'footer.php'; ?>
</div>

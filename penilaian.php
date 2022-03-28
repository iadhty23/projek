<?php include 'koneksi.php'; 
include 'header.php';
?>
<?php
error_reporting(0);
session_start();
$sesi = $_SESSION['level'];
if( $sesi == "" || $sesi == "user" ){
    header("location:login.php");
}

$nilai = query("SELECT * FROM nilai2 ORDER BY id_nilai2");
$sus = count($nilai);


if($sus == 0){
    $jadi = 1;
}else{
    $jadi = 2;
}

?>
 <div id="layoutSidenav_content">
                <main>




    <?php if($jadi == 1) : ?>
        <span class="blink">Data Kosong, Silahkan Klik Tambah Nilai</span>

    <?php else : ?> 
     <div class="container-fluid px-4 mt-2">
                       <a href="tambah_nilaipegawai.php" class="btn btn-primary mb-2">Tambah Nilai pegawai</a>
                         <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Pegawai
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
   <thead>
    <tr>
        <th>NO.</th>
        <th>Nama</th>
        <th>Etika dan <br> Perilaku</th>
        <th>Tanggung <br> Jawab</th>
        <th>Kedisiplinan</th>
        <th>Kecakapan <br> Kerja</th>
        <th>Kehadiran</th>
        <th colspan="2">AKSI</th>
    </tr>
</thead>
<tbody>
    <?php $i = 1; ?>
    <?php foreach ($nilai as $row) :  ?>
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
        <td><?php echo $row["nama"]; ?></td>
        <td><?php echo number_format( $kriteria1, 2 ) ; ?></td>
        <td><?php echo number_format( $kriteria2, 2) ; ?></td>
        <td><?php echo number_format( $kriteria3, 2 ) ; ?></td>
        <td><?php echo number_format( $kriteria4, 2 ) ; ?></td>
        <td><?php echo number_format( $kriteria5, 2 ) ; ?></td>
        <td><?php echo number_format( $kriteria6, 2 ) ; ?></td>
        <td>
            <a href="ubah_nilai.php?id=<?= $row["id_nilai2"]; ?>" class="btn btn-warning btn-sm aksi">Ubah</a> |
            <a href="hapus_nilai.php?id=<?= $row["id_nilai2"]; ?>" class="btn btn-danger btn-sm aksi" onclick="return confirm('yakin ingin menghapus?');">hapus</a>
        </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>

</tbody>
    </table>
    <?php endif; ?>
    </div>


</main>
<?php include 'footer.php'; ?>
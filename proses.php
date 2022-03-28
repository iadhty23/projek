<?php
error_reporting(0);

session_start();
$sesi = $_SESSION['level'];
if( $sesi == "" || $sesi == "user" ){
    header("location:login.php");
}

include 'koneksi.php';
include 'header.php';
// ambil data di URL

// query data pegawai berdasarkan id
$mhs = query("SELECT * FROM bobot ")[0];
$nilai = query("SELECT * FROM nilai2");
?>

<?php
if( isset($_POST["submit"]) ) {

    if (ubah_bobot($_POST) > 0){
        header("location:ubahBobot.php");
        $text = "bobot diubah";
    }    
}
?>

<?php 
    $text = "* Silahkan ubah bobot jika ingin mengubah bobot, jika tidak bisa tekan proses";
?>
<div id="layoutSidenav_content">
                <main>


        <header>
            <h3 align="center">Perangkingan Dengan Metode Weighted Product</h3>
        </header>

<br>
<br>
    <form action="" method="post">

        <input type="hidden" name="id" value="<?php echo $mhs["id_bobot"]; ?>">

        <h4 align="center"> *Silahkan ubah bobot, jika sudah tekan tombol ubah bobot kemudian tekan proses <br>
                            *Jika tidak ingin mengubah bobot bisa langsung tekan proses    
        </h4>
        <table border="1px solid" cellspacing="0" cellpadding="2px" align="center"> 
            <tr>
                <th>Indikator</th>
                <th>Kode</th>
                <th>Bobot</th>
            </tr>
            <tr>
                <td>Etika dan <br> Perilaku</td>
                <td><label for="c1">C1</label></td>
                <td>    
                    <input type="text" name="c1" id="c1" required value="<?php echo $mhs["c1"]; ?>">
                </td>
            </tr>
            <tr>
                <td>Tanggung <br> Jawab</td>
                <td><label for="c2">C2</label></td>
                <td>
                    <input type="text" name="c2" id="c2" required value="<?php echo $mhs["c2"]; ?>">
                </td>
            </tr>
            <tr>
                <td>Kedisiplinan</td>
                <td><label for="c3">C3</label></td>
                <td>
                    <input type="text" name="c3" id="c3" required value="<?php echo $mhs["c3"]; ?>">
                </td>
            </tr>
            <tr>
                <td>Kecakapan <br> Kerja</td>
                <td><label for="c4">C4</label></td>
                <td>
                    <input type="text" name="c4" id="c4" required value="<?php echo $mhs["c4"]; ?>">
                </td>
            </tr>
            <tr>
                <td>Kehadiran</td>
                <td><label for="c5">C5</label></td>
                <td>
                    <input type="text" name="c5" id="c5" required value="<?php echo $mhs["c5"]; ?>">
                </td>
            </tr>
            <tr>
                <td>Integritas</td>
                <td><label for="c6">C6</label></td>
                <td>
                    <input type="text" name="c6" id="c6" required value="<?php echo $mhs["c6"]; ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td  align="center" colspan="2"><button type="submit" class="btn btn-success" name="submit">Ubah Data</button></td>
            </tr>
        </table>
        <br>
        <center>
        <button type="submit" name="proses" class="btn btn-primary">Proses</button>
        </center>
    </form>
    <hr>
<div  style="padding: 50px">
<?php if( isset($_POST["proses"]) ) : ?>

<?php if ($mhs["c1"] == 0) :?>
    <center><span class="blink">Tentukan Semua Bobot Terlebih Dahulu !</span><center>

<?php elseif ($mhs["c2"] == 0) : ?>
    <center><span class="blink">Tentukan Semua Bobot Terlebih Dahulu !</span><center>

<?php elseif ($mhs["c3"] == 0) : ?>
    <center><span class="blink">Tentukan Semua Bobot Terlebih Dahulu !</span><center>

<?php elseif ($mhs["c4"] == 0) : ?>
    <center><span class="blink">Tentukan Semua Bobot Terlebih Dahulu !</span><center>

<?php elseif ($mhs["c5"] == 0) : ?>
    <center><span class="blink">Tentukan Semua Bobot Terlebih Dahulu !</span><center>

<?php elseif ($mhs["c6"] == 0) : ?>
    <center><span class="blink">Tentukan Semua Bobot Terlebih Dahulu !</span><center>

<?php else : ?>


<?php $jumlahBobot = $mhs["c1"] + $mhs["c2"] + $mhs["c3"] + $mhs["c4"] + $mhs["c5"] +$mhs["c6"]  ;?>    

<br>
<h2 align="center">Langkah 1</h2>
        <p align="center">Langkah 1 Menentukan tingkat prioritas bobot setiap kriteria</p>
        <table align="center" class="table table-bordered">
        
        <tr> 
            <th>W1</th>
            <th>W2</th>
            <th>W3</th>
            <th>W4</th>
            <th>W5</th>
            <th>W6</th>
        </tr>

        

        <?php 
            $w1 = $mhs["c1"] / $jumlahBobot;
            $w2 = $mhs["c2"] / $jumlahBobot;
            $w3 = $mhs["c3"] / $jumlahBobot;
            $w4 = $mhs["c4"] / $jumlahBobot;
            $w5 = $mhs["c5"] / $jumlahBobot;
            $w6 = $mhs["c6"] / $jumlahBobot;
        ?>
        <tr>
            <td><?php echo number_format($w1, 4); ?></td>
            <td><?php echo number_format($w2, 4); ?></td>
            <td><?php echo number_format($w3, 4); ?></td>
            <td><?php echo number_format($w4, 4); ?></td>
            <td><?php echo number_format($w5, 4); ?></td>
            <td><?php echo number_format($w6, 4); ?></td>
        </tr>
        </table>
<br>

    <?php $jumlah = 0; ?>
    <?php foreach ($nilai as $row1) :  ?>
    
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
    <h2 align="center">Langkah 2</h2>
    <p align="center">Langkah 2 menghitung vektor S</p>

    <table align="center" class="table table-bordered">
    <tr>
    <th>Kode</th>
    <th>Nama</th>
    <th>C1</th>
    <th>C2</th>
    <th>C3</th>
    <th>C4</th>
    <th>C5</th>
    <th>C6</th>
    <th>Hasil dari <br> vektor S</th>
    </tr>

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
        <td>A<?php echo $i; ?></td>
        <td><?php echo $langkah2["nama"]; ?></td>
        <td><?php echo number_format($kriteria1, 2) ; ?></td>
        <td><?php echo number_format($kriteria2, 2) ; ?></td>
        <td><?php echo number_format($kriteria3, 2) ; ?></td>
        <td><?php echo number_format($kriteria4, 2) ; ?></td>
        <td><?php echo number_format($kriteria5, 2) ; ?></td>
        <td><?php echo number_format($kriteria6, 2) ; ?></td>
        <?php $hitung3 =  $kriteria1 ** $w1 * 
                        $kriteria2 ** $w2 * 
                        $kriteria3 ** $w3 *  
                        $kriteria4 ** $w4 * 
                        $kriteria5 ** $w5 *
                        $kriteria6 ** $w6;?>
        <td><?php echo number_format($hitung3, 4); ?></td>
        
    </tr>

        <?php $i++; ?>
    <?php endforeach; ?>

    <tr>
    <td colspan="8" align="right"> Jumlah </td>
    <td><?php echo number_format($jumlah, 4); ?></td>
    </tr>
</table>

<h2 align="center">Langkah 3</h2>
<p align="center"> Langkah 3 menghitung vektor V</p>

    <table align="center" class="table table-bordered">
    <tr>
    <th>Kode</th>
    <th>Nama</th>
    <th>C1</th>
    <th>C2</th>
    <th>C3</th>
    <th>C4</th>
    <th>C5</th>
    <th>C6</th>
    <th>Hasil dari <br> vektor S</th>
    <th>Hasil dari <br> vektor V</th>
    </tr>
    <?php $j = 0; ?>
    <?php $i=1; ?>
    <?php foreach ($nilai as $langkah3) :  ?>
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
        <td>A<?php echo $i; ?></td>
        <td><?php echo $langkah3["nama"]; ?></td>
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
        <?php $urut[] = number_format($kesimpulan, 4) . " " .  " ( " .  $langkah3["nama"] . " ) "; ?>        
    <?php $i++; ?>
    <?php $j++ ?>
    <?php endforeach; ?>
    </tr>
    <tr>
    <td colspan="8" align="right"> Jumlah </td>
    <td><?php echo number_format($jumlah, 4); ?></td>    
    </tr>
</table>

<?php rsort($urut);?>
<h2 align="center">Hasil Kesimpulan</h2>
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
<?php endif; ?>
<?php endif; ?>
</main>
<?php include 'footer.php'; ?>
</div>

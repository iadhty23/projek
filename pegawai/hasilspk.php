<?php
error_reporting(0);
session_start();



include '../koneksi.php';

// query data pegawai berdasarkan id
$mhs = query("SELECT * FROM bobot ")[0];
$nilai = query("SELECT * FROM nilai2");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SPK PEGAWAI</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">SPK PENILAIAN PEGAWAI</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="setting.php">Settings</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                       

                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Hasil Perhitungan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="hasilspk.php">Hasil Perhitungan</a>
                                </nav>
                            </div>
                          
                            

                        
                           
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Aplikasi:</div>
                        Sistem Pendukung Keputusan Penilaian pegawai
                    </div>
                </nav>
            </div>
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
</div>
<?php endif ;?>
               <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Projek Kuliah Praktik M Rifqi Setyadi dan Ilham Adhitya</div>
                           
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>


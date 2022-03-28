<?php
require 'koneksi.php';

$bulan = $_POST["bulan"];
$tahun = $_POST["tahun"];

require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$nilai = query("SELECT * FROM nilai2");
$bobot = query("SELECT * FROM bobot")[0];


$jumlah = $bobot["c1"] + $bobot["c2"] + $bobot["c3"] + $bobot["c4"] + $bobot["c5"] + $bobot["c6"];  

$w1 = $bobot["c1"] / $jumlah;
$w2 = $bobot["c2"] / $jumlah;
$w3 = $bobot["c3"] / $jumlah;
$w4 = $bobot["c4"] / $jumlah;
$w5 = $bobot["c5"] / $jumlah;
$w6 = $bobot["c6"] / $jumlah;

        $html = '<html>
             <head>
                <style>
               
                .table1 {
                    font-family: sans-serif;
                    color: #232323;
                    border-collapse: collapse;
                    text-align: center;
                }
                
                .table1, th{
                    border: 1px solid #999;
                    padding: 7px 10px;
                    font-size: 11px;
                }

                 td {
                    border: 1px solid #999;
                    padding: 8px 10px;
                    font-size: 10px;
                }

                h2, p{
                    text-align: center;
                    margin-top: 0;
                }

                h3 {
                    text-decoration: underline;
                    text-align: center;
                }
                pre {
                    text-decoration : bold;
                }
            </style>
            </head>';
            
        $html .= '<body>
            <h2>Badan Penanggulangan Bencana Daerah Istimewa Yogyakarta</h2>
            <p>Jl. Kenari No. 14A, Semaki, Umbulharjo, Telp. (0274) 555584</p>
            <hr/>
            <br>
            <h3>Laporan Hasil Penilaian Kinerja Pegawai</h3>

            <br>
            <pre>
            Bulan           : ' . $bulan . ' 
            Tahun           : ' . $tahun . '
            </pre>  
            ';


        
        $html .= '<table class="table1">
                    <tr>
                        <th rowspan="2">NO.</th>
                        <th rowspan="2">Nama</th>
                        <th colspan="6">Nilai</th>
                        <th colspan="2">Nilai Perhitungan</th>
                    </tr>
                    <tr>
                    <th>Perencanaan <br> Pembelajaran</th>
                    <th>Pelaksanaan <br> Pembelajaran</th>
                    <th>Penilaian <br> Hasil Pembelajaran</th>
                    <th>Melatih dan <br> Membimbing</th>
                    <th>Tugas <br> Tambahan</th>
                    <th>Pengembangan <br> Kegiatan Profesional</th>
                    <th>Hasil Vector S</th>
                    <th>Hasil Vector V</th>
                    </tr>';


            $jumlahLangkah2 = 0;
            foreach( $nilai as $hasil ){
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


                $langkah2 = $kriteria1 ** $w1 *
                            $kriteria2 ** $w2 *
                            $kriteria3 ** $w3 *
                            $kriteria4 ** $w4 *
                            $kriteria5 ** $w5 *
                            $kriteria6 ** $w6 ;
                $jumlahLangkah2 += $langkah2;
            }
        
        
        $j = 0;    
        $i =1;
        foreach( $nilai as $hasil2 ){
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

        $langkah3 = $kriteria1 ** $w1 *
                    $kriteria2 ** $w2 *
                    $kriteria3 ** $w3 *
                    $kriteria4 ** $w4 *
                    $kriteria5 ** $w5 *
                    $kriteria6 ** $w6 ;
        $kesimpulan = $langkah3 / $jumlahLangkah2;
        $urut[] = number_format($kesimpulan, 4) . " " . " ( " . $hasil2["nama"] . " ) ";
        $simpul = number_format($kesimpulan, 4);
        $vektorV = number_format($langkah3, 4);
        $jumlahVektorV = number_format($jumlahLangkah2, 4);

        $html .= "<tr>
        <td>" . $i . "</td>
        <td>" . $hasil2["nama"] . "</td>
        <td>" . number_format($kriteria1, 2) . "</td>
        <td>" . number_format($kriteria2, 2) . "</td>
        <td>" . number_format($kriteria3, 2) . "</td>
        <td>" . number_format($kriteria4, 2) . "</td>
        <td>" . number_format($kriteria5, 2) . "</td>
        <td>" . number_format($kriteria6, 2) . "</td>
        <td>" . $vektorV . "</td>
        <td>" . $simpul . "</td>
        </tr>
        ";
        
        $j++;
        $i++;
        }


        
        $html .= "<tr>
        <td colspan='8'> Jumlah </td>
        <td> ".  $jumlahVektorV  ."</td>
        <td></td>
        </tr>
        </table>
        ";


        rsort($urut);
        

        $html .= " 
        <br>
        <h3>Hasil Kesimpulan</h3> ";
        $html .= "<table class='table1' align='center'>
            <tr>
                <th>Perinkat</th>
                <th>Hasil SPK</th>
            </tr>
            ";
        
        $no = 1;
        for( $x = 0; $x < $j; $x++ ){
        
        $html .= "<tr>
            <td>" . $no . "</td>
            <td>" . $urut[$x] . "</td>
        </tr>
        ";


        $no++;
        }
        

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'landscape');

$dompdf->render();

$dompdf->stream('Laporan_nilai.pdf');


?>
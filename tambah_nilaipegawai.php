<?php

include 'koneksi.php';
include 'header.php';
$pegawai = query("SELECT * FROM pegawai");



if( isset($_POST["simpan"]) ){

    if(tambahnilai($_POST) > 0 ){
        echo "
        <script>
            alert('data berhasil ditambahkan!');
            window.location = 'penilaian.php';
        </script>
        ";
    }else{
        echo "gagal";
    }

}



?>

<div id="layoutSidenav_content">
                <main>




<form action="" method="post">
<div style="padding-top: 25px;">
                        
<h2 align="center">Penilaian Kinerja pegawai</h2>
						
<div class="row">
	<div class='col-sm-3'></div>
		<div class='col-sm-5'>
<table class='table table-bordered'>
    <tr>
        <td>NAMA : </td>
    <td>
        <select name="nama" class="form-control" id="nama">
        <option>-</option>
        <?php foreach ($pegawai as $row) : ?>
        <option> <?php echo $row["nama"]; ?> </option>
        <?php endforeach; ?>

        </select>
    </td>
    </tr>
    <tr>
        <td>JABATAN : </td>
        <td>
            <select class="form-control">
                <option value="">Manager</option>
                <option value="">Supervisor</option>
                <option value="">Staff</option>
            </select>
        </td>
    </tr>
</table>
            </div>
</div>
<h4 align="center"> *Keterangan skor <br>
                    1 = Sangat Kurang,
                    2 = Kurang,
                    3 = Baik,
                    4 = Sangat Baik

        </h4>
        <br>		
<div class="row">
	<div class='col-sm-3'></div>
		<div class='col-sm-6'>
        <table class='table table-bordered'>

                <tr>
                    <td align="center">
                        <label for="">Program</label>
                    </td>
                    <td align="center">
                        <label for="">No</label>
                    </td>
                    <td align="center">
                        <label for="">Komponen Penilaian</label>
                    </td>
                    <td colspan="4">
                        <label for="">Skor</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label collrow for="">Etika dan Perilaku. </label>
                    </td>
                    <td>
                        <label for="">1. </label>
                    </td>
                    <td>
                        <label for="">Etika dan Perilaku terhadap pegawai</label>
                    </td>
                    <td>
                        <input type="radio" name="1" value="1" <?php if ($row["k1"] == "1") echo 'checked' ?> required> 1
                    </td>
                    <td>
                        <input type="radio" name="1" value="2" <?php if ($row["k1"] == "2") echo 'checked' ?> > 2
                    </td>
                    <td>
                        <input type="radio" name="1" value="3" <?php if ($row["k1"] == "3") echo 'checked' ?> > 3
                    </td>
                    <td>
                        <input type="radio" name="1" value="4" <?php if ($row["k1"] == "4") echo 'checked' ?> > 4
                    </td>
                </tr>


                <tr>
                    <td colspan="7">
                        <label for="">-</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label collrow for=""></label>
                    </td>
                    <td>
                        <label for="">2</label>
                    </td>
                    <td>
                        <label for="">Komunikasi dan bahasa antar pegawai</label>
                    </td>
                    <td>
                        <input type="radio" name="2" value="1" <?php if ($row["k2"] == "1") echo 'checked' ?> > 1
                    </td>
                    <td>
                        <input type="radio" name="2" value="2" <?php if ($row["k2"] == "2") echo 'checked' ?> > 2
                    </td>
                    <td>
                        <input type="radio" name="2" value="3" <?php if ($row["k2"] == "3") echo 'checked' ?> > 3
                    </td>
                    <td>
                        <input type="radio" name="2" value="4" <?php if ($row["k2"] == "4") echo 'checked' ?> > 4
                    </td>
                </tr>


                <tr>
                    <td colspan="7">
                        <label for="">-</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label collrow for="">Tanggung Jawab.</label>
                    </td>
                    <td>
                        <label for="">3</label>
                    </td>
                    <td>
                        <label for="">Melaksanakan tugas tanpa ditunda-tunda</label>
                    </td>
                    <td>
                        <input type="radio" name="3" value="1" <?php if ($row["k3"] == "1") echo 'checked' ?> > 1
                    </td>
                    <td>
                        <input type="radio" name="3" value="2" <?php if ($row["k3"] == "2") echo 'checked' ?> > 2
                    </td>
                    <td>
                        <input type="radio" name="3" value="3" <?php if ($row["k3"] == "3") echo 'checked' ?> > 3
                    </td>
                    <td>
                        <input type="radio" name="3" value="4" <?php if ($row["k3"] == "4") echo 'checked' ?> > 4
                    </td>
                </tr>

                <tr>
                    <td colspan="7">
                        <label for="">.</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label collrow for=""></label>
                    </td>
                    <td>
                        <label for="">4</label>
                    </td>
                    <td>
                        <label for="" hiden>Menunjukkan upaya optimal dalam melaksanakan tugas</label>
                    </td>
                    <td>
                        <input type="radio" name="4" value="1" <?php if ($row["k4"] == "1") echo 'checked' ?> > 1
                    </td>
                    <td>
                        <input type="radio" name="4" value="2" <?php if ($row["k4"] == "2") echo 'checked' ?> > 2
                    </td>
                    <td>
                        <input type="radio" name="4" value="3" <?php if ($row["k4"] == "3") echo 'checked' ?> > 3
                    </td>
                    <td>
                        <input type="radio" name="4" value="4" <?php if ($row["k4"] == "4") echo 'checked' ?> > 4
                    </td>
                </tr>

                <tr>
                    <td colspan="7">
                        <label for="">.</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label collrow for=""></label>
                    </td>
                    <td>
                        <label for="">5</label>
                    </td>
                    <td>
                        <label for="" hiden>Menyelesaikan tugas yang <br> diberikan sampai tuntas </label>
                    </td>
                    <td>
                        <input type="radio" name="5" value="1" <?php if ($row["k5"] == "1") echo 'checked' ?> > 1
                    </td>
                    <td>
                        <input type="radio" name="5" value="2" <?php if ($row["k5"] == "2") echo 'checked' ?> > 2
                    </td>
                    <td>
                        <input type="radio" name="5" value="3" <?php if ($row["k5"] == "3") echo 'checked' ?> > 3
                    </td>
                    <td>
                        <input type="radio" name="5" value="4" <?php if ($row["k5"] == "4") echo 'checked' ?> > 4
                    </td>
                </tr>


                <tr>
                    <td colspan="7">
                        <label for="">-</label>
                    </td>
                </tr>
                <tr>
                <td>
                        <label collrow for="">Kedisiplinan</label>
                    </td>
                    <td>
                        <label for="">6</label>
                    </td>
                    <td>
                        <label for="">Kehadiran sesuai jam kerja</label>
                    </td>
                    <td>
                        <input type="radio" name="6" value="1" <?php if ($row["k6"] == "1") echo 'checked' ?> > 1
                    </td>
                    <td>
                        <input type="radio" name="6" value="2" <?php if ($row["k6"] == "2") echo 'checked' ?> > 2
                    </td>
                    <td>
                        <input type="radio" name="6" value="3" <?php if ($row["k6"] == "3") echo 'checked' ?> > 3
                    </td>
                    <td>
                        <input type="radio" name="6" value="4" <?php if ($row["k6"] == "4") echo 'checked' ?> > 4
                    </td>
                </tr>

                <tr>
                    <td colspan="7">
                        <label for="">.</label>
                    </td>
                </tr>
                <tr>
                <td>
                        <label collrow for=""></label>
                    </td>
                    <td>
                        <label for="">7</label>
                    </td>
                    <td>
                        <label for="" hiden>Ketaatan terhadap ketentuan pakaian</label>
                    </td>
                    <td>
                        <input type="radio" name="7" value="1" <?php if ($row["k7"] == "1") echo 'checked' ?> > 1
                    </td>
                    <td>
                        <input type="radio" name="7" value="2" <?php if ($row["k7"] == "2") echo 'checked' ?> > 2
                    </td>
                    <td>
                        <input type="radio" name="7" value="3" <?php if ($row["k7"] == "3") echo 'checked' ?> > 3
                    </td>
                    <td>
                        <input type="radio" name="7" value="4" <?php if ($row["k7"] == "4") echo 'checked' ?> > 4
                    </td>
                </tr>


                <tr>
                    <td colspan="7">
                        <label for="">-</label>
                    </td>
                </tr>
                <tr>
                <td>
                        <label collrow for="">Kecakapan Kerja</label>
                    </td>
                    <td>
                        <label for="">8</label>
                    </td>
                    <td>
                        <label for="">Mampu menjalankan tugas sesuai <br> petunjuk teknis </label>
                    </td>
                    <td>
                        <input type="radio" name="8" value="1" <?php if ($row["k8"] == "1") echo 'checked' ?> > 1
                    </td>
                    <td>
                        <input type="radio" name="8" value="2" <?php if ($row["k8"] == "2") echo 'checked' ?> > 2
                    </td>
                    <td>
                        <input type="radio" name="8" value="3" <?php if ($row["k8"] == "3") echo 'checked' ?> > 3
                    </td>
                    <td>
                        <input type="radio" name="8" value="4" <?php if ($row["k8"] == "4") echo 'checked' ?> > 4
                    </td>
                </tr>

                <tr>
                    <td colspan="7">
                        <label for="">.</label>
                    </td>
                </tr>
                <tr>
                <td>
                        <label collrow for=""></label>
                    </td>
                    <td>
                        <label for="">9</label>
                    </td>
                    <td>
                        <label for="" hiden>Teliti dan tekun dalam <br> bekerja</label>
                    </td>
                    <td>
                        <input type="radio" name="9" value="1" <?php if ($row["k9"] == "1") echo 'checked' ?> > 1
                    </td>
                    <td>
                        <input type="radio" name="9" value="2" <?php if ($row["k9"] == "2") echo 'checked' ?> > 2
                    </td>
                    <td>
                        <input type="radio" name="9" value="3" <?php if ($row["k9"] == "3") echo 'checked' ?> > 3
                    </td>
                    <td>
                        <input type="radio" name="9" value="4" <?php if ($row["k9"] == "4") echo 'checked' ?> > 4
                    </td>
                </tr>


                <tr>
                    <td colspan="7">
                        <label for="">-</label>
                    </td>
                </tr>
                <tr>
                <td>
                        <label collrow for="">Kualitas Pekerjaan.</label>
                    </td>
                    <td>
                        <label for="">10</label>
                    </td>
                    <td>
                        <label for="">Ketrampilan dalam bekerja</label>
                    </td>
                    <td>
                        <input type="radio" name="10" value="1" <?php if ($row["k10"] == "1") echo 'checked' ?> > 1
                    </td>
                    <td>
                        <input type="radio" name="10" value="2" <?php if ($row["k10"] == "2") echo 'checked' ?> > 2
                    </td>
                    <td>
                        <input type="radio" name="10" value="3" <?php if ($row["k10"] == "3") echo 'checked' ?> > 3
                    </td>
                    <td>
                        <input type="radio" name="10" value="4" <?php if ($row["k10"] == "4") echo 'checked' ?> > 4
                    </td>
                </tr>

                <tr>
                    <td colspan="7">
                        <label for="">.</label>
                    </td>
                </tr>
                <tr>
                <td>
                        <label collrow for=""></label>
                    </td>
                    <td>
                        <label for="">11</label>
                    </td>
                    <td>
                        <label for="" >Tingkat komptensi karyawan dalam bekerja</label>
                    </td>
                    <td>
                        <input type="radio" name="11" value="1" <?php if ($row["k11"] == "1") echo 'checked' ?> > 1
                    </td>
                    <td>
                        <input type="radio" name="11" value="2" <?php if ($row["k11"] == "2") echo 'checked' ?> > 2
                    </td>
                    <td>
                        <input type="radio" name="11" value="3" <?php if ($row["k11"] == "3") echo 'checked' ?> > 3
                    </td>
                    <td>
                        <input type="radio" name="11" value="4" <?php if ($row["k11"] == "4") echo 'checked' ?> > 4
                    </td>
                </tr>

                <tr>
                    <td colspan="7">
                        <label for="">-</label>
                    </td>
                </tr>
                <tr>
                <td>
                        <label collrow for="">Integritas</label>
                    </td>
                    <td>
                        <label for="">12</label>
                    </td>
                    <td>
                        <label for="">Melaksanakan tugas secara transparan</label>
                    </td>
                    <td>
                        <input type="radio" name="12" value="1" <?php if ($row["k12"] == "1") echo 'checked' ?> > 1
                    </td>
                    <td>
                        <input type="radio" name="12" value="2" <?php if ($row["k12"] == "2") echo 'checked' ?> > 2
                    </td>
                    <td>
                        <input type="radio" name="12" value="3" <?php if ($row["k12"] == "3") echo 'checked' ?> > 3
                    </td>
                    <td>
                        <input type="radio" name="12" value="4" <?php if ($row["k12"] == "4") echo 'checked' ?> > 4
                    </td>
                </tr>

                <tr>
                    <td colspan="7">
                        <label for="">.</label>
                    </td>
                </tr>
                <tr>
                <td>
                        <label collrow for=""></label>
                    </td>
                    <td>
                        <label for="">13</label>
                    </td>
                    <td>
                        <label for="" >Akuntabel</label>
                    </td>
                    <td>
                        <input type="radio" name="13" value="1" <?php if ($row["k13"] == "1") echo 'checked' ?> > 1
                    </td>
                    <td>
                        <input type="radio" name="13" value="2" <?php if ($row["k13"] == "2") echo 'checked' ?> > 2
                    </td>
                    <td>
                        <input type="radio" name="13" value="3" <?php if ($row["k13"] == "3") echo 'checked' ?> > 3
                    </td>
                    <td>
                        <input type="radio" name="13" value="4" <?php if ($row["k13"] == "4") echo 'checked' ?> > 4
                    </td>
                </tr>
                <tr>
                    <td colspan="7">
                        <label for="">.</label>
                    </td>
                </tr>
                <tr>
                        <td align="center" colspan="6">
                            <button class="btn btn-success" type="submit" name="simpan">
                            <span class="glyphicon glyphicon-plus"></span>Tambah Data</button>
                        </td>
                </tr>
        </table>
        </div>
</div>
<br>


</form>
</div>
</main>
<?php include 'footer.php'; ?>
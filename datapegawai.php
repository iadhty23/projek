<?php include 'header.php'; 
include 'koneksi.php';
$pegawai = query ("SELECT * FROM pegawai ORDER BY id");
$sus = count($pegawai);

?>

  <div id="layoutSidenav_content">
                <main>

                    <div class="container-fluid px-4 mt-2">
                    	<a href="tambah_pegawai.php" class="btn btn-primary mb-2">Tambah Data</a>
                         <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Pegawai
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                                <th>No.</th>
							                    <th>Nama</th>
							                    <th>Jabatan</th>
							                    <th>Jenis Kelamin</th>
							                    <th>Umur</th>
							                    <th>Pendidikan Terakhir</th>
							                    <th>Masa Kerja</th>
							                    <th>Aksi</th>
                                        </tr>
                                    </thead>                        
            <tbody>
   				 <?php $i = 1; ?>
                <?php foreach($pegawai as $row) : ?>    
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $row["nama"]; ?></td>
                    <td><?= $row["kelamin"]; ?></td>
                    <td><?= $row["telpon"]; ?></td>
                    <td><?= $row["tanggal"]; ?> Tahun</td>
                    <td><?= $row["pend_ter"]; ?></td>
                    <td><?= $row["alamat"]; ?></td>
                    <td>
                        <a href="ubah.php?id=<?= $row["id"]; ?>" class="btn btn-warning btn-sm">Ubah</a> |
                        <a href="hapus.php?id=<?= $row["id"]; ?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin ingin menghapus?');">hapus</a>
                    </td>
                </tr>
           

                <?php $i++ ?>
                <?php endforeach; ?>
                 </tbody>
                </table>
                           


</div>
</div>
</div>
</main>
<?php 
include 'footer.php'; ?>
<?php 
  if (isset($_GET['delete'])) {
    $id_laporan_harian = $_GET['id_laporan_harian'];
    $sql = "delete from laporan_harian where id_laporan_harian='$id_laporan_harian'";
    $query = mysqli_query($con, $sql);
    if ($query) {
      echo "<script>alert('Data Laporan Harian Berhasil Dihapus!');window.location.href='detail_index.php?p=laporanhariankinerja'</script>";
    } else {
      echo mysqli_error($con);
    }
  }
 ?>

<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Laporan Harian</h3><span class="pull-right"><a class="btn btn-success" href="?p=laporanhariankinerja&act=create">Tambah Data</a></span>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>Kegiatan Harian</th>
              <th>SKP Bulanan</th>
              <th>SKP Tahunan</th>
              <th>Target Kuantitas</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            	<?php 

                $no = 0;
            		$sql = "select * from laporan_harian join skp_tahunan on laporan_harian.id_skp_tahunan=skp_tahunan.id_skp_tahunan join skp_bulanan on laporan_harian.id_skp_bulanan=skp_bulanan.id_skp_bulanan";
            		$query = mysqli_query($con, $sql);
            		while ($row = mysqli_fetch_assoc($query)):
                  $no++;
            	 ?>
            	<tr>
            	<td><?= $no ?></td>
            	<td><?= $row['tanggal'] ?></td>
                <td><?= $row['kegiatan_harian'] ?></td>
                <td><?= $row['kegiatan_bulanan'] ?></td>
                <td><?= $row['kegiatan_tahunan'] ?></td>
                <td><?= $row['kuantitas'] ?> <?= $row['satuankuantitas'] ?></td>
                <td><?= $row['status_laporan_harian'] ?></td>
                <td>
                  <a href="detail_index.php?p=laporanhariankinerja&act=edit&id_laporan_harian=<?= $row['id_laporan_harian'] ?>" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                  <a href="detail_index.php?p=laporanhariankinerja&delete&id_laporan_harian=<?= $row['id_laporan_harian'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Yakin Ingin Menghapus Data Atasan?')"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
            	 </tr>
            	<?php endwhile; ?>
            </tbody>
            
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
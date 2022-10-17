<?php 
  if (isset($_GET['delete'])) {
    $id_skp_bulanan = $_GET['id_skp_bulanan'];
    $sql = "DELETE from skp_bulanan where id_skp_bulanan='$id_skp_bulanan'";
    $query = mysqli_query($con, $sql);
    if ($query) {
      echo "<script>alert('Data SKP Bulanan Berhasil Dihapus!');window.location.href='detail_index.php?p=skpbulanan'</script>";
    } else {
      echo mysqli_error($con);
    }
  }
 ?>

<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data SKP Bulanan</h3><span class="pull-right"><a class="btn btn-success" href="?p=skpbulanan&act=create">Tambah Data</a></span>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Tahun</th>
              <th>Bulan</th>
              <th>SKP Tahunan</th>
              <th>Kegiatan Bulanan</th>
              <th>Target Kuantitas</th>
              <th>Target Kualitas</th>
              <th>Target Waktu</th>
              <th>Biaya</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            	<?php 

                $no = 0;
            		$sql = "SELECT * from skp_bulanan join skp_tahunan on skp_bulanan.id_skp_tahunan=skp_tahunan.id_skp_tahunan";
            		$query = mysqli_query($con, $sql);
            		while ($row = mysqli_fetch_assoc($query)):
                  $no++;
            	 ?>
            	<tr>
            	<td><?= $no ?></td>
            	<td><?= $row['tahun'] ?></td>
                <td><?= $row['bulan'] ?></td>
                <td><?= $row['kegiatan_tahunan'] ?></td>
                <td><?= $row['kegiatan_bulanan'] ?></td>
                <td><?= $row['target_kuantitas'] ?> 
                    <?= $row['satuan_kuantitas'] ?></td>
                <td><?= $row['target_kualitas'] ?></td>
                <td><?= $row['target_waktu'] ?> Hari</td>
                <td><?= $row['biaya'] ?></td>
                <td><?= $row['status_skp_bulanan'] ?></td>
                <td>
                  <a href="detail_index.php?p=skpbulanan&act=edit&id_skp_bulanan=<?= $row['id_skp_bulanan'] ?>" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                  <a href="detail_index.php?p=skpbulanan&delete&id_skp_bulanan=<?= $row['id_skp_bulanan'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Yakin Ingin Menghapus Data?')"><i class="glyphicon glyphicon-trash"></i></a>
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
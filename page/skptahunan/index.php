<?php 
  if (isset($_GET['delete'])) {
    $id_skp_tahunan = $_GET['id_skp_tahunan'];
    $sql = "delete from skp_tahunan where id_skp_tahunan='$id_skp_tahunan'";
    $query = mysqli_query($con, $sql);
    if ($query) {
      echo "<script>alert('Data SKP Tahunan Berhasil Dihapus!');window.location.href='detail_index.php?p=skptahunan'</script>";
    } else {
      echo mysqli_error($con);
    }
  }
 ?>

<div class="row">
    <div class="col-xs-12">

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data SKP Tahunan</h3><span class="pull-right"><a class="btn btn-success" href="?p=skptahunan&act=create">Tambah Data</a></span>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Tahun</th>
              <th>Kegiatan Tahunan</th>
              <th>Target Kuantitas</th>
              <th>Target Kualitas</th>
              <th>Target Waktu</th>
              <th>Periode Target</th>
              <th>Biaya</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            	<?php 

                $no = 0;
            		$sql = "SELECT * from skp_tahunan order by tahun";
            		$query = mysqli_query($con, $sql);
            		while ($row = mysqli_fetch_assoc($query)):
                  $no++;
            	 ?>
            	<tr>
            	<td><?= $no ?></td>
            	<td><?= $row['tahun'] ?></td>
              <td><?= $row['kegiatan_tahunan'] ?></td>
              <td><?= $row['target_kuantitas'] ?> <?= $row['satuan_kuantitas'] ?></td>
              <td><?= $row['target_kualitas'] ?></td>
              <td><?= $row['target_waktu'] ?> Bulan</td>
              <td><?= date("d M Y", strtotime($row['periode_awal'])) ?> - <?= date("d M Y", strtotime($row['periode_akhir'])) ?></td>
              <td><?= $row['biaya'] ?></td>
              <td><?= $row['status_skp_tahunan'] ?></td>
                <td>
                  <a href="detail_index.php?p=skptahunan&act=edit&id_skp_tahunan=<?= $row['id_skp_tahunan'] ?>" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                  <a href="detail_index.php?p=skptahunan&delete&id_skp_tahunan=<?= $row['id_skp_tahunan'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Yakin Ingin Menghapus Data Atasan?')"><i class="glyphicon glyphicon-trash"></i></a>
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
<?php 
  if (isset($_GET['delete'])) {
    $id_atasan = $_GET['id_atasan'];
    $sql = "delete from atasan where id_atasan='$id_atasan'";
    $query = mysqli_query($con, $sql);
    if ($query) {
      echo "<script>alert('Data Atasan Berhasil Dihapus!');window.location.href='detail_index.php?p=atasan'</script>";
    } else {
      echo mysqli_error($con);
    }
  }
 ?>

<div class="row">
    <div class="col-xs-12">

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Atasan</h3><span class="pull-right"><a class="btn btn-success" href="?p=atasan&act=create">Tambah Data Atasan</a></span>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>NIP</th>
              <th>Nama Atasan</th>
              <th>Jabatan</th>
              <th>Bidang</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            	<?php 

                $no = 0;
            		$sql = "select * from atasan";
            		$query = mysqli_query($con, $sql);
            		while ($row = mysqli_fetch_assoc($query)):
                  $no++;
            	 ?>
            	 <tr>
            	 	<td><?= $no ?></td>
            	 	<td><?= $row['nip'] ?></td>
                <td><?= $row['nama_atasan'] ?></td>
                <td><?= $row['jabatan'] ?></td>
                <td><?= $row['bidang'] ?></td>
                <td>
                  <a href="detail_index.php?p=atasan&act=edit&id_atasan=<?= $row['id_atasan'] ?>" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                  <a href="detail_index.php?p=atasan&delete&id_atasan=<?= $row['id_atasan'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Yakin Ingin Menghapus Data Atasan?')"><i class="glyphicon glyphicon-trash"></i></a>
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
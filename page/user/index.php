<?php 
  if (isset($_GET['delete'])) {
    $id_user = $_GET['id_user'];
    $sql = "delete from users where id_user='$id_user'";
    $query = mysqli_query($con, $sql);
    if ($query) {
      echo "<script>alert('Data berhasil dihapus!');window.location.href='detail_index.php?p=user'</script>";
    } else {
      echo mysqli_error($con);
    }
  }
 ?>

<div class="row">
    <div class="col-xs-12">

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data User</h3><span class="pull-right"><a class="btn btn-success" href="?p=user&act=create">Tambah Data User</a></span>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Username</th>
              <!-- <th>Password</th> -->
              <th>E-mail</th>
              <th>No.Telp</th>
              <th>Level</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            	<?php 

                $no = 0;
            		$sql = "select * from users";
            		$query = mysqli_query($con, $sql);
            		while ($row = mysqli_fetch_assoc($query)):
                  $no++;
            	 ?>
            	 <tr>
            	 	<td><?= $no ?></td>
            	 	<td><?= $row['nama'] ?></td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['no_telp'] ?></td>
                <td><?= $row['level'] ?></td>
                <!-- <td><?= $row['password'] ?></td> -->
                <!-- <td><?= $row['peran'] ?></td> -->
                <td>
                  <a href="detail_index.php?p=user&act=edit&id_user=<?= $row['id_user'] ?>" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                  <a href="detail_index.php?p=user&delete&id_user=<?= $row['id_user'] ?>" class="btn btn-danger" onclick="return confirm('Apakah yakin ingin menghapus data?')"><i class="glyphicon glyphicon-trash"></i></a>
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
<?php 

	if (isset($_POST['simpan'])) {

		$nama     = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $level    = $_POST['level'];

		$sql = "insert into users values(null, '$nama', '$username', '$password', '$email', '$no_telp', '$level')";
		$query = mysqli_query($con, $sql);
		if ($query) {
			echo "<script>alert('Data berhasil ditambahkan!');window.location.href='index.php?p=user'</script>";
		} else {
			echo "Error : " . mysqli_error($con);
		}
	}

 ?>

<div class="row">
    <!-- left column -->
    <div class="col-md-8">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form User</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama" name="nama" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Username</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Username" name="username" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Password</label>
              <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Masukan Password" name="password" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Masukan Email" name="email" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">No. Telp</label>
              <input type="no_telp" class="form-control" id="exampleInputEmail1" placeholder="Masukan No.Telp" name="no_telp" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Level</label>
              <select name="level" class="form-control">
                <option selected disabled>-- Pilih Level --</option>
                <option value="admin">Admin</option>
                <option value="pegawai">Pegawai</option>
                <option value="eselon 3">Eselon 3</option>
                <option value="eselon 4">Eselon 4</option>
              </select>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.box -->


    </div>
    <!--/.col (left) -->
    
  </div>
  <!-- /.row -->
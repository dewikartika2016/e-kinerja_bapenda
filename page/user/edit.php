<?php 

	$id_user = $_GET['id_user'];
  $sql = "select * from users where id_user='$id_user'";
  $query = mysqli_query($con, $sql);
  $data = mysqli_fetch_array($query);


  if (isset($_POST['simpan'])) {

    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $level    = $_POST['level'];
    // $peran = $_POST['peran'];

    $sql = "update users set nama='$nama', username='$username', password='$password', email='$email', no_telp='$no_telp', level='$level' where id_user='$id_user'";
    $query = mysqli_query($con, $sql);
    if ($query) {
      echo "<script>alert('Data berhasil diubah!');window.location.href='detail_index.php?p=user'</script>";
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
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama" name="nama" required value="<?= $data['nama'] ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Username</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Username" name="username" required value="<?= $data['username'] ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Password</label>
              <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Masukan Password" name="password" required value="<?= $data['password'] ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">E-mail</label>
              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Masukan E-mail" name="email" required value="<?= $data['email'] ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">No.Telp</label>
              <input type="no_telp" class="form-control" id="exampleInputEmail1" placeholder="Masukan No.Telp" name="no_telp" required value="<?= $data['no_telp'] ?>">
            </div>
            <div class="form-group">
              <label>Level</label>
              <select name="level" class="form-control custom-select">
                <option disabled>-- Pilih Level --</option>
                <option value="admin" <?= ($data['level']=='admin')?'selected':'' ?>>Admin</option>
                <option value="pegawai" <?= ($data['level']=='pegawai')?'selected':'' ?>>Pegawai</option>
                <option value="atasan" <?= ($data['level']=='atasan')?'selected':'' ?>>Atasan</option>

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
<?php 

	$id = $_GET['id'];
  $sql = "select * from atasan where id='$id'";
  $query = mysqli_query($con, $sql);
  $data = mysqli_fetch_array($query);


  if (isset($_POST['simpan'])) {

    $nip = $_POST['nip'];
    $nama_atasan = $_POST['nama_atasan'];
    $jabatan = $_POST['jabatan'];

    $sql = "update atasan set nip='$nip', nama_atasan='$nama_atasan', jabatan='$jabatan' where id='$id'";
    $query = mysqli_query($con, $sql);
    if ($query) {
      echo "<script>alert('Data Atasan Berhasil Diubah!');window.location.href='detail_index.php?p=atasan'</script>";
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
          <h3 class="box-title">Form Atasan</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">NIP</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan NIP" name="nip" required value="<?= $data['nip'] ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Atasan</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama Atasan" name="nama_atasan" required value="<?= $data['nama_atasan'] ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Jabatan</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Jabatan" name="jabatan" required value="<?= $data['jabatan'] ?>">
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
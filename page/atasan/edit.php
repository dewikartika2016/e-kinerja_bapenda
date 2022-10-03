<?php 

	$id_atasan = $_GET['id_atasan'];
  $sql = "select * from atasan where id_atasan='$id_atasan'";
  $query = mysqli_query($con, $sql);
  $data = mysqli_fetch_array($query);


  if (isset($_POST['simpan'])) {

    $nip = $_POST['nip'];
    $nama_atasan = $_POST['nama_atasan'];
    $jabatan = $_POST['jabatan'];
    $bidang = $_POST['bidang'];

    $sql = "update atasan set nip='$nip', nama_atasan='$nama_atasan', jabatan='$jabatan', jabatan='$jabatan' where id_atasan='$id_atasan'";
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
              <select name="jabatan" class="form-control custom-select">
                <option disabled>-- Pilih Jabatan --</option>
                <option value="Kepala Bidang" <?= ($data['jabatan']=='Kepala Bidang')?'selected':'' ?>>Kepala Bidang</option>
                <option value="Kepala Seksi" <?= ($data['jabatan']=='Kepala Seksi')?'selected':'' ?>>Kepala Seksi</option>
                <option value="Staff" <?= ($data['jabatan']=='Staff')?'selected':'' ?>>Staff</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Bidang</label>
              <select name="bidang" class="form-control custom-select">
                <option disabled>-- Pilih Bidang --</option>
                <option value="Divisi Sistem Informasi" <?= ($data['level']=='Divisi Sistem Informasi')?'selected':'' ?>>Divisi Sistem Informasi</option>
                <option value="Divisi Pemasaran" <?= ($data['level']=='Divisi Pemasaran')?'selected':'' ?>>Divisi Pemasaran</option>
                <option value="Divisi Sumber Daya Manusia" <?= ($data['level']=='Divisi Sumber Daya Manusia')?'selected':'' ?>>Divisi Sumber Daya Manusia</option>
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
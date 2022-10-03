<?php 
	if (isset($_POST['simpan'])) {

    $nama_pegawai = $_POST['nama_pegawai'];
    $jabatan = $_POST['jabatan'];
    $bidang = $_POST['bidang'];
    $id_atasan = $_POST['id_atasan'];

    $sql = "insert into pegawai values(null, '$nama_pegawai', '$jabatan', '$bidang', '$id_atasan')";
		$query = mysqli_query($con, $sql);
		if ($query) {
			echo "<script>alert('Data berhasil ditambahkan!');window.location.href='detail_index.php?p=pegawai'</script>";
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
          <h3 class="box-title">Form Data Pegawai</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Pegawai</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama Pegawai" name="nama_pegawai" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Jabatan</label>
              <select name="jabatan" class="form-control">
                <option selected disabled>-- Pilih Jabatan --</option>
                <option value="Kepala Bidang">Kepala Bidang</option>
                <option value="Kepala Seksi">Kepala Seksi</option>
                <option value="Staff">Staff</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Bidang</label>
              <select name="bidang" class="form-control">
                <option selected disabled>-- Pilih Bidang --</option>
                <option value="Divisi Sistem Informasi">Divisi Sistem Informasi</option>
                <option value="Divisi Pemasaran">Divisi Pemasaran</option>
                <option value="Divisi Sumber Daya Manusia">Divisi Sumber Daya Manusia</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Atasan</label>
              <select name="id_atasan" class="form-control">
                <option selected disabled>-- Pilih Atasan --</option>
                <?php
                  $atasan = mysqli_query($con,"SELECT * FROM atasan");
						      while ($data=mysqli_fetch_array($atasan)) {
				      	?>
                    <option value="<?php echo $data['id_atasan']; ?>">
                    <?php echo $data['nama_atasan']; ?> </option>
                <?php
                    }
                  ?>
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
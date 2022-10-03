<?php 

	if (isset($_POST['simpan'])) {

        $nip = $_POST['nip'];
        $nama_atasan = $_POST['nama_atasan'];
        $jabatan = $_POST['jabatan'];
        $bidang = $_POST['bidang'];
    

		$sql = "insert into atasan values(null, '$nip', '$nama_atasan', '$jabatan', '$bidang')";
		$query = mysqli_query($con, $sql);
		if ($query) {
			echo "<script>alert('Data berhasil ditambahkan!');window.location.href='detail_index.php?p=atasan'</script>";
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
          <h3 class="box-title">Form Data Atasan</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">NIP</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan NIP" name="nip" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Atasan</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama" name="nama_atasan" required>
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
                <option selected disabled>-- Pilih Level --</option>
                <option value="Divisi Sistem Informasi">Divisi Sistem Informasi</option>
                <option value="Divisi Pemasaran">Divisi Pemasaran</option>
                <option value="Divisi Sumber Daya Manusia">Divisi Sumber Daya Manusia</option>
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
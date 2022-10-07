<?php 

	if (isset($_POST['simpan'])) {

        $tahun = $_POST['tahun'];
        $kegiatan_tahunan = $_POST['kegiatan_tahunan'];
        $target_kuantitas = $_POST['target_kuantitas'];
        $satuan_kuantitas = $_POST['satuan_kuantitas'];
        $target_kualitas = $_POST['target_kualitas'];
        $target_waktu = $_POST['target_waktu'];
        $periode_awal = $_POST['periode_awal'];
        $periode_akhir = $_POST['periode_akhir'];
        $biaya = $_POST['biaya'];
    

		$sql = "insert into skptahunan values(null, '$tahun', '$kegiatan_tahunan', '$target_kuantitas', '$satuan_kuantitas', '$target_kualitas', '$target_waktu', '$periode_awal', '$periode_akhir', '$biaya', '')";
		$query = mysqli_query($con, $sql);
		if ($query) {
			echo "<script>alert('Data berhasil ditambahkan!');window.location.href='detail_index.php?p=skptahunan'</script>";
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
          <h3 class="box-title">Form Data SKP Tahunan</h3> 
          <span class="pull-right"><a class="btn btn-danger" href="detail_index.php?p=atasan" role="button"><span class="fa fa-arrow-circle-o-left"></span> Kembali</a></span>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Tahun</label>
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
                <option selected disabled>-- Pilih Bidang --</option>
                <option value="Divisi Sistem Informasi">Divisi Sistem Informasi</option>
                <option value="Divisi Pemasaran">Divisi Pemasaran</option>
                <option value="Divisi Sumber Daya Manusia">Divisi Sumber Daya Manusia</option>
              </select>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <!-- <a class="btn btn-danger" href="detail_index.php?p=atasan" role="button">Kembali</a> -->
            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.box -->


    </div>
    <!--/.col (left) -->
    
  </div>
  <!-- /.row -->
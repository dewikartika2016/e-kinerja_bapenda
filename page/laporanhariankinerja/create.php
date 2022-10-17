<?php 

	if (isset($_POST['simpan'])) {

        $tanggal = $_POST['tanggal'];
        $kegiatan_harian= $_POST['kegiatan_harian'];
        $id_skp_bulanan = $_POST['id_skp_bulanan'];
        $kuantitas = $_POST['kuantitas'];
        $satuan_kuantitas = $_POST['satuan_kuantitas'];
    

		$sql = "insert into laporan_harian values(null, '$tanggal', '$kegiatan_harian', '$id_skp_bulanan', '$kuantitas', '$satuan_kuantitas', 'Belum Disetujui')";
		$query = mysqli_query($con, $sql);
		if ($query) {
			echo "<script>alert('Data berhasil ditambahkan!');window.location.href='detail_index.php?p=laporanhariankinerja'</script>";
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
          <h3 class="box-title">Form Data Laporan harian</h3> 
          <span class="pull-right"><a class="btn btn-danger" href="detail_index.php?p=laporanhariankinerja" role="button"><span class="fa fa-arrow-circle-o-left"></span> Kembali</a></span>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post">
          <div class="box-body">
          <div class="form-group">
              <label for="exampleInputEmail1">Tanggal</label>
              <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Pilih Tanggal" name="tanggal" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Kegiatan Harian</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Kegiatan Harian" name="kegiatan_harian" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">SKP Bulanan</label>
              <select name="id_skp_bulanan" class="form-control">
                <option selected disabled>-- Pilih SKP Bulanan --</option>
                <?php
                  $skp_bulanan = mysqli_query($con,"SELECT * FROM skp_bulanan");
						      while ($data=mysqli_fetch_array($skp_bulanan)) {
				      	?>
                    <option value="<?php echo $data['id_skp_bulanan']; ?>">
                    <?php echo $data['kegiatan_bulanan']; ?> </option>
                <?php
                    }
                  ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Kuantitas</label>
              <div class="row">
              <div class="col-6 col-sm-6">
              <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan Kuantitas" name="kuantitas" required>
              </div>
              <div class="col-6 col-sm-6">
              <select name="satuan_kuantitas" class="form-control">
                <option selected disabled>-- Pilih Satuan Kuantitas --</option>
                <option value="Dokumen">Dokumen</option>
                <option value="Surat">Surat</option>
                <option value="Majalah">Majalah</option>
                <option value="Data">Data</option>
              </select>
              </div></div>
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
<?php 

	if (isset($_POST['simpan'])) {

        $tahun = $_POST['tahun'];
        $bulan = $_POST['bulan'];
        $id_skp_tahunan = $_POST['id_skp_tahunan'];
        $kegiatan_bulanan= $_POST['kegiatan_bulanan'];
        $target_kuantitas = $_POST['target_kuantitas'];
        $satuan_kuantitas = $_POST['satuan_kuantitas'];
        $target_waktu = $_POST['target_waktu'];
        $biaya = $_POST['biaya'];
    

		$sql = "insert into skp_bulanan values(null, '$tahun', '$bulan', '$id_skp_tahunan', '$kegiatan_bulanan', '$target_kuantitas', '$satuan_kuantitas', '$target_waktu', '$biaya', 'Belum Disetujui')";
		$query = mysqli_query($con, $sql);
		if ($query) {
			echo "<script>alert('Data berhasil ditambahkan!');window.location.href='detail_index.php?p=skpbulanan'</script>";
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
          <h3 class="box-title">Form Data SKP Bulanan</h3> 
          <span class="pull-right"><a class="btn btn-danger" href="detail_index.php?p=skpbulanan" role="button"><span class="fa fa-arrow-circle-o-left"></span> Kembali</a></span>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post">
          <div class="box-body">
          <div class="form-group">
              <label for="exampleInputEmail1">Tahun</label>
              <select name="tahun" class="form-control">
                <option selected disabled>-- Pilih Tahun --</option>
                <?php
                  $skp_tahunan = mysqli_query($con,"SELECT * FROM skp_tahunan");
						      while ($data=mysqli_fetch_array($skp_tahunan)) {
				      	?>
                    <option value="<?php echo $data['tahun']; ?>">
                    <?php echo $data['tahun']; ?> ( <?php echo date("d M Y", strtotime($data['periode_awal'])); ?> - <?php echo date("d M Y", strtotime($data['periode_akhir'])); ?> )</option>
                <?php
                    }
                  ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Bulan</label>
              <select name="bulan" class="form-control">
                <option selected disabled>-- Pilih Bulan--</option>
                <option value="Januari">Januari</option>
                <option value="Februari">Februari</option>
                <option value="Maret">Maret</option>
                <option value="April">April</option>
                <option value="Mei">Mei</option>
                <option value="Juni">Juni</option>
                <option value="Juli">Juli</option>
                <option value="Agustus">Agustus</option>
                <option value="September">September</option>
                <option value="Oktober">Oktober</option>
                <option value="November">November</option>
                <option value="Desember">Desember</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">SKP Tahunan</label>
              <select name="id_skp_tahunan" class="form-control">
                <option selected disabled>-- Pilih SKP Tahunan --</option>
                <?php
                  $skp_tahunan = mysqli_query($con,"SELECT * FROM skp_tahunan");
						      while ($data=mysqli_fetch_array($skp_tahunan)) {
				      	?>
                    <option value="<?php echo $data['id_skp_tahunan']; ?>">
                    <?php echo $data['kegiatan_tahunan']; ?> </option>
                <?php
                    }
                  ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Kegiatan Bulanan</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Kegiatan Bulanan" name="kegiatan_bulanan" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Target Kuantitas</label>
              <div class="row">
              <div class="col-6 col-sm-6">
              <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan Target Kuantitas" name="target_kuantitas" required>
              </div>
              <div class="col-6 col-sm-6">
              <select name="satuan_kuantitas" class="form-control">
                <option selected disabled>-- Pilih Satuan Kuantitas --</option>
                <option value="Dokumen">Dokumen</option>
                <option value="Surat">Surat</option>
                <option value="Majalah">Majalah</option>
              </select>
              </div></div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Target Waktu</label>
              <div class="row">
              <div class="col-6 col-sm-6">
              <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan Target Waktu" name="target_waktu" required> 
              </div>
              <div class="col justify-content-center">
                </br>
              Hari
            </div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Biaya</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Biaya" name="biaya" required>
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
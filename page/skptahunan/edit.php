<?php 

    $id_skp_tahunan = $_GET['id_skp_tahunan'];
    $sql = "select * from skp_tahunan where id_skp_tahunan='$id_skp_tahunan'";
    $query = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($query);


  if (isset($_POST['simpan'])) {

    $tahun = $_POST['tahun'];
    $kegiatan_tahunan = $_POST['kegiatan_tahunan'];
    $target_kuantitas = $_POST['target_kuantitas'];
    $satuan_kuantitas = $_POST['satuan_kuantitas'];
    $target_waktu = $_POST['target_waktu'];
    $periode_awal = $_POST['periode_awal'];
    $periode_akhir = $_POST['periode_akhir'];
    $biaya = $_POST['biaya'];
    // $peran = $_POST['peran'];

    $sql = "update skp_tahunan set tahun='$tahun', kegiatan_tahunan='$kegiatan_tahunan', target_kuantitas='$target_kuantitas', satuan_kuantitas='$satuan_kuantitas', target_waktu='$target_waktu', periode_awal='$periode_awal', periode_akhir='$periode_akhir', biaya='$biaya' where id_skp_tahunan='$id_skp_tahunan'";
    $query = mysqli_query($con, $sql);
    if ($query) {
      echo "<script>alert('Data berhasil diubah!');window.location.href='detail_index.php?p=skp_tahunan'</script>";
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
          <span class="pull-right"><a class="btn btn-danger" href="detail_index.php?p=user" role="button"><span class="fa fa-arrow-circle-o-left"></span> Kembali</a></span>
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
                  for($i=date('Y'); $i>=date('Y')-5; $i-=1){
                  echo"<option value='$i'> $i </option>";
                  }
                  ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Kegiatan Tahunan</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Kegiatan Tahunan" name="kegiatan_tahunan" required value="<?= $data['nama'] ?>>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Target Kuantitas</label>
              <div class="row">
              <div class="col-6 col-sm-6">
              <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan Target Kuantitas" name="target_kuantitas" required value="<?= $data['nama'] ?>>
              </div>
              <div class="col-6 col-sm-6">
              <select name="satuan_kuantitas" class="form-control">
                <option selected disabled>-- Pilih Satuan Kuantitas --</option>
                <option value="Dokumen" <?= ($data['level']=='admin')?'selected':'' ?>>Dokumen</option>
                <option value="Surat" <?= ($data['level']=='admin')?'selected':'' ?>>Surat</option>
                <option value="Majalah" <?= ($data['level']=='admin')?'selected':'' ?>>Majalah</option>
              </select>
              </div></div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Target Waktu</label>
              <div class="row">
              <div class="col-6 col-sm-6">
              <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan Target Waktu" name="target_waktu" required value="<?= $data['nama'] ?>> 
              </div>
              <div class="col justify-content-center">
                </br>
              Bulan
            </div>
              </div>
            </div>
            <div class="form-group">
            <div class="row">  
              <div class="col-6 col-sm-6">
              <label for="exampleInputEmail1">Dari Tanggal/Bulan/Tahun</label>
              </div>
              <div class="col-6 col-sm-6">
              <label for="exampleInputEmail1">Sampai Tanggal/Bulan/Tahun</label>
              </div>
            </div>
            <div class="row">  
              <div class="col-6 col-sm-6">
              <input type="date" class="form-control" id="exampleInputEmail1" name="periode_awal" required>
              </div>
              <div class="col-6 col-sm-6">
              <input type="date" class="form-control" id="exampleInputEmail1" name="periode_akhir" required>
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
            <!-- <a class="btn btn-danger" href="detail_index.php?p=user" role="button">Kembali</a> -->
            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.box -->


    </div>
    <!--/.col (left) -->
    
  </div>
  <!-- /.row -->
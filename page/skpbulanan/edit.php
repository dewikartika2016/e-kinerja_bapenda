<?php 
    $id_skp_bulanan = $_GET['id_skp_bulanan'];
    $sql = "SELECT * from skp_bulanan where id_skp_bulanan='$id_skp_bulanan'";
    $query = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($query);
	
    if (isset($_POST['simpan'])) {
        $tahun = $_POST['tahun'];
        $bulan = $_POST['bulan'];
        $id_skp_tahunan = $_POST['id_skp_tahunan'];
        $kegiatan_bulanan= $_POST['kegiatan_bulanan'];
        $target_kuantitas = $_POST['target_kuantitas'];
        $satuan_kuantitas = $_POST['satuan_kuantitas'];
        $target_waktu = $_POST['target_waktu'];
        $biaya = $_POST['biaya'];

		$sql = "UPDATE skp_bulanan SET tahun='$tahun', bulan='$bulan', id_skp_tahunan='$id_skp_tahunan', kegiatan_bulanan='$kegiatan_bulanan', target_kuantitas='$target_kuantitas', satuan_kuantitas='$satuan_kuantitas', target_waktu='$target_waktu', biaya='$biaya' WHERE id_skp_bulanan='$id_skp_bulanan'";
		$query = mysqli_query($con, $sql);
		if ($query) {
			echo "<script>alert('Data berhasil diubah!');window.location.href='detail_index.php?p=skpbulanan'</script>";
		} else {
			echo "Error : " . mysqli_error($con);
		}
    }
 ?>

<?php
$id_skp_bulanan = $_GET['id_skp_bulanan'];

$result = mysqli_query($con, "SELECT * FROM skp_bulanan WHERE id_skp_bulanan='$id_skp_bulanan'") or die (mysqli_error($con));
while($skp_bulanan = mysqli_fetch_array($result))
{
    $tahun = $skp_bulanan['tahun'];
    $bulan = $skp_bulanan['bulan'];
    $id_skp_tahunan = $skp_bulanan['id_skp_tahunan'];
    $kegiatan_bulanan= $skp_bulanan['kegiatan_bulanan'];
    $target_kuantitas = $skp_bulanan['target_kuantitas'];
    $satuan_kuantitas = $skp_bulanan['satuan_kuantitas'];
    $target_waktu = $skp_bulanan['target_waktu'];
    $biaya = $skp_bulanan['biaya'];
}
    // $atasan = mysqli_query($con,"SELECT * FROM atasan");
    // $unit_kerja = mysqli_query($con,"SELECT * FROM unit_kerja");
    // $jabatan = mysqli_query($con,"SELECT * FROM jabatan");
    $skp_tahunan = mysqli_query($con,"SELECT * FROM skp_tahunan");
?>

<div class="row">
    <!-- left column -->
    <div class="col-md-8">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Target SKP Bulanan</h3> 
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
                <option value="Januari" <?=($data['bulan']=='Januari')?'selected':'' ?>>Januari</option>
                <option value="Februari" <?=($data['bulan']=='Februari')?'selected':'' ?>>Februari</option>
                <option value="Maret" <?=($data['bulan']=='Maret')?'selected':'' ?>>Maret</option>
                <option value="April" <?=($data['bulan']=='April')?'selected':'' ?>>April</option>
                <option value="Mei" <?=($data['bulan']=='Mei')?'selected':'' ?>>Mei</option>
                <option value="Juni" <?=($data['bulan']=='Juni')?'selected':'' ?>>Juni</option>
                <option value="Juli" <?=($data['bulan']=='Juli')?'selected':'' ?>>Juli</option>
                <option value="Agustus" <?=($data['bulan']=='Agustus')?'selected':'' ?>>Agustus</option>
                <option value="September" <?=($data['bulan']=='September')?'selected':'' ?>>September</option>
                <option value="Oktober" <?=($data['bulan']=='Oktober')?'selected':'' ?>>Oktober</option>
                <option value="November" <?=($data['bulan']=='November')?'selected':'' ?>>November</option>
                <option value="Desember" <?=($data['bulan']=='Desember')?'selected':'' ?>>Desember</option>
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
                    <option value="<?php echo $data['id_skp_tahunan']; ?>" 
                        <?php if($id_skp_tahunan==$data['id_skp_tahunan']) echo 'selected="selected"'; ?>>
                        <?php echo $data['kegiatan_tahunan']; ?> </option>
                <?php
                    }
                  ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Kegiatan Bulanan</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Kegiatan Bulanan" name="kegiatan_bulanan" required value="<?= $data['kegiatan_bulanan']?>">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Target Kuantitas</label>
              <div class="row">
              <div class="col-6 col-sm-6">
              <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan Target Kuantitas" name="target_kuantitas" required value="<?= $data['target_kuantitas'] ?>">
              </div>
              <div class="col-6 col-sm-6">
              <select name="satuan_kuantitas" class="form-control">
                <option selected disabled>-- Pilih Satuan Kuantitas --</option>
                <option value="Dokumen" <?=($data['satuan_kuantitas']=='Dokumen')?'selected':'' ?>>Dokumen</option>
                <option value="Surat" <?=($data['satuan_kuantitas']=='Surat')?'selected':'' ?>>Surat</option>
                <option value="Majalah" <?=($data['satuan_kuantitas']=='Majalah')?'selected':'' ?>>Majalah</option>
              </select>
              </div></div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Target Waktu</label>
              <div class="row">
              <div class="col-6 col-sm-6">
              <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan Target Waktu" name="target_waktu" required value="<?= $data['target_waktu'] ?>"> 
              </div>
              <div class="col justify-content-center">
                </br>
              Hari
            </div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Biaya</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Biaya" name="biaya" required value="<?= $data['biaya'] ?>">
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
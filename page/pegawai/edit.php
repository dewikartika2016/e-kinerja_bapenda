<?php 

    $id_pegawai = $_GET['id_pegawai'];
    $sql = "select * from pegawai where id_pegawai='$id_pegawai'";
    $query = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($query);


  if (isset($_POST['simpan'])) {

    $nama_pegawai = $_POST['nama_pegawai'];
    $jabatan = $_POST['jabatan'];
    $bidang = $_POST['bidang'];
    $id_atasan = $_POST['id_atasan'];

    $sql = "update pegawai set nama_pegawai='$nama_pegawai', jabatan='$jabatan', bidang='$bidang', id_atasan='$id_atasan' where id_pegawai='$id_pegawai'";
    $query = mysqli_query($con, $sql);
    if ($query) {
      echo "<script>alert('Data Pegawai Berhasil Diubah!');window.location.href='detail_index.php?p=pegawai'</script>";
    } else {
      echo "Error : " . mysqli_error($con);
    }
  }
 ?>

<?php
$id_pegawai = $_GET['id_pegawai'];

$result = mysqli_query($con, "SELECT * FROM pegawai WHERE id_pegawai='$id_pegawai'") or die (mysqli_error($con));
while($data_pegawai = mysqli_fetch_array($result))
{
        $id_pegawai= $data_pegawai['id_pegawai'];
        $nama_pegawai = $data_pegawai['nama_pegawai'];
        $jabatan = $data_pegawai['jabatan'];
        $bidang = $data_pegawai['bidang'];
        $id_atasan = $data_pegawai['id_atasan'];
}
	$atasan = mysqli_query($con,"SELECT * FROM atasan");
?>

<div class="row">
    <!-- left column -->
    <div class="col-md-8">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Pegawai</h3>
          <span class="pull-right"><a class="btn btn-danger" href="detail_index.php?p=pegawai" role="button"><span class="fa fa-arrow-circle-o-left"></span> Kembali</a></span>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Pegawai</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama Pegawai" name="nama_pegawai" required value="<?= $data['nama_pegawai'] ?>">
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
                <option value="Divisi Sistem Informasi" <?= ($data['bidang']=='Divisi Sistem Informasi')?'selected':'' ?>>Divisi Sistem Informasi</option>
                <option value="Divisi Pemasaran" <?= ($data['bidang']=='Divisi Pemasaran')?'selected':'' ?>>Divisi Pemasaran</option>
                <option value="Divisi Sumber Daya Manusia" <?= ($data['bidang']=='Divisi Sumber Daya Manusia')?'selected':'' ?>>Divisi Sumber Daya Manusia</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Atasan</label>
              <select name="id_atasan" class="form-control custom-select">
                <option selected disabled>-- Pilih Atasan --</option>
                <?php
					while ($data=mysqli_fetch_array($atasan)) {
				?>
                    <option value="<?php echo $data['id_atasan']; ?>"
                        <?php if($id_atasan==$data['id_atasan']) echo 'selected="selected"'; ?>>
                        <?php echo $data['nama_atasan']; ?></option>
                <?php
                    }
                  ?>
              </select>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <!-- <a class="btn btn-danger" href="detail_index.php?p=pegawai" role="button">Kembali</a> -->
            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.box -->


    </div>
    <!--/.col (left) -->
    
  </div>
  <!-- /.row -->
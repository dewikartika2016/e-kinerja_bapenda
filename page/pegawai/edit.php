<?php 

    $id_pegawai = $_GET['id_pegawai'];
    $sql = "select * from pegawai where id_pegawai='$id_pegawai'";
    $query = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($query);


  if (isset($_POST['simpan'])) {

    $nama_pegawai = $_POST['nama_pegawai'];
    $id_unit_kerja = $_POST['id_unit_kerja'];
    $id_jabatan = $_POST['id_jabatan'];
    $id_atasan = $_POST['id_atasan'];

    $sql = "update pegawai set nama_pegawai='$nama_pegawai', id_unit_kerja='$id_unit_kerja', id_jabatan='$id_jabatan', id_atasan='$id_atasan' where id_pegawai='$id_pegawai'";
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
        $id_unit_kerja = $data_pegawai['id_unit_kerja'];
        $id_jabatan = $data_pegawai['id_jabatan'];
        $id_atasan = $data_pegawai['id_atasan'];
}
	$atasan = mysqli_query($con,"SELECT * FROM atasan");
  $unit_kerja = mysqli_query($con,"SELECT * FROM unit_kerja");
  $jabatan = mysqli_query($con,"SELECT * FROM jabatan");
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
              <label for="exampleInputEmail1">Unit Kerja</label>
              <select name="id_unit_kerja" class="form-control custom-select">
                <option disabled>-- Pilih Unit Kerja--</option>
                <?php
					        while ($data=mysqli_fetch_array($unit_kerja)) {
				        ?>
                    <option value="<?php echo $data['id_unit_kerja']; ?>"
                        <?php if($id_atasan==$data['id_unit_kerja']) echo 'selected="selected"'; ?>>
                        <?php echo $data['unit_kerja']; ?></option>
                <?php
                    }
                  ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Jabatan</label>
              <select name="id_jabatan" class="form-control custom-select">
                <option disabled>-- Pilih Jabatan --</option>
                <?php
					        while ($data=mysqli_fetch_array($jabatan)) {
				        ?>
                    <option value="<?php echo $data['id_jabatan']; ?>"
                        <?php if($id_atasan==$data['id_jabatan']) echo 'selected="selected"'; ?>>
                        <?php echo $data['jabatan']; ?></option>
                <?php
                    }
                  ?>
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
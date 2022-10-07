<?php 

	$id_atasan = $_GET['id_atasan'];
  $sql = "select * from atasan where id_atasan='$id_atasan'";
  $query = mysqli_query($con, $sql);
  $data = mysqli_fetch_array($query);

  if (isset($_POST['simpan'])) {

    $nip = $_POST['nip'];
    $nama_atasan = $_POST['nama_atasan'];
    $id_unit_kerja = $_POST['id_unit_kerja'];
    $id_jabatan = $_POST['id_jabatan'];

    $sql = "update atasan set nip='$nip', nama_atasan='$nama_atasan', id_unit_kerja='$id_unit_kerja', id_jabatan='$id_jabatan' where id_atasan='$id_atasan'";
    $query = mysqli_query($con, $sql);
    if ($query) {
      echo "<script>alert('Data Atasan Berhasil Diubah!');window.location.href='detail_index.php?p=atasan'</script>";
    } else {
      echo "Error : " . mysqli_error($con);
    }

  }
  
 ?>

<?php
$id_atasan = $_GET['id_atasan'];

$result = mysqli_query($con, "SELECT * FROM atasan WHERE id_atasan='$id_atasan'") or die (mysqli_error($con));
while($data_atasan = mysqli_fetch_array($result))
{
        $id_atasan= $data_atasan['id_atasan'];
        $nip = $data_atasan['nip'];
        $nama_atasan = $data_atasan['nama_atasan'];
        $id_unit_kerja = $data_atasan['id_unit_kerja'];
        $id_jabatan = $data_atasan['id_jabatan'];
}
  $unit_kerja = mysqli_query($con,"SELECT * FROM unit_kerja");
  $jabatan = mysqli_query($con,"SELECT * FROM jabatan");
?>


<div class="row">
    <!-- left column -->
    <div class="col-md-8">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Atasan</h3> 
          <span class="pull-right"><a class="btn btn-danger" href="detail_index.php?p=atasan" role="button"><span class="fa fa-arrow-circle-o-left"></span> Kembali</a></span>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">NIP</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="<?= $data['nip'] ?>" name="nip" required value ="<?= $data['nip'] ?> ">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Atasan</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama Atasan" name="nama_atasan" required value="<?= $data['nama_atasan'] ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Unit Kerja</label>
              <select name="id_unit_kerja" class="form-control custom-select">
                <option disabled>-- Pilih Unit Kerja--</option>
                <?php
					        while ($data=mysqli_fetch_array($unit_kerja)) {
				        ?>
                    <option value="<?php echo $data['id_unit_kerja']; ?>"
                        <?php if($id_unit_kerja==$data['id_unit_kerja']) echo 'selected="selected"'; ?>>
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
                        <?php if($id_jabatan==$data['id_jabatan']) echo 'selected="selected"'; ?>>
                        <?php echo $data['jabatan']; ?></option>
                <?php
                    }
                  ?>
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
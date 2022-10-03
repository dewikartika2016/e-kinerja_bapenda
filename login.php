<?php 

  @session_start();
  include 'config/connection.php';
 error_reporting(0);
  if (isset($_POST['sigin'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "select * from users where username='$user' and password='$pass'";
    $query = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($query);
    $row = mysqli_num_rows($query);
    if ($row > 0) {
      if ($data['level']=='admin') {
        $_SESSION['logged'] = 1;
      }elseif ($data['level']=='pegawai') {
        $_SESSION['logged'] = 2;
      }elseif ($data['level']=='atasan') {
        $_SESSION['logged'] = 3;
      }else{
        $_SESSION['logged'] = null;
      }
      //$_SESSION['logged'] = 1;
      $_SESSION['id'] = $data['id'];
      $_SESSION['name'] = $data['nama'];
      
      // echo "<script>'contoh()';window.location.href='index.php'</script>";
      echo "<script>alert('Login berhasil!');window.location.href='index.php'</script>";  
    } else {
      echo "<script>alert('Username atau Password Salah')</script>";
    }
  //    else {

  //   $sql = "select * from karyawan where username='$user' and password='$pass'";
  //   $query = mysqli_query($con, $sql);
  //   $data = mysqli_fetch_assoc($query);
  //   $row = mysqli_num_rows($query);
  //   if ($row > 0) {
  //     $_SESSION['logged'] = 2;
  //     $_SESSION['id_user'] = $data['NIP'];
  //     $_SESSION['name'] = $data['nama_karyawan'];
      
  //     echo "<script>alert('Login berhasil!');window.location.href='index.php'</script>";  
  //   } else {
  //       echo "<script>alert('Username atau Password salah!')</script>";
  //   }
  // }
}

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laporan Kerja Harian</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
  <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">

  <!-- /.login-logo -->
  <div class="login-box-body">
    <div class="login-logo">
    <!-- <a href="../../index2.html"><b>Fuzzy</b>AHP</a> -->
    <img src="assets/img/logo.png" width="300px">
  </div>
    <p class="login-box-msg">Sign in to start your session</p>

    <form method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="sigin">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- <div class="alert alert-danger" role="alert">Username atau password salah</div> -->
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- <script type="text/javascript">
        function contoh() {
           swal({
                title: "Berhasil!",
                text: "Pop-up berhasil ditampilkan",
                icon: "success",
                button: true
            });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script> -->

<!-- jQuery 2.2.3 -->
<script src="assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>

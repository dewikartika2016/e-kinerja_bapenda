<?php 

	@session_start();
  error_reporting(0);
	include 'config/connection.php';

	// if (@$_SESSION['logged'] == false) {
	// 	header('Location:login.php');
	// }

  if (isset($_GET['logout'])) {
    session_destroy();
    header('Location:index.php');
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
  
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
  <!--charts js-->
  <script src="https://www.chartjs.org/dist/2.8.0/Chart.min.js"></script>
  <script src="https://www.chartjs.org/samples/latest/utils.js"></script>
  
  <style type="text/css">
    body{

    }
    .atas{
      color: white;
    }

    /*footer{
      margin-top: -100px;
      width: 100%;
      position: relative;
    }*/
    .wrapper{
      height: 90%;
    }
  </style>
  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="atas">
      <div class="row">
        <div class="col-lg-12">
          <img src="assets/img/logo.png" height="100px" style="margin: 20px;">
        </div>
      </div>
    </div>
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="detail_index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">BPD</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Kinerja Pegawai</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <?php if (@$_SESSION['logged'] == 1): ?>
            <!-- <li><a class="dropdown-item" href="?p=karyawan">Data Pengguna</a></li> -->
          <!-- <li><a class="dropdown-item" href="?p=alternatif">Penilaian karyawan</a></li> -->
         <!--  <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="dropdownMenu">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRN9igcyo_jp2dYcTSY3qY-o-CY7u4Unb3yWtDJjS5Udj0uBswAZg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $_SESSION['name'] ?></span>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu" style="width: 100px">

              <a class="dropdown-item" href="#" style="margin: 10px;font-size: 20px">Identitas</a>
              <br>
              <a class="dropdown-item pull-right" href="?logout" style="color: red;margin: 10px;font-size: 20px"><i class="fa fa-circle-o text-red"></i> Logout</a>
              
              
              
            </div>
          </li> -->

          <?php endif ?>
          <?php if (@$_SESSION['logged'] == null):?>
            <li class="dropdown user user-menu">
            <a href="login.php" >
              <span class="hidden-xs">Login</span>
            </a>
          </li>
          <?php endif ?>
          <?php if (@$_SESSION['logged'] == 3 || @$_SESSION['logged'] == 2 || @$_SESSION['logged'] == 1): ?>
          <!-- <li><a class="dropdown-item" href="?p=alternatif">Penilaian karyawan</a></li> -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="dropdownMenu">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRN9igcyo_jp2dYcTSY3qY-o-CY7u4Unb3yWtDJjS5Udj0uBswAZg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $_SESSION['name'] ?></span>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu" style="width: 100px">

              <!-- <a class="dropdown-item" href="#" style="margin: 10px;font-size: 20px">Identitas</a>
              <br> -->
              <a class="dropdown-item pull-right" href="?logout" style="color: red;margin: 10px;font-size: 20px"><i class="fa fa-sign-out text-red"></i> Logout</a>
              
            </div>
          </li>
          <?php endif ?>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?= (@$_GET['p']=='')?'active':'' ?>">
          <a href="detail_index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        
        <?php if (@$_SESSION['logged'] == 1): ?>
          <li class="treeview <?= (@$_GET['p']=='user')?'active':'' ?>">
            <a href="?p=user">
              <i class="fa fa-users"></i> <span>Kelola Data User</span>
            </a>
          </li>
          <li class="treeview <?= (@$_GET['p']=='atasan')?'active':'' ?>">
            <a href="?p=atasan">
              <i class="fa fa-user"></i> <span>Kelola Data Atasan</span>
            </a>
          </li>
          <li class="treeview <?= (@$_GET['p']=='pegawai')?'active':'' ?>">
            <a href="?p=pegawai">
              <i class="fa fa-user"></i> <span>Kelola Data Pegawai</span>
            </a>
          </li>
        <?php endif; ?>

        <?php if (@$_SESSION['logged'] == 2): ?>
          <li class="<?= (@$_GET['p']=='skptahunan')?'active':'' ?>">
            <a href="?p=skptahunan">
              <i class="fa fa-list"></i> <span>SKP Tahunan</span>
            </a>
          </li>
          <li class="<?= (@$_GET['p']=='skpbulanan')?'active':'' ?>">
            <a href="?p=skpbulanan">
              <i class="fa fa-list"></i> <span>SKP Bulanan</span>
            </a>
          </li>
          <li class="<?= (@$_GET['p']=='laporan')?'active':'' ?>">
            <a href="?p=laporan">
              <i class="fa fa-list"></i> <span>Laporan Kerja Harian</span>
            </a>
          </li>
          <li class="<?= (@$_GET['p']=='profile')?'active':'' ?>">
            <a href="?p=profile">
              <i class="fa fa-list"></i> <span>Edit Profile</span>
            </a>
          </li>
        <?php endif; ?>

        <?php if (@$_SESSION['logged'] == 3): ?>
          <!-- </li>
          <li class="<?= (@$_GET['p']=='LaporanHarian')?'active':'' ?>">
            <a href="?p=LaporanHarian">
              <i class="fa fa-list"></i> <span>Laporan Kerja Harian</span>
            </a>
          </li> -->
          <li class="<?= (@$_GET['p']=='skptahunan_bawahan')?'active':'' ?>">
            <a href="?p=skptahunan_bawahan">
              <i class="fa fa-list"></i> <span>SKP Tahunan Bawahan</span>
            </a>
            <li class="<?= (@$_GET['p']=='skpbulanan_bawahan')?'active':'' ?>">
            <a href="?p=skpbulanan_bawahan">
              <i class="fa fa-list"></i> <span>SKP Bulanan Bawahan</span>
            </a>
        <?php endif; ?>
        
        <?php if (@$_SESSION['logged'] == true): ?>
          <li class="header">OTHER</li>
          <li><a href="?logout"><i class="fa fa-sign-out text-red"></i> <span>Logout</span></a></li>
        <?php endif; ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        
        <?php 

          $page = @$_GET['p'];
          $action = @$_GET['act'];

          switch ($page) {
            case 'user':
              if ($action == "create") {
                include 'page/user/create.php';
              } else if ($action == "edit") {
                include 'page/user/edit.php';
              } else {
                include 'page/user/index.php';
              }
              break;

              case 'atasan':
                if ($action == "create") {
                  include 'page/atasan/create.php';
                } else if ($action == "edit") {
                  include 'page/atasan/edit.php';
                } else {
                  include 'page/atasan/index.php';
                }
                break;

                case 'pegawai':
                  if ($action == "create") {
                    include 'page/pegawai/create.php';
                  } else if ($action == "edit") {
                    include 'page/pegawai/edit.php';
                  } else {
                    include 'page/pegawai/index.php';
                  }
                  break;
  
            case 'skptahunan':
              if ($action == "create") {
                include 'page/skptahunan/create.php';
              } else if ($action == "edit") {
                include 'page/skptahunan/edit.php';
              } else {
                include 'page/skptahunan/index.php';
              }
              break;

              case 'skpbulanan':
                if ($action == "create") {
                  include 'page/skpbulanan/create.php';
                } else if ($action == "edit") {
                  include 'page/skpbulanan/edit.php';
                } else {
                  include 'page/skpbulanan/index.php';
                }
                break;

            case 'create_skor':
              if ($action == "edit") {
                include 'page/pemberiannilai/edit.php';
              } else {
                include 'page/pemberiannilai/create.php';
              }
              break;

            case 'karyawan':
              if ($action == "create") {
                include 'page/karyawan/create.php';
              }else if ($action == "edit") {
                include 'page/karyawan/edit.php';
              }else if ($action == "upload") {
                include 'page/karyawan/upload.php';
              } else {
                include 'page/karyawan/index.php';
              }
              break;

            case 'periode':
              if ($action == "create") {
                include 'page/periode/create.php';
              }else if ($action == "edit") {
                include 'page/periode/edit.php';
              }else{
                include 'page/periode/index.php';
              }
              break;

            case 'jabatan':
              if ($action == "create") {
                include 'page/jabatan/create.php';
              }else if ($action == "edit") {
                include 'page/jabatan/edit.php';
              }else{
                include 'page/jabatan/index.php';
              }
              break;

              case 'skptahunan_bawahan':
                if ($action == "create") {
                  include 'page/skptahunan_bawahan/create.php';
                }else if ($action == "edit") {
                  include 'page/skptahunan_bawahan/edit.php';
                }else{
                  include 'page/skptahunan_bawahan/index.php';
                }
                break;

                case 'skpbulanan_bawahan':
                  if ($action == "create") {
                    include 'page/skpbulanan__bawahan/create.php';
                  }else if ($action == "edit") {
                    include 'page/skpbulanan__bawahan/edit.php';
                  }else{
                    include 'page/skpbulanan__bawahan/index.php';
                  }
                  break;

            case 'bobot':
              include 'page/bobot/index.php';
              break;
            
            case 'TRUNCATE':
              include 'page/pus/del.php';
              break;
             case 'apus-import':
              include 'page/pus/imp.php';
              break;
            

            case 'alternatif':
              if(@$_GET['d']!="")
                include 'page/alternatif/index.php';
              else
                //include 'page/alternatif/pilihstatus.php';
                include 'page/alternatif/index.php';
              break;

            case 'report':
              include 'page/laporan/index.php';
              break;

            case 'rank':
              include 'page/peringkat/index.php';
              break;  

            case 'fuzzy':
              include 'page/fuzzy/index.php';
              break; 

            case 'fuzzy-upload':
              include 'page/fuzzy/upload.php';   
              break;        
            
            default:
              include 'page/dashboard.php';
              break;
          }

         ?>      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
</div>
<!-- ./wrapper -->
 <!--  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2019 <a href="https://github.com/pottsed">Pottsed</a>.</strong> All rights
    reserved.
  </footer> -->

<!-- jQuery 2.2.3 -->
<script src="assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

</body>
</html>

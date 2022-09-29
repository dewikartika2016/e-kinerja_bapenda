	<style type="text/css">
   .home{
    margin:5px;
    padding: 10px;
     background: #DDD;
      color: #111;
      border-left: blue solid 5px;
      font-weight:35px;
   } 
  </style>
	<?php if (@$_SESSION['logged'] == 1 or @$_SESSION['logged'] == 2): ?>
		
        <div class="callout-infout callout-info home">
          <h4>Selamat datang <?= $_SESSION['name'] ?></h4>

          <p>Sistem Laporan Kerja Harian Pegawai Non-ASN <b>Badan Pendapatan Daerah Sumatera Barat</b></p>
        </div>
    <?php else: ?>

		<div class="callout-infout callout-info home">
          <h4>Selamat datang</h4>

         <p>Sistem Laporan Kerja Harian Pegawai Non-ASN 
          <b>Badan Pendapatan Daerah Sumatera Barat</b></p>
        </div>
    <?php endif; ?>

        
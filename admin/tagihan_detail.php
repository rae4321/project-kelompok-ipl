<?php  
session_start();
require_once "../config/koneksi.php";
if(!isset($_SESSION['admin'])){
  header("Location: login.php");
}
$adminId = $_SESSION['admin'];
$resPanitia = mysqli_query($conn, "SELECT * FROM admin WHERE id='$adminId'");
$rowPanitia = mysqli_fetch_assoc($resPanitia);
$siswaId = $_GET['id'];
$resData = mysqli_query($conn, "SELECT * FROM tagihan INNER JOIN rumah ON tagihan.rumah_id = rumah.id INNER JOIN user ON tagihan.rumah_id = user.rumah_id WHERE tagihan.id='$siswaId'");
$rowData = mysqli_fetch_assoc($resData);
$tarif = mysqli_query($conn, "SELECT * FROM tarif");
$rowTarif = mysqli_fetch_assoc($tarif);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php include('../config/title.php'); ?>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="shortcut icon" type="images/x-icon" href="../images/favicon.png">
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>IPL</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>IPL Payment</b> | Admin</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../images/user.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $rowPanitia['nama']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php include('../config/nav.php'); ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail Tagihan</h3>
            </div>
            <!-- /.box-header --><div class="box-body table-responsive">
          <table class="table table-bordered table-striped">
            <tr>
              <th width="40%">Waktu Tagihan</th>
              <td width="60%"><?php echo bulanIndo($rowData['bulan']) . " " . date('Y'); ?></td>
            </tr>
            <tr>
              <th width="40%">Nama Pemilik</th>
              <td width="60%"><?php echo $rowData['nama']; ?></td>
            </tr>
            <tr>
              <th width="40%">Kode Rumah</th>
              <td width="60%"><?php echo $rowData['kode']; ?></td>
            </tr>
            <tr>
              <th width="40%">Alamat Rumah</th>
              <td width="60%"><?php echo $rowData['alamat']; ?></td>
            </tr>
            <tr>
              <th width="40%">Penggunaan Listrik</th>
              <td width="60%"><?php echo $rowData['listrik']; ?> kWh</td>
            </tr>
            <tr>
              <th width="40%">Penggunaan Air</th>
              <td width="60%"><?php echo $rowData['air']; ?> m<sup>3</sup></td>
            </tr>
            <tr>
              <th width="40%">Tarif Listrik</th>
              <td width="60%"><?php echo rupiah($rowTarif['listrik']); ?>/kWh</td>
            </tr>
            <tr>
              <th width="40%">Tarif Air</th>
              <td width="60%"><?php echo rupiah($rowTarif['air']); ?>/m<sup>3</sup></td>
            </tr>
            <tr>
              <th width="40%">Total Tagihan Listrik</th>
              <td width="60%"><?php echo rupiah($rowData['tagihan_listrik']); ?></td>
            </tr>
            <tr>
              <th width="40%">Total Tagihan Air</th>
              <td width="60%"><?php echo rupiah($rowData['tagihan_air']); ?></td>
            </tr>
            <tr>
              <th width="40%">Tagihan Kebersihan</th>
              <td width="60%"><?php echo rupiah($rowData['tagihan_kebersihan']); ?></td>
            </tr>
            <tr>
              <th width="40%">Tagihan Keamanan</th>
              <td width="60%"><?php echo rupiah($rowData['tagihan_keamanan']); ?></td>
            </tr>
            <tr>
              <th width="40%">Denda</th>
              <td width="60%"><?php echo rupiah($rowData['denda']); ?></td>
            </tr>
            <tr>
              <th width="40%">Total Pembayaran</th>
              <td width="60%"><?php echo rupiah($rowData['total']); ?></td>
            </tr>
            <tr>
              <th width="40%">Status Pembayaran</th>
              <td width="60%">
                      <?php 
                        switch ($rowData['status']) {
                          case 0:
                          echo "<span class='text-danger'>Belum lunas</span>";
                            break;
                          case 1:
                          echo "<span class='text-warning'>Pending</span>";
                            break;
                          case 2:
                          echo "<span class='text-success'>Lunas</span>";
                            break;
                        }
                      ?></td>
            </tr>
          </table>
        </div>
            <!-- /.box-body -->
          </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; TIM KELOMPOK UNPAM</strong> 
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="../plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>

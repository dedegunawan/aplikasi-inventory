<?php
session_start();
/**
 * Jika Tidak login atau sudah login tapi bukan sebagai admin
 * maka akan dibawa kembali kehalaman login atau menuju halaman yang seharusnya.
 */
if ( !isset($_SESSION['user_login']) || 
    ( isset($_SESSION['user_login']) && $_SESSION['user_login'] != 'member' ) ) {

	header('location:./../index.php');
	exit();
}

/**
?>
<h2>Hallo Member <?=$_SESSION['nama'];?> Apakabar ?</h2>

<a href="./../logout.php">Logout</a>

*/

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../lte/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../lte/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../lte/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../lte/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../lte/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../lte/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../lte/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../lte/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="../lte/plugins/jQuery/jquery-2.2.3.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>B</b>TH</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>INVENTORY</b> BTH</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
              <span class="hidden-xs">Admin</span>
            </a>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li>
            <a href="../logout.php" >
              <span class="hidden-xs">Logout</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
      
        <li class="">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            
          </a>
         
        </li>

        <li class="">
          <a href="index.php?page=data-barang">
            <i class="fa fa-dashboard"></i> <span>Data Barang</span>
            
          </a>
         
        </li>

        <li class="">
          <a href="index.php?page=barang-masuk">
            <i class="fa fa-dashboard"></i> <span>Barang Masuk</span>
            
          </a>
         
        </li>
        <li class="">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Barang Keluar</span>
            
          </a>
         
        </li>

        <li class="">
          <a href="index.php?page=master-jenis-barang">
            <i class="fa fa-dashboard"></i> <span>Master Jenis Barang</span>
            
          </a>
         
        </li>

         <li class="">
          <a href="index.php?page=master-ruangan">
            <i class="fa fa-dashboard"></i> <span>Master Ruangan</span>
            
          </a>
         
        </li>

         <li class="">
          <a href="index.php?page=master-satuan">
            <i class="fa fa-dashboard"></i> <span>Master Satuan</span>
            
          </a>
         
        </li>


        <li class="">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Member</span>
            
          </a>
         
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

<?php
if (isset($_GET['page'])) {
  $page=$_GET['page'];
  switch ($page) {
    case 'data-barang':
      include "page/data_barang.php";
      break;

    case 'barang-masuk';
      include "page/barang_masuk.php";
      break;
    
    case 'master-jenis-barang';
      include "page/master_jenis_barang.php";
      break;

    case 'master-ruangan';
      include "page/master_ruangan.php";
      break;

    case 'master-satuan';
      include "page/master_satuan.php";
      break;

    default:
      # code...
      break;
  }
  # code...
} else {
  include "page/dashboard.php";
}

?>
  
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->

<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="../lte/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="../lte/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="../lte/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../lte/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../lte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../lte/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../lte/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../lte/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../lte/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../lte/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../lte/dist/js/demo.js"></script>
</body>
</html>
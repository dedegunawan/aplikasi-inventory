<?php
$start_time = microtime(TRUE);
ob_start();
define("ADMIN_PAGE", true);
require '../config.php';
if ( !isset($_SESSION['user_login']) ||
    ( isset($_SESSION['user_login']) && $_SESSION['user_login'] != 'admin' ) ) {
        $userObject = $_SESSION['userObject'];
	header("Location:../index.php");
}
if (!isset($_SESSION['userObject'])) {
    $_SESSION['userObject'] = User::find($_SESSION['sess_id']);
}
$userObject = $_SESSION['userObject'];
?>
<!DOCTYPE html>
<html>
<head>
    <?php include 'head.php';?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php
include ADMIN_PATH.'/navbar-top.php';
include 'menu.php';
if (isset($_GET['page'])) {
  $page=$_GET['page'];
  switch ($page) {
    case 'data-barang':
      include "page/data_barang.php";
      break;

    case 'barang-masuk';
      include "page/barang_masuk.php";
      break;

    case 'barang-keluar';
      include "page/barang_keluar.php";
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

    case 'keluhan';
      include "page/keluhan.php";
      break;

    default:
      # code...
      include "page/dashboard.php";
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
      <b>Version</b> 0.0.1. <small>Loading Time : {{{loading_time}}} s</small>
    </div>
    <strong>Copyright &copy; <?=date('Y');?> <a href="#">Who are You?</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<?php
include ADMIN_PATH.'/footer.php';
echo pop_script_and_parse('script_bottom', "\n");
?>
</body>
</html>
<?php
$output = ob_get_clean();
$end_time = microtime(TRUE);
$loading_time=($end_time - $start_time);
$output = str_replace("{{{loading_time}}}", $loading_time, $output);
echo $output;
//form_gbc();

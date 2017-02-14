<?php
if (!defined("ADMIN_PAGE")) {
    die('cannot direct access, use index.php please');
}
 ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SELAMAT DATANG ADMIN
        <small><?=strtoupper($config['app_name']);?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?=$config['app_name'];?></a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>

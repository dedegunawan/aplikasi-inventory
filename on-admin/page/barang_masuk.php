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
        Barang Masuk <br>
        <?php
        switch (get_action()) {
            case 'edit':
            case 'tambah':
                echo '<a href="'.admin_page('barang-masuk').'" class="btn btn-primary">Kembali</a>';
                break;

            default:
                echo '<a href="'.admin_page('barang-masuk', 'tambah').'" class="btn btn-primary">Tambah</a>';
                # code...
                break;
        }
         ?>

      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
    <div class="col-md-12">
    <div class="box box-default">
    <div class="box-body">
    <?php
    if (isset($_GET['action'])
      &&
      in_array($_GET['action'], array('tambah','do_tambah','edit','do_edit','hapus'))) {
      switch ($_GET['action']) {
        case 'hapus':
            sub_page('hapus', ADMIN_PATH);
        break;
        case 'tambah':
            sub_page('tambah', ADMIN_PATH);
        break;
        case 'do_tambah':
            sub_page('do_tambah', ADMIN_PATH);
        break;

        case 'edit' && false:
            sub_page('edit', ADMIN_PATH);
        break;
        case 'do_edit' && false:
            sub_page('do_edit', ADMIN_PATH);

        break;
        default:
          # code...
          break;
      }
    } else {
      sub_page('index', ADMIN_PATH);
    }

    ?>
    </div>
    </div>
    </div>
    </div>

      <!-- Small boxes (Stat box) -->


      <!-- /.row -->
      <!-- Main row -->


      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <script>
  $(document).on('click', ".confirmationBefore", function(e) {
    e.preventDefault();
    var confd = confirm("apakah anda yakin ?");
    var url = $(this).attr('href');
    if (confd) {
      window.location.href=url;
    }
});
  </script>

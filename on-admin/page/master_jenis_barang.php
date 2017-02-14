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
        Master Jenis Barang<br><a href="index.php?page=master-jenis-barang&action=tambah" class="btn btn-primary">Tambah</a>

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
        $id_jenis_barang = $_GET['id_jenis_barang'];
        if ($id_jenis_barang) {
          $stmt = $dbconnect->prepare("DELETE FROM master_jenis_barang WHERE id_jenis_barang = ?");
          $stmt->bind_param('s', $id_jenis_barang);
          $stmt->execute();
          $stmt->close();
          echo "<script>window.location.href =
          'index.php?page=master-jenis-barang';</script>";
        }
        break;
        case 'tambah':
        ?>
        <div class ="row">
          <div class="col-md-12">
            <form action="index.php?page=master-jenis-barang&action=do_tambah" method="post">

              <div class="form-group">
                <label>Nama Jenis Barang </label>
                <input type="text"
                class="form-control"
                name="nama_jenis_barang"/>
              </div>

              <div class="form-group">
                <button type="submit"
                name="submit" value="Submit"
                class="btn
                btn-success"> Simpan </button>
                </div>
                </form>
                </div>
                </div>
                <?php

        break;
        case 'do_tambah':
        $nama_jenis_barang = $_POST['nama_jenis_barang'];


        if (
            $nama_jenis_barang
            ){
           $stmt = $dbconnect->prepare("INSERT INTO master_jenis_barang(nama_jenis_barang ) VALUES (?)");
          $stmt->bind_param('s', $nama_jenis_barang);
          $stmt->execute();
          $stmt->close();
          echo "<script>window.location.href =
          'index.php?page=master-jenis-barang';</script>";
        }
        break;
        case 'edit':
        $id_jenis_barang = $_GET['id_jenis_barang'];
        if (!$id_jenis_barang) {
          header("Location:index.php?page=master-jenis-barang");

        }
        $sql="select * from master_jenis_barang where id_jenis_barang='".$id_jenis_barang."'" ;
        $result=$dbconnect->query($sql);


        $row=$result->fetch_object();
        ?>
        <div class ="row">
          <div class="col-md-12">
            <form action="index.php?page=master-jenis-barang&action=do_edit" method="post">
                <input type="hidden"
                name="id_jenis_barang" value="<?=$row->id_jenis_barang;?>"/>
              <div class="form-group">
                <label>Nama Jenis Barang </label>
                <input type="text"
                class="form-control"
                name="nama_jenis_barang"  value="<?=$row->nama_jenis_barang;?>"/>
              </div>

              <div class="form-group">
                <button type="submit"
                name="submit" value="Submit"
                class="btn
                btn-success"> Simpan </button>
                </div>
                </form>
                </div>
                </div>
                <?php
        break;
        case 'do_edit':
        $id_jenis_barang = $_POST['id_jenis_barang'];
        $nama_jenis_barang = $_POST['nama_jenis_barang'];


        if (
            $id_jenis_barang
            &&
            $nama_jenis_barang
            ){
           $stmt = $dbconnect->prepare("UPDATE  master_jenis_barang SET nama_jenis_barang = ? WHERE id_jenis_barang = ?");
          $stmt->bind_param('si', $nama_jenis_barang, $id_jenis_barang);
          $stmt->execute();
          $stmt->close();
          echo "<script>window.location.href =
          'index.php?page=master-jenis-barang';</script>";
        }
        break;
        default:
          # code...
          break;
      }
    } else {
      ?>
      <table class = "table table-bordered">
    <thead>
    <tr>
    <th>

      No
      </th>
    <th>

      Nama Jenis Barang
      </th>
      <th>
      Aksi
      </th>
      </tr>
      </thead>
      <tbody>


    <?php

    $sql = "SELECT * FROM master_jenis_barang";
$result = $dbconnect->query($sql);
$number = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      ++$number;
      echo "<tr>

    <td> $number </td>
    <td> ".$row["nama_jenis_barang"]."  </td>
    <td> <a
    href='index.php?page=master-jenis-barang&action=edit&id_jenis_barang=".$row["id_jenis_barang"]."' class='btn btn-primary'>edit</a>
    <a
    href='index.php?page=master-jenis-barang&action=hapus&id_jenis_barang=".$row["id_jenis_barang"]."' class='btn btn-danger confirmationBefore'>hapus</a></td>
      </tr>";
    }
} else {
   echo "<tr>
    <td colspan= '3'>Tidak ada data !</td>
      </tr>";
}

?>
</tbody>
</table>
      <?php

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
  })
  </script>

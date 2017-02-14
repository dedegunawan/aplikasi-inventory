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
        Master Ruangan<br><a href="index.php?page=master-ruangan&action=tambah" class="btn btn-primary">Tambah</a>

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
        $id_ruangan = $_GET['id_ruangan'];
        if ($id_ruangan) {
          $stmt = $dbconnect->prepare("DELETE FROM master_ruangan WHERE id_ruangan = ?");
          $stmt->bind_param('s', $id_ruangan);
          $stmt->execute();
          $stmt->close();
          echo "<script>window.location.href =
          'index.php?page=master-ruangan';</script>";
        }
        break;
        case 'tambah':
        ?>
        <div class ="row">
          <div class="col-md-12">
            <form action="index.php?page=master-ruangan&action=do_tambah" method="post">


              <div class="form-group">
                <label>Nama Ruangan</label>
                <input type="text"
                class="form-control"
                name="nama_ruangan"/>
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
        $nama_ruangan = $_POST['nama_ruangan'];


        if (

            $nama_ruangan
            ){
           $stmt = $dbconnect->prepare("INSERT INTO master_ruangan(nama_ruangan ) VALUES (?)");
          $stmt->bind_param('s', $nama_ruangan);
          $stmt->execute();
          $stmt->close();
          echo "<script>window.location.href =
          'index.php?page=master-ruangan';</script>";
        }
        break;
        case 'edit':
        $id_ruangan = $_GET['id_ruangan'];
        if (!$id_ruangan) {
          header("Location:index.php?page=master-ruangan");

        }
        $sql="select * from master_ruangan where id_ruangan='".$id_ruangan."'" ;
        $result=$dbconnect->query($sql);


        $row=$result->fetch_object();
        ?>
        <div class ="row">
          <div class="col-md-12">
            <form action="index.php?page=master-ruangan&action=do_edit" method="post">

      <input type="hidden"
                name="id_ruangan" value="<?=$row->id_ruangan;?>"/>
              <div class="form-group">
                <label>Nama Ruangan </label>
                <input type="text"
                class="form-control"
                name="nama_ruangan"  value="<?=$row->nama_ruangan;?>"/>
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
        $nama_ruangan = $_POST['nama_ruangan'];


        if (

            $nama_ruangan
            ){
           $stmt = $dbconnect->prepare("UPDATE  master_ruangan SET nama_ruangan = ? WHERE id_ruangan = ?");
          $stmt->bind_param('si', $nama_ruangan, $id_ruangan);
          $stmt->execute();
          $stmt->close();
          echo "<script>window.location.href =
          'index.php?page=master-ruangan';</script>";
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
    No.
    </th>
    <th>

      Nama Ruangan
      </th>
      <th>
      Aksi
      </th>
      </tr>
      </thead>
      <tbody>


    <?php

    $sql = "SELECT * FROM master_ruangan";
$result = $dbconnect->query($sql);
$number = 0;

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      ++$number;
      echo "<tr>
      <td>$number</td>


    <td> ".$row["nama_ruangan"]."  </td>
    <td> <a
    href='index.php?page=master-ruangan&action=edit&id_ruangan=".$row["id_ruangan"]."' class='btn btn-primary'>edit</a>
    <a
    href='index.php?page=master-ruangan&action=hapus&id_ruangan=".$row["id_ruangan"]."' class='btn btn-danger confirmationBefore'>hapus</a></td>
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

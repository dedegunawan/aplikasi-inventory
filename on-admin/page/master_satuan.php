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
        Master Satuan<br><a href="<?=admin_page('master-satuan', 'tambah');?>" class="btn btn-primary">Tambah</a>

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
        $id_satuan = $_GET['id_satuan'];
        if ($id_satuan) {
          $master_satuan = MasterSatuan::where('id_satuan', '=', $id_satuan);
         // var_dump($id_satuan, $master_satuan);
          $delete = $master_satuan->delete();
          echo '<div class="callout callout-success">
            <h4>Berhasil</h4>

            <p>Penghapusan Master Satuan Berhasil, tunggu beberapa saat untuk kembali ke halaman index</p>
          </div>';

          echo "<script>window.location.href = '".admin_page('master-satuan')."';</script>";
        }
        break;
        case 'tambah':
        ?>
        <div class ="row">
          <div class="col-md-12">
            <form action="<?=admin_page('master-satuan', 'do_tambah');?>" method="post">


              <div class="form-group">
                <label>Nama Satuan</label>
                <input type="text"
                class="form-control"
                name="nama_satuan"/>
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

        $nama_satuan = $_POST['nama_satuan'];

        if (
            $nama_satuan
        ){
            $master_satuan = new MasterSatuan;
            $master_satuan->nama_satuan = $nama_satuan;
            $save = $master_satuan->save();
            echo '<div class="callout callout-success">
              <h4>Berhasil</h4>

              <p>Penambahan Master Satuan Berhasil, tunggu beberapa saat untuk kembali ke halaman index</p>
            </div>';
            echo "<script>window.location.href = '".admin_page('master-satuan')."';</script>";
        }
        break;
        case 'edit':
            $id_satuan = $_GET['id_satuan'];
            if (!$id_satuan) {
              header("Location:".admin_page('master-satuan'));

            }
            $master_satuan = MasterSatuan::where('id_satuan', '=', $id_satuan)->first();
            if (!$master_satuan) {
                echo '<div class="callout callout-success">
                  <h4>Berhasil</h4>

                  <p>Data Master Satuan tidak ditemukan</p>
                </div>';
                echo "<script>window.location.href = 'index.php?page=master-satuan';</script>";
            }



        $row=$master_satuan;
        ?>
        <div class ="row">
          <div class="col-md-12">
            <form action="index.php?page=master-satuan&action=do_edit" method="post">
              <input type="hidden"
                class=""
                name="id_satuan"  value="<?=$row->id_satuan;?>"/>

              <div class="form-group">
                <label>Nama Satuan </label>
                <input type="text"
                class="form-control"
                name="nama_satuan"  value="<?=$row->nama_satuan;?>"/>
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

        $id_satuan = $_POST['id_satuan'];
        $nama_satuan = $_POST['nama_satuan'];


        if (

            $nama_satuan
            ){
           $stmt = $dbconnect->prepare("UPDATE  master_satuan SET nama_satuan = ? WHERE id_satuan = ?");
          $stmt->bind_param('si', $nama_satuan, $id_satuan);
          $stmt->execute();
          $stmt->close();
          echo "<script>window.location.href = '".admin_page('master-satuan')."';</script>";
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
      Nama Satuan
      </th>
      <th>
      Aksi
      </th>
      </tr>
      </thead>
      <tbody>


    <?php

    $sql = "SELECT * FROM master_satuan";
$result = $dbconnect->query($sql);

$number = 0;

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      ++$number;
      echo "<tr>
       <td>$number</td>

    <td> ".$row["nama_satuan"]."  </td>
    <td> <a
    href='index.php?page=master-satuan&action=edit&id_satuan=".$row["id_satuan"]."' class='btn btn-primary'>edit</a>
    <a
    href='index.php?page=master-satuan&action=hapus&id_satuan=".$row["id_satuan"]."' class='btn btn-danger confirmationBefore'>hapus</a></td>
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

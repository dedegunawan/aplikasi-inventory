<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Master Satuan<br><a href="index.php?page=data-barang&action=tambah" class="btn btn-primary">Tambah</a>
        
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
        $kode_barang = $_GET['kode_barang'];
        if ($kode_barang) {
          $stmt = $dbconnect->prepare("DELETE FROM data_barang WHERE kode_barang = ?");
          $stmt->bind_param('s', $kode_barang);
          $stmt->execute();
          $stmt->close();
          echo "<script>window.location.href =
          'index.php?page=data-barang';</script>";
        }
        break;
        case 'tambah':
        ?>
        <div class ="row">
          <div class="col-md-12">
            <form action="index.php?page=data-barang&action=do_tambah" method="post">
              <div class="form-group">
                <label>Kode Barang </label>
                <input type="text"
                class="form-control"
                name="kode_barang"/>
              </div>

              <div class="form-group">
                <label>Nama Barang </label>
                <input type="text"
                class="form-control"
                name="nama_barang"/>
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
        $kode_barang = $_POST['kode_barang'];
        $nama_barang = $_POST['nama_barang'];
        

        if (
            $kode_barang
            &&
            $nama_barang
            ){
           $stmt = $dbconnect->prepare("INSERT INTO data_barang(kode_barang, nama_barang ) VALUES (?,?)");
          $stmt->bind_param('ss', $kode_barang, $nama_barang);
          $stmt->execute();
          $stmt->close();
          echo "<script>window.location.href =
          'index.php?page=data-barang';</script>";
        }
        break;
        case 'edit':  
        $kode_barang = $_GET['kode_barang'];
        if (!$kode_barang) {
          header("Location:index.php?page=data-barang");

        }
        $sql="select * from data_barang where kode_barang='".$kode_barang."'" ;
        $result=$dbconnect->query($sql);  

        
        $row=$result->fetch_object();
        ?>
        <div class ="row">
          <div class="col-md-12">
            <form action="index.php?page=data-barang&action=do_edit" method="post">
              <div class="form-group">
                <label>Kode Barang </label>
                <input type="hidden"
                name="kode_barang" value="<?=$row->kode_barang;?>"/>
                <input type="text"
                class="form-control" value="<?=$row->kode_barang;?>" disabled="disabled" />
              </div>

              <div class="form-group">
                <label>Nama Barang </label>
                <input type="text"
                class="form-control"
                name="nama_barang"  value="<?=$row->nama_barang;?>"/>
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
        $kode_barang = $_POST['kode_barang'];
        $nama_barang = $_POST['nama_barang'];
        

        if (
            $kode_barang
            &&
            $nama_barang
            ){
           $stmt = $dbconnect->prepare("UPDATE  data_barang SET nama_barang = ? WHERE kode_barang = ?");
          $stmt->bind_param('ss', $nama_barang, $kode_barang);
          $stmt->execute();
          $stmt->close();
          echo "<script>window.location.href =
          'index.php?page=data-barang';</script>";
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
    Kode Satuan
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

    $sql = "SELECT * FROM data_barang";
$result = $dbconnect->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<tr>
    <td> ".$row["kode_barang"]."</td>
    <td> ".$row["nama_barang"]."  </td>
    <td> <a
    href='index.php?page=data-barang&action=edit&kode_barang=".$row["kode_barang"]."' class='btn btn-primary'>edit</a>
    <a
    href='index.php?page=data-barang&action=hapus&kode_barang=".$row["kode_barang"]."' class='btn btn-danger confirmationBefore'>hapus</a></td>
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
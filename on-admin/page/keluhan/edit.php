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
        <label>Jenis Barang </label>
        <input type="hidden"
        name="id_jenis_barang" value="<?=$row->id_jenis_barang;?>"/>
        <input type="text"
        class="form-control" value="<?=$row->id_jenis_barang;?>" disabled="disabled" />
      </div>

       <div class="form-group">
        <label>Satuan </label>
        <input type="hidden"
        name="id_satuan" value="<?=$row->id_satuan;?>"/>
        <input type="text"
        class="form-control" value="<?=$row->id_satuan;?>" disabled="disabled" />
      </div>

      <div class="form-group">
        <label>Stok Maksimum </label>
        <input type="hidden"
        name="stok_maksimum" value="<?=$row->stok_maksimum;?>"/>
        <input type="text"
        class="form-control" value="<?=$row->stok_maksimum;?>" disabled="disabled" />
      </div>

      <div class="form-group">
        <label>Stok Minimum </label>
        <input type="hidden"
        name="stok_minimum" value="<?=$row->stok_minimum;?>"/>
        <input type="text"
        class="form-control" value="<?=$row->stok_minimum;?>" disabled="disabled" />
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

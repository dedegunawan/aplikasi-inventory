
<div class ="row">
  <?php sub_page('error_message', ADMIN_PATH);?>
  <div class="col-md-12">
    <form action="<?=admin_page('barang-masuk', 'do_tambah');?>" method="post">
       <div class="form-group">
        <label>Jenis Barang </label>
        <select class="form-control" name="kode_barang">
          <?php
            $data_barangs = DataBarang::all();
            $kode_barang = old('kode_barang');
            foreach($data_barangs as $data_barang) {
              echo "<option value='{$data_barang->kode_barang}' ".($kode_barang == $data_barang->kode_barang ? " selected" : "").">{$data_barang->nama_barang} ({$data_barang->kode_barang})</option>";
            }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label>Jumlah Stok</label>
        <input type="text"
        class="form-control"
        name="qty"  value="<?=old('qty');?>"/>
      </div>
      <link rel="stylesheet" href="<?=BASE_URL.'/lte/plugins/datepicker/datepicker3.css';?>" />
      <div class="form-group">
        <label>Tanggal</label>
        <input type="text"
        class="form-control datepicker"
        name="tanggal"  value="<?=old('tanggal');?>" placeholder="cth. 2017-09-29"/>
        <?php
        push_script('script_bottom', '<script src="'.BASE_URL.'/lte/plugins/datepicker/bootstrap-datepicker.js"></script>');
        push_script('script_bottom', function() {
            echo "<script>";
            echo "$('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
            });";
            echo "</script>";
        });
        ?>
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

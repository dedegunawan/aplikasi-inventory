
<div class ="row">
  <?php sub_page('error_message', ADMIN_PATH);?>
  <div class="col-md-12">
    <form action="<?=admin_page('barang-masuk', 'do_tambah');?>" method="post">
        <div class="form-group">
         <label>Status Barang</label>
         <select class="form-control" name="status">
           <?php
             $statuss = array(
                 '1' => 'Digunakan',
                 '2' => 'Dipinjam'
             );
             $status = old('status');
             foreach ($statuss as $key => $value) {
                  echo "<option value='{$key}' ".($status == $key ? " selected" : "").">{$value}</option>";
             }
           ?>
         </select>
       </div>
       <div class="form-group">
        <label>Ruangan </label>
        <select class="form-control" name="id_ruangan">
          <?php
            $master_ruangans = MasterRuangan::all();
            $id_ruangan = old('id_ruangan');
            foreach($master_ruangans as $master_ruangan) {
              echo "<option value='{$master_ruangan->id_ruangan}' ".($id_ruangan == $master_ruangan->id_ruangan ? " selected" : "").">{$master_ruangan->nama_ruangan}</option>";
            }
          ?>
        </select>
      </div>
      <link rel="stylesheet" href="<?=BASE_URL.'/lte/plugins/datepicker/datepicker3.css';?>" />
      <div class="form-group">
        <label>Tanggal Penempatan</label>
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
        <label>Jumlah</label>
        <input type="text"
        class="form-control"
        name="qty"  value="<?=old('qty');?>"/>
      </div>
      <div class="form-group">
        <label>Tanggal</label>
        <input type="text"
        class="form-control datepicker"
        name="tanggal_penarikan"  value="<?=old('tanggal_penarikan');?>" placeholder="cth. 2017-09-29"/>
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

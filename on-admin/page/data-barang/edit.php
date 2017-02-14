<?php
try {
    $kode_barang = @$_GET['kode_barang'];
    if (!$kode_barang) {
        echo "Data Barang Tidak ditemukan";
        echo "<script>window.location.href =
        '".admin_page('data-barang')."';</script>";
        throw new Exception("Error Processing Request", 1);

    }
    else {
        $barang = DataBarang::find($kode_barang);
    }
    if (@!$barang) {
        echo "Data Barang Tidak ditemukan";
        echo "<script>window.location.href =
        '".admin_page('data-barang')."';</script>";
        throw new Exception("Error Processing Request", 1);
    }

    ?>
    <div class ="row">
      <?php sub_page('error_message', ADMIN_PATH);?>
      <div class="col-md-12">
        <form action="<?=admin_page('data-barang', 'do_edit');?>" method="post">
          <div class="form-group">
            <label>Kode Barang </label>
            <input type="text" class="form-control"  value="<?=$barang->kode_barang;?>" disabled="disabled"/>
            <input type="hidden" name="kode_barang"  value="<?=$barang->kode_barang;?>"/>
          </div>
          <div class="form-group">
            <label>Nama Barang </label>
            <input type="text"
            class="form-control"
            name="nama_barang" value="<?php $nama_barang = old('nama_barang');echo ($nama_barang?$nama_barang:$barang->nama_barang);?>"/>
          </div>

           <div class="form-group">
            <label>Jenis Barang </label>
            <select class="form-control" name="id_jenis_barang">
              <?php
                $master_jenis_barangs = MasterJenisBarang::all();
                $id_jenis_barang = old('id_jenis_barang');
                if (!$id_jenis_barang) {
                    $id_jenis_barang = $barang->id_jenis_barang;
                }
                foreach($master_jenis_barangs as $jenis_barang) {
                  echo "<option value='{$jenis_barang->id_jenis_barang}' ".($id_jenis_barang == $jenis_barang->id_jenis_barang ? " selected" : "").">{$jenis_barang->nama_jenis_barang}</option>";
                }
              ?>
            </select>
          </div>

           <div class="form-group">
            <label>Satuan </label>
            <select class="form-control" name="id_satuan">
              <?php
                $master_satuans = MasterSatuan::all();
                $id_satuan = old('id_satuan');
                if (!$id_satuan) {
                    $id_satuan = $barang->id_satuan;
                }
                foreach ($master_satuans as $satuan) {
                  echo "<option value='{$satuan->id_satuan}' ".($id_satuan == $satuan->id_satuan ? " selected" : "").">{$satuan->nama_satuan}</option>";
                }
              ?>
            </select>
          </div>

          <div class="form-group">
            <label>Stok Maksimum </label>
            <input type="text"
            class="form-control"
            name="stok_maksimum"  value="<?php $stok_maksimum = old('stok_maksimum');echo ($stok_maksimum?$stok_maksimum:$barang->stok_maksimum);?>"/>
          </div>

           <div class="form-group">
            <label>Stok Minimum</label>
            <input type="text"
            class="form-control"
            name="stok_minimum"  value="<?php $stok_minimum = old('stok_minimum');echo ($nama_barang?$stok_minimum:$barang->stok_minimum);?>"/>
          </div>


          <div class="form-group">
            <button type="submit"
            name="submit" value="Submit"
            class="btn
            btn-success"> Ubah </button>
            </div>
            </form>
            </div>
        </div>
        <?php
} catch (Exception $e) {

}

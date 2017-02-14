
<table class = "table table-bordered">
    <thead>
        <tr>
            <th class="middle center">
            Kode Barang
            </th>
            <th class="middle center">
            Nama Barang
            </th>
            <th class="middle center">
            Jenis Barang
            </th>
            <th class="middle center">
            Stok Maksimum
            </th>
            <th class="middle center">
            Stok Minimum
            </th>
            <th class="middle center">
            Stok Saat Ini
            </th>
            <th class="middle center">
                Jumlah Pemenuhan<br />Barang
            </th>
            <th class="middle center">
            Aksi
            </th>
        </tr>
    </thead>
<tbody>

<?php
$data_barangs = DataBarang::with('barang_masuk')->with('barang_keluar')->with('satuan')->with('jenis_barang')->get();
if ($data_barangs->count()) {
// output data of each row
    foreach($data_barangs as $row) {
          $disallow_delete = $row->barang_masuk->count() + $row->barang_keluar->count();

          $jumlah_masuk = $row->barang_masuk->pluck('qty')->sum();
          $jumlah_keluar = $row->barang_keluar()->whereRaw('tanggal_penarikan is NULL')->get()->pluck('qty')->sum();

          $stok_saat_ini = $jumlah_masuk - $jumlah_keluar;
          $pemenuhan = $row->stok_maksimum - $stok_saat_ini;
          $satuan = $row->satuan;
          if ($stok_saat_ini <= $row->stok_minimum) {
              $class=" class='bg-danger' ";
          } else if ($stok_saat_ini >= $row->stok_maksimum) {
              $class=" class='bg-warning' ";
          } else {
              $class='';
          }
            echo "<tr $class>
            <td> $row->kode_barang</td>
            <td> $row->nama_barang  </td>
            <td> {$row->jenis_barang->nama_jenis_barang}</td>
            <td> $row->stok_maksimum {$satuan->nama_satuan}</td>
            <td> $row->stok_minimum {$satuan->nama_satuan}</td>
            <td> $stok_saat_ini {$satuan->nama_satuan}</td>
            <td> ".($pemenuhan >= 0 ? " ditambah $pemenuhan {$satuan->nama_satuan}" : " kelebihan ".abs($pemenuhan)." {$satuan->nama_satuan}")."</td>
            <td> <a
            href='".admin_page('data-barang', 'edit', array('kode_barang' => $row->kode_barang))."' class='btn btn-primary'>edit</a>
            ".($disallow_delete ? "<a
            href='#' class='btn btn-danger' disabled data-toggle=\"tooltip\" data-placement=\"top\" title=\"Tidak dapat dihapus, karena digunakan oleh Modul Lain\">hapus</a>" : "<a
            href='".admin_page('data-barang', 'hapus', array('kode_barang' => $row->kode_barang))."' class='btn btn-danger confirmationBefore' >hapus</a>")."
            </td>
            </tr>";
    }
} else {
    echo "<tr>
    <td colspan= '7'>Tidak ada data !</td>
    </tr>";
}

?>
</tbody>
</table>
<br />
Keterangan :
<div style="width:160px;height:40px;padding:10px;margin-bottom:10px;" class="bg-red text-white">Stok Barang Kurang</div>
<div style="width:160px;height:40px;padding:10px;margin-bottom:10px;" class="bg-warning text-white">Stok Barang Berlebih</div>

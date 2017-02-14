
<table class = "table table-bordered">
    <thead>
        <tr>

            <th>
            Nama Barang
            </th>
            <th>
            Tanggal Masuk
            </th>
            <th>
            Jumlah Masuk
            </th>
            <th>
            Aksi
            </th>
        </tr>
    </thead>
<tbody>

<?php
$barang_masuks = BarangMasuk::with('data_barang')->orderBy('tanggal', 'desc')->get();
if ($barang_masuks->count()) {
// output data of each row
    foreach($barang_masuks as $row) {
            $data_barang = $row->data_barang;
            echo "<tr>
            <td> $data_barang->nama_barang $data_barang->kode_barang</td>
            <td> ".$row->tanggal->format("d F Y")."  </td>
            <td> {$row->qty}</td>
            <td> <!--<a
            href='".admin_page('barang-masuk', 'edit', array('id_barang_masuk' => $row->id_barang_masuk))."' class='btn btn-primary'>edit</a>-->
            <a
            href='".admin_page('barang-masuk', 'hapus', array('id_barang_masuk' => $row->id_barang_masuk))."' class='btn btn-danger confirmationBefore' >hapus</a>
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

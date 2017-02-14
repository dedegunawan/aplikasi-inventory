
<table class = "table table-bordered">
    <thead>
        <tr>

            <th>
                Nama Barang
            </th>
            <th>
                Jumlah Barang
            </th>
            <th>
                Status Barang
            </th>
            <th>
                Tanggal Penempatan
            </th>
            <th>
                Ruangan
            </th>
            <th>
                Wajib Dikembalikan<br />Tanggal
            </th>
            <th>
                Dikembalikan<br />Tanggal
            </th>
            <th>
                Status Pengembalian
            </th>
            <th>
                Aksi
            </th>
        </tr>
    </thead>
<tbody>

<?php
$barang_keluars = BarangKeluar::with('data_barang')->orderBy('tanggal', 'desc')->get();
if ($barang_keluars->count()) {
// output data of each row
    foreach($barang_keluars as $row) {
            $data_barang = $row->data_barang;
            $satuan = $data_barang->satuan;

            //1 = digunakan
            //2 = dipinjam, harus dimbalikan

            if ($row->status == 1) {
                echo "<tr>
                <td> $data_barang->nama_barang $data_barang->kode_barang</td>
                <td> $row->qty $satuan->nama_satuan</td>
                </td>
                <td> Digunakan </td>
                <td> ".$row->tanggal->format("d F Y")."  </td>
                <td> ".$row->ruangan->nama_ruangan."  </td>
                <td colspan='3'  style='text-align:center' class='bg-gray'> Tidak Perlu dikembalikan</td>
                <td>

                <a
                href='".admin_page('barang-keluar', 'hapus', array('id_barang_keluar' => $row->id_barang_keluar))."' class='btn btn-danger confirmationBefore' >hapus</a>
                </td>
                </tr>";
            } else {
                $status_pengembalian = '<td>

                </td>';
                if ($row->tanggal_penarikan === NULL && $row->tanggal_penarikan_seharusnya->format('Y-m-d') >= date('Y-m-d')) {
                    $status_pengembalian = "
                    <td style='text-align:center' class='bg-warning'> <a href='".admin_page('barang-keluar', 'kembalikan', array('id_barang_keluar' => $row->id_barang_keluar))."' class='btn btn-primary'>Kembalikan</a></td><td style='text-align:center' class='bg-warning'> Belum Dikembalikan</td>";
                } else if($row->tanggal_penarikan === NULL && $row->tanggal_penarikan_seharusnya->format('Y-m-d') < date('Y-m-d')) {
                    $status_pengembalian = "
                    <td style='text-align:center' class='bg-danger'> <a href='".admin_page('barang-keluar', 'kembalikan', array('id_barang_keluar' => $row->id_barang_keluar))."' class='btn btn-primary'>Kembalikan</a></td><td style='text-align:center' class='bg-danger'> Telat &amp; Belum Dikembalikan</td>";
                }
                else if($row->tanggal_penarikan !== NULL && $row->tanggal_penarikan_seharusnya->format('Y-m-d') >= date('Y-m-d')) {
                    $status_pengembalian = "
                    <td style='text-align:center' class='bg-success'>".$row->tanggal_penarikan->format('d F Y')."</td><td style='text-align:center' class='bg-success'> Sudah Dikembalikan</td>";
                }
                else if($row->tanggal_penarikan !== NULL && $row->tanggal_penarikan_seharusnya->format('Y-m-d') < date('Y-m-d')) {
                    $status_pengembalian = "
                    <td style='text-align:center' class='bg-danger'>".$row->tanggal_penarikan->format('d F Y')."</td><td style='text-align:center' class='bg-danger'> Telat</td>";
                }

                echo "<tr>
                <td> $data_barang->nama_barang $data_barang->kode_barang</td>
                <td> $row->qty $satuan->nama_satuan</td>
                <td> Dipinjam </td>
                <td> ".$row->tanggal->format("d F Y")."  </td>
                <td> ".$row->ruangan->nama_ruangan."  </td>
                <td> ". $row->tanggal_penarikan_seharusnya->format('d F Y')."</td>
                $status_pengembalian
                <td>
                <a
                href='".admin_page('barang-keluar', 'hapus', array('id_barang_keluar' => $row->id_barang_keluar))."' class='btn btn-danger confirmationBefore' >hapus</a>
                </td>
                </tr>";
            }

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

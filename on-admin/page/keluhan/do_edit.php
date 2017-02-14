<?php
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
?>

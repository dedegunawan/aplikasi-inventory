<?php

$id_barang_masuk = $_GET['id_barang_masuk'];
if ($id_barang_masuk) {
  $barang_masuk = BarangMasuk::find($id_barang_masuk);
  $barang_masuk->delete();
  echo "<script>window.location.href =
  '".admin_page('barang-masuk')."';</script>";
}

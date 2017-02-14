<?php

$kode_barang = $_GET['kode_barang'];
if ($kode_barang) {
  try {
      $barang = DataBarang::with('barang_keluar')->with('satuan')->with('jenis_barang')->find($kode_barang);
      $disallow_delete = @$barang->barang_masuk->count() + @$barang->barang_keluar->count();
      if ($disallow_delete) {
          throw new Exception("Error Processing Request", 1);

      } else {
          $barang->delete();
          echo "<p class='alert alert-success'>
          Berhasil menghapus data barang
          </p>";
      }
  } catch (Exception $e) {
      echo "<p class='alert alert-danger'>
      Gagal menghapus data barang, karena sedang digunakan oleh tabel lain.
      </p>";
  }


  echo "<script>window.location.href =
  '".admin_page('data-barang')."';</script>";
}

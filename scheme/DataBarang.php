<?php
//User Model
use Illuminate\Database\Eloquent\Model as Eloquent;

class DataBarang extends Eloquent {
    protected $table = 'data_barang';
    protected $primaryKey = 'kode_barang';
    public $timestamps = false;
    public $incrementing = false;
    function barang_masuk() {
        return $this->hasMany('BarangMasuk', 'kode_barang', 'kode_barang');
    }
    function barang_keluar() {
        return $this->hasMany('BarangKeluar', 'kode_barang', 'kode_barang');
    }
    function satuan() {
        return $this->belongsTo('MasterSatuan', 'id_satuan', 'id_satuan');
    }
    function jenis_barang() {
        return $this->belongsTo('MasterJenisBarang', 'id_jenis_barang', 'id_jenis_barang');
    }

}

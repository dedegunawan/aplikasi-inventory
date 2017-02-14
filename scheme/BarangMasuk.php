<?php
//User Model
use Illuminate\Database\Eloquent\Model as Eloquent;

class BarangMasuk extends Eloquent {
    protected $table = 'barang_masuk';
    protected $primaryKey = 'id_barang_masuk';
    public $timestamps = false;
    public $incrementing = true;
    protected $dates = ['tanggal'];
    function data_barang() {
        return $this->belongsTo('DataBarang', 'kode_barang', 'kode_barang');
    }

}

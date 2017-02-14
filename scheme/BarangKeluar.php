<?php
//User Model
use Illuminate\Database\Eloquent\Model as Eloquent;

class BarangKeluar extends Eloquent {
    protected $table = 'barang_keluar';
    protected $primaryKey = 'id_barang_keluar';
    public $timestamps = false;
    public $incrementing = true;
    protected $dates = ['tanggal', 'tanggal_penarikan', 'tanggal_penarikan_seharusnya'];
    function data_barang() {
        return $this->belongsTo('DataBarang', 'kode_barang', 'kode_barang');
    }
    function ruangan() {
        return $this->belongsTo('MasterRuangan', 'id_ruangan', 'id_ruangan');
    }


}

<?php
//User Model
use Illuminate\Database\Eloquent\Model as Eloquent;

class MasterJenisBarang extends Eloquent {
    protected $table = 'master_jenis_barang';
    protected $primaryKey = 'id_jenis_barang';
    public $timestamps = false;
    public $incrementing = true;

}

<?php
//User Model
use Illuminate\Database\Eloquent\Model as Eloquent;

class KondisiBarang extends Eloquent {
    protected $table = 'keluhan_barang';
    protected $primaryKey = 'id_keluhan';
    public $timestamps = false;
    public $incrementing = true;

}

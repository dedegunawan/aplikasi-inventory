<?php
//User Model
use Illuminate\Database\Eloquent\Model as Eloquent;

class MasterSatuan extends Eloquent {
    protected $table = 'master_satuan';
    protected $primaryKey = 'id_satuan';
    public $timestamps = false;

}

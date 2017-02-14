<?php
//User Model
use Illuminate\Database\Eloquent\Model as Eloquent;

class MasterRuangan extends Eloquent {
    protected $table = 'master_ruangan';
    protected $primaryKey = 'id_ruangan';
    public $timestamps = false;
    public $incrementing = true;

}

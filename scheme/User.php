<?php
//User Model
use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent {
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    public $timestamps = false;

}

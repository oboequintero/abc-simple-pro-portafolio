<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol_User extends Model
{
    protected $table='role_user';
    protected $primaryKey = 'id';
    protected $fillable =  array('role_id','user_id');
    protected $hidden = ['created_at','updated_at'];
}

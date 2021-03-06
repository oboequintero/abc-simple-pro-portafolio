<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table='roles';
    protected $primaryKey = 'id';
    protected $fillable =  array('name','slug', 'description', 'special');
    protected $hidden = ['created_at','updated_at'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examen_ejercicio extends Model
{
    protected $table="examen_ejercicio";
    protected $primaryKey = 'id';
    protected $fillable = array('id_examen', 'id_ejercicio');
    protected $hidden = ['created_at','updated_at'];
}

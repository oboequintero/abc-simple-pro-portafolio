<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_ejercicios extends Model
{
    protected $table="tipo_ejercicio";
    protected $primaryKey = 'id_tipo_ejercicio';
    
    protected $fillable = array('descripcion', 'tipo','activo');
    
    protected $hidden = ['created_at','updated_at'];
    
}

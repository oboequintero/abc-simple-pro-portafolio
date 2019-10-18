<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Niveles extends Model
{
    //
    protected $table='Niveles';
    protected $primaryKey = 'id_nivel';
    protected $fillable =  array('codigo', 'nombre', 'descripcion', 'activo');
    protected $hidden = ['created_at','updated_at'];

}
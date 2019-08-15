<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idiomas extends Model
{
    protected $table='Idiomas';
    protected $primaryKey = 'id_idioma';
    protected $fillable =  array('nombre', 'descripcion', 'activo');
    protected $hidden = ['created_at','updated_at'];
}

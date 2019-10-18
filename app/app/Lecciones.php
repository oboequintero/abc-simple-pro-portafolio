<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecciones extends Model
{
    protected $table='Lecciones';
    protected $primaryKey = 'id_leccion';
    protected $fillable =  array('id_nivel','codigo', 'nombre', 'descripcion', 'activo');
    protected $hidden = ['created_at','updated_at'];
    
}


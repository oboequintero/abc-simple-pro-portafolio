<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plantillas extends Model
{
    protected $table='Plantillas';
    protected $primaryKey = 'id_plantilla';
    protected $fillable =  array('id_leccion','codigo', 'nombre', 'descripcion', 'activo','tipo_plantilla');
    protected $hidden = ['created_at','updated_at'];
}

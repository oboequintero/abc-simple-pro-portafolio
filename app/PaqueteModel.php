<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaqueteModel extends Model
{
    //
    protected $table='Paquetes';
    
    protected $primaryKey = 'id_paquete';
    protected $fillable =  array('codigo', 'nombre', 'descripcion', 'activo');
    //protected $hidden = ['created_at','updated_at'];
}

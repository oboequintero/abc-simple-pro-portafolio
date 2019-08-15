<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promociones extends Model
{
    protected $table="Promociones";
    protected $primaryKey = 'id_promocion';
    protected $fillable = array('id_promocion', 'nombre','descripcion', 'precio','activo');
    protected $hidden = ['created_at','updated_at'];
}

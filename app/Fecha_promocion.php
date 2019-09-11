<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fecha_promocion extends Model
{
    protected $table="fecha_promocion";
    protected $primaryKey = 'id_fecha_pr';
    protected $fillable = array('id_promocion', 'fecha_i','fecha_f');
    protected $hidden = ['created_at','updated_at'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_tarjetas extends Model
{
    protected $table="tipo_tarjetas";
    protected $primaryKey = 'id_t_tarjeta';
    
    protected $fillable = array('nombre','activo');
    
    protected $hidden = ['created_at','updated_at'];
}

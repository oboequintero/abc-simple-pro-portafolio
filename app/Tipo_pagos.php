<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_pagos extends Model
{
    protected $table="tipo_pagos";
    protected $primaryKey = 'id_t_pago';
    
    protected $fillable = array('codigo','nombre','activo');
    
    protected $hidden = ['created_at','updated_at'];
}

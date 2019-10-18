<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_examenes extends Model
{
    protected $table="tipo_examen";
    protected $primaryKey = 'id_tipo_examen';
    
    protected $fillable = array('descripcion','activo');
    
    protected $hidden = ['created_at','updated_at'];
}

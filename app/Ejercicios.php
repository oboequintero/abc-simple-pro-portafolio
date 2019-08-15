<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ejercicios extends Model
{
    protected $table="ejercicios";
    protected $primaryKey = 'id_ejercicio';
    protected $fillable = array('id_examen', 'id_tipo_ejercicio','codigo', 'descripcion','puntaje','activo');
    protected $hidden = ['created_at','updated_at'];

    public function ejercicio()

    {
    	return $this->belongsTo('App\Examenes');
        
    }


}
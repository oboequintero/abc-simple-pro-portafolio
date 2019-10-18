<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examenes extends Model
{
    protected $table="examenes";
    protected $primaryKey = 'id_examen';
    
    protected $fillable = array('id_leccion','id_tipo_examen','nombre', 'descripcion','activo');
    
    protected $hidden = ['created_at','updated_at'];

    public function leccion()

    {
        return $this->belongsTo('App\Lecciones');
        
    }

    public function ejercicios()

    {
        return $this->hasMany('App\Ejercicios');
    }

}

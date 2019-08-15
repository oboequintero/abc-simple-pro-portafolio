<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    //
    
    protected $table = "Cursos";

    protected $primaryKey = "id_curso";
    
    protected $fillable = ['id_idioma',
                           'codigo',
                           'nombre',
                           'descripcion',
                           'precio',
                           'activo'
                          ];
}
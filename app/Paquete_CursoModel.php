<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paquete_CursoModel extends Model
{
    //
    protected $table = 'Paquetes_Cursos';

    protected $primaryKey = 'id_paq_curso';
    protected $fillable = array('id_paquete', 'id_curso');
}

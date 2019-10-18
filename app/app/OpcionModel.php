<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpcionModel extends Model
{
    //
    protected $table = "Opciones";

    protected $primaryKey = "id_opcion";

    protected $fillable = ['id_contenido', 'nombre', 'tipo', 'ruta'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContenidoModel extends Model
{
    //
    protected $table = "Contenido";

    protected $primaryKey = "id_contenido";
    protected $fillable = ['id_plantilla', 'nombre', 'tipo', 'descripcion',
                           'ruta', 'parrafo', 'tiempo', 'activo'];

}

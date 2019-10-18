<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiccionarioModel extends Model
{
    //
    //
    protected $table = "Diccionarios";

    protected $primaryKey = "id_diccionario";

    protected $fillable = ['id_idioma', 'palabra', 'traduccion', 'ruta_img', 'ruta_audio', 'ruta_video'];
}

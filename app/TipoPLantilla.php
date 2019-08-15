<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPlantilla extends Model
{
    protected $table = 'Tipo_Plantilla';
    protected $primaryKey = 'id_tipo';
    protected $fillable = ['nombre'];
}

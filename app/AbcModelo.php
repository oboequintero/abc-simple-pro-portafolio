<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbcModelo extends Model
{
    protected $table = 'Abecedario';
    protected $primaryKey = 'id_abc';
    protected $fillable = ['nombre', 'descripcion', 'activo'];
}

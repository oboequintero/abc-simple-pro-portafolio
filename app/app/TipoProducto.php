<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    protected $table = 'Tipo_Productos';
    protected $primaryKey = 'id_t_producto';
    protected $fillable = ['nombre','activo'];
}
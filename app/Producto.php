<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'Productos';
    protected $primaryKey = 'id_producto';
    protected $fillable = ['nombre','descripcion','costo','activo','referencia','id_t_producto'];
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventas_detalle extends Model
{
    protected $table = "Ventas_detalle";

    protected $primaryKey = "id_venta_d";
    
    protected $fillable = ['id_venta',
                           'id_producto',
                           'precio_venta'
                          ];
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventas_subdetalle_pago extends Model
{
    protected $table="ventas_subdetalle";
    protected $primaryKey = 'id_s_venta';
    protected $fillable = array('id_venta_d', 'id_promocion','id_paquete','id_curso','precio','nombre');
    protected $hidden = ['created_at','updated_at'];

}

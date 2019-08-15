<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventas_detalle_Pago extends Model
{
    protected $table="ventas_detalle_pago";
    protected $primaryKey = 'id_detalle_pago';
    protected $fillable = array('id_venta', 'id_tipo_pago','id_cliente','referencia','activo');
    protected $hidden = ['created_at','updated_at'];

}

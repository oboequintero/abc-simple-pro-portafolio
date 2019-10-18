<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    protected $table = "Ventas";

    protected $primaryKey = "id_venta";
    
    protected $fillable = ['id_cliente', #id_cliente anteriormente id_user
                            'total',
                            'fecha', 
                            'id_status'
                        
                          ];
}

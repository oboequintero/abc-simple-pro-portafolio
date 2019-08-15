<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    
    protected $table = "products";

    protected $primaryKey = "id";
    
    protected $fillable = ['id_curso',
                           'id_promocion',
                           'id_paquete',
                           'id_categoria',
                           'precio',
                           'imagen'
                          ];
}


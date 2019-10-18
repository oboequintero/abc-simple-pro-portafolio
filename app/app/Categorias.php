<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    
    protected $table = "categorias";

    protected $primaryKey = "id_categoria";
    
    protected $fillable = ['nombre_categoria'
    					  ];
}

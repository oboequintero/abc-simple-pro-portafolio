<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipsModel extends Model
{
    protected $table = 'Tips';
    protected $primaryKey = 'id_tips';
    protected $fillable = ['nombre', 'descripcion', 'activo'];
}

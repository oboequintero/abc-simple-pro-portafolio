<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Limite_transacciones extends Model
{
    protected $table="limite_transacciones";
    protected $primaryKey = 'id_l_trans';
    protected $fillable = array('limite','activo');
    
    protected $hidden = ['created_at','updated_at'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocion_paquete extends Model
{
    protected $table="Promocion_paquete";
    protected $primaryKey = 'id_pr_pa';
    protected $fillable = array('id_promocion', 'id_paquete','activo');
    protected $hidden = ['created_at','updated_at'];

}

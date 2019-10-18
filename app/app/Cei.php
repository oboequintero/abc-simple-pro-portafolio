<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cei extends Model
{
    //
    protected $table='cei';
    protected $primaryKey = 'idcei';
    protected $fillable =  array('rif', 'cei', 'dire');
    protected $hidden = ['created_at','updated_at'];

}


class Formulario extends Model
{
    //
    protected $table='formulario';
    protected $primaryKey = 'idfor';
    protected $fillable =  array('id_personal', 'ubi_admin', 'cargo','ext','fecha_solicitud');
    protected $hidden = ['created_at','updated_at'];

}

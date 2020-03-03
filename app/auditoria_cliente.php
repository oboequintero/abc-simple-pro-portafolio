<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class auditoria_cliente extends Model
{
    protected $table = 'auditoria_cliente';
    protected $primaryKey = 'id';
    protected $fillable = ['idcliente', 'idcurso', 'idnivel','idplantilla','idleccion','fecha','porcentaje'];
}

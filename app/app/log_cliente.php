<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log_cliente extends Model
{
    protected $table = 'Log_cliente';
    protected $primaryKey = 'id';
    protected $fillable = ['id_cliente', 'estatus', 'fecha'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipsByPlantillaModel extends Model
{
    //
    protected $table = 'Tips_By_Plantilla';
    protected $primaryKey = 'id_tipsByP';
    protected $fillable = ['id_tips','id_plantilla'];

}

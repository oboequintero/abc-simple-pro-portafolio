<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table='permissions';
    protected $primaryKey = 'id';
    protected $fillable =  array('name','guard_name');
    protected $hidden = ['created_at','updated_at'];

    public function roles()
    {
        return $this->belongsToMany(Roles::class);
    }
}

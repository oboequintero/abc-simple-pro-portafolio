<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\ClienteResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cliente extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id', 'name', 'last_name', 'phone', 'email', 'password', 'photo1', 'created_at', 'updated_at', 'ref', 'tipo_cliente', 'documento', 'fecha_nac', 'activo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var arrays
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ClienteResetPassword($token));
    }

}

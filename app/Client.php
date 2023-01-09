<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Client extends Authenticatable
{
    use Notifiable;

    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $guarded = [];

    public function orders(){
        return $this->hasMany('App\Order');
    }

    public function getNomCompletAttribute()
    {
        return "{$this->prenom} {$this->nom}";
    }
}

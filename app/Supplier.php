<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $guarded = [];
    
    public function getNomCompletAttribute()
    {
        return "{$this->prenom} {$this->nom}";
    }
}

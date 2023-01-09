<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variante extends Model
{
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function entrepots()
    {
        return $this->belongsToMany('App\Entrepot')->withPivot('qte');;
    }
}

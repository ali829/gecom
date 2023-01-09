<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrepot extends Model
{
    protected $guarded = [];

    public function destination(){
        return $this->belongsTo('App\Destination');
    }

    public function variantes()
    {
        return $this->belongsToMany('App\Variante')->withPivot('qte');;
    }

    public function getNomVilleAttribute()
    {
        return "{$this->destination->name}";
    }
    public function getTotalProduitsAttribute()
    {
        return $this->variantes->sum('pivot.qte');
    }
    public function getCapaciteAttribute()
    {
        $c=15;
        return $c."%";
    }
}

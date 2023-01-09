<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShipmentRange extends Model
{
    protected $guarded = [];

    public function destinations(){
        return $this->belongsToMany('App\Destination')->withPivot('price');
    }
}

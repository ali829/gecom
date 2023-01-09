<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipper extends Model
{
    protected $guarded = [];

    public function products(){
        return $this->belongsToMany('App\Product');
    }

    public function shipment_ranges(){
        return $this->hasMany('App\ShipmentRange');
    }
}

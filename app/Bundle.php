<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{
    protected $guarded = [];


    public function products(){
        return $this->belongsToMany('App\Product');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{

    protected $guarded = [];

    public function children()
    {
        return $this->hasMany('App\Categorie', 'parent_id');
    }

    public function image()
    {
        return $this->belongsTo('App\Image');
    }

    public function products(){
        return $this->hasMany('App\Product');
    }

    public function promotions()
    {
        return $this->morphMany('App\Promotion', 'promotionable');
    }

    public function getSmallDescriptionAttribute()
    {
        return substr($this->description, 0, 80);
    }

    public function getSousCategorieAttribute()
    {
        return $this->children()->count();
    }
}

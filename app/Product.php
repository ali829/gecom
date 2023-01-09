<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function categorie()
    {
        return $this->belongsTo('App\Categorie');
    }

    public function variantes()
    {
        return $this->hasMany('App\Variante');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }

    public function bundles()
    {
        return $this->belongsToMany('App\Bundle');
    }

    public function images()
    {
        return $this->belongsToMany('App\Image');
    }

    public function getNomCategorieAttribute()
    {
        return "{$this->categorie->nom}";
    }

    public function getStockTotalAttribute()
    {
        return 0;
    }
    public function getVarianteTotalAttribute()
    {
        return count($this->variantes);
    }
}

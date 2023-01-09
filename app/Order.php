<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    
    public function client(){
        return $this->belongsTo('App\Client');
    }
 
    public function products(){
        return $this->belongsToMany('App\Product')->withPivot('qte','remise', 'original_price');
    }
    public function getTotalAttribute(){
        $total = 0;
        foreach ($this->products as $produit) {
            $total += (($produit->pivot->qte*$produit->pivot->original_price)-(($produit->pivot->qte*$produit->pivot->original_price)*$produit->pivot->qte/100));
        }
        return $total;
    }
    public function getNbProduitAttribute()
    {
        return "{$this->products()->sum('qte')}";
    }
    public function getOrderTotalAttribute()
    {
        return $this->total + $this->shipping_price ;
    }
}

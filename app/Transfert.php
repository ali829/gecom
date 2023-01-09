<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfert extends Model
{
    protected $guarded = [];

    public function origine()
    {
        return $this->belongsTo('App\Entrepot', 'origine_id');
    }

    public function destination()
    {
        return $this->belongsTo('App\Entrepot', 'destination_id');
    }

    public function variantes()
    {
        return $this->belongsToMany('App\Variante')->withPivot('qte');;
    }

    public function getOriginNameAttribute()
    {
        return $this->origine->nom;
    }

    public function getNbrArticlesAttribute()
    {
        $nbr_articles = 0;

        foreach ($this->variantes as $variante) {
            $nbr_articles += $variante->pivot->qte;
        }

        return $nbr_articles;
    }

    public function getDestinationNameAttribute()
    {
        return $this->destination->nom;
    }
}

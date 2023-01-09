@extends('dashboard.layout')
@section('title',  $title)
@section('content')
<div class="w-full md:p-3">
    <div class="bg-white border rounded shadow">
        @include('components.table',
            [
                'columns'=> [
                    'Désignation' => 'nom',
                    'Descripion' => 'description',
                    'Ville' => 'nom_ville',
                    'Produit' => 'total_produits',
                    'Capacité' => 'capacite',
                    'Etat' => 'etat',
                ],
                'create_route' => 'entrepot.create',
                'data' => $entrepots,
                'model_name' => 'entrepot',
                'custom_add' => 'Nouvel entrepôt',
                'title' => $title
            ]
        )
        @include('components.table',
        [
            'columns'=> [
                'Désignation' => 'nom',
                'Descripion' => 'description',
                'Ville' => 'nom_ville',
                'Produit' => 'total_produits',
                'Capacité' => 'capacite',
                'Etat' => 'etat',
            ],
            'create_route' => 'entrepot.create',
            'data' => $entrepots,
            'model_name' => 'entrepot',
            'custom_add' => 'Nouvel entrepôt',
            'title' => $title
        ]
    )
    </div>
</div>
@endsection
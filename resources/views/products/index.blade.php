@extends('dashboard.layout')
@section('title', $title)
@section('content')
<div class="w-full md:p-3">
    <div class="bg-white border rounded shadow">
        @include('components.table',
            [
                'columns'=> [
                    'Désignation' => 'name',
                    'Categorie' => 'nom_categorie',
                    'Variante' => 'variante_total',
                ],
                'create_route' => 'product.create',
                'data' => $products,
                'model_name' => 'produit',
                'title' => $title,
                'custom_add' => 'Ajouter produit',
            ]
        )
    </div>
</div>
@endsection

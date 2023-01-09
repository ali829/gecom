@extends('dashboard.layout')
@section('title')
@section('content')
<div class="w-full md:p-3">
    <div class="bg-white border rounded shadow">
        @include('components.table',
            [
                'columns'=> [
                    'Nom de client' => 'shipping_name',
                    'tele' => 'shipping_phone',
                    'date de commande' => 'created_at',
                    'nb produits' => 'nb_produit',
                    'total' => 'order_total',
                    'etat' => 'is_quote',
                    'Actions' => [
                        'order.edit' => 'edit',
                    ],
                ],
                'create_route' => 'order.createSpecified',
                'data' => $orders,
                'model_name' => 'commande',
                'title' => $title,
                'custom_add' => 'Nouvelle commande',
            ]
        )
    </div>
</div>
@endsection


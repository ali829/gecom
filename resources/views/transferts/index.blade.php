@extends('dashboard.layout')
@section('title', $title)
@section('content')
<div class="w-full md:p-3">
    <div class="bg-white border rounded shadow">
        @include('components.table',
            [
                'columns'=> [
                    'Date' => 'date',
                    'Origine' => 'origin_name',
                    'Destination' => 'destination_name',
                    'Nbr Articles' => 'nbr_articles',
                    'Etat' => '',
                ],
                'create_route' => 'transfert.create',
                'data' => $transferts,
                'model_name' => 'transfert',
                'title' => $title,
                'custom_add' => 'Nouveau Transfert',
            ]
        )
    </div>
</div>
@endsection

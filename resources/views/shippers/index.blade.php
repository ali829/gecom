@extends('dashboard.layout')
@section('title', $title)
@section('content')

<div class="w-full md:p-3">
    <div class="bg-white border rounded shadow">
        @include('components.table',
            [
                'columns'=> [
                    'Logo' => '',
                    'Désignation' => 'company_name',
                    'Téléphone' => 'phone',
                    'Frais Livraioson' => [
                        'shipper.pricing' => 'attach_money'
                    ],
                    'Actions' => [
                        'shipper.edit' => 'edit',
                        
                        'shipper.destroy' => 'delete_forever'
                    ]
                ],
                'create_route' => 'shipper.create',
                'data' => $shippers,
                'model_name' => 'livreur',
                'title' => $title,
                'custom_add' => 'Nouveau livreur',
            ]
        )
    </div>
</div>
@endsection

@extends('dashboard.layout')

@section('title', $title)

@section('content')
<div class="w-full md:p-3">
    <div class="bg-white border rounded shadow">
        @include('components.table',
            [
                'columns'=> [
                    'Nom' => 'nom_complet',
                    'Téléphone' => 'tel',
                    'E-mail' => 'email',
                    'Adresse' => 'adresse',
                    'Actions' => [
                        'supplier.edit' => 'edit',
                        'supplier.destroy' => 'delete_forever'
                    ]
                ],
                'create_route' => 'supplier.create',
                'data' => $suppliers,
                'model_name' => 'fournisseur',
                'title' => $title,
                'custom_add' => 'Nouveau fournisseur',
            ]
        )
    </div>
</div>
@endsection

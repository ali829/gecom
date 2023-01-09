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
                        'client.edit' => 'edit',
                        'client.destroy' => 'delete_forever'
                    ]
                ],
                'create_route' => 'client.create',
                'data' => $clients,
                'model_name' => 'client',
                'title' => $title,
                'custom_add' => 'Nouveau client',
            ]
        )
    </div>
</div>
@endsection

@extends('dashboard.layout')
@section('title')
@section('content')
<div class="w-full md:p-3">
    <div class="bg-white border rounded shadow">
        @include('components.table',
            [
                'columns'=> [
                    'Désignation' => 'name',
                    'promos' => 'discount',
                    'Actions' => [
                        'bundle.edit' => 'edit',
                        'bundle.destroy' => 'delete_forever'
                    ],
                ],
                'create_route' => 'bundle.create',
                'data' => $bundles,
                'model_name' => 'pack',
                'title' => $title,
                'custom_add' => 'Nouveau pack',
            ]
        )
    </div>
</div>
@endsection

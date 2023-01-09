@extends('dashboard.layout')
@section('title',  $title)
@section('content')
    <div class="w-full md:p-3">
        <div class="bg-white border rounded shadow">
            @include('components.table',
                [
                    'columns'=> [
                        'Désignation' => 'name',
                        'Actions' => [
                            'destination.edit' => 'edit',
                            'destination.destroy' => 'delete_forever'
                        ]
                    ],
                    'create_route' => 'destination.create',
                    'data' => $destinations,
                    'model_name' => 'destination',
                    'title' => $title,
                    'custom_add' => 'Nouvelle destinaion',
                ]
            )
        </div>
    </div>
@endsection


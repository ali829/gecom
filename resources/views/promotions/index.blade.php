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
                    'date de debut' => 'start_date',
                    'date de fin' => 'end_date',
                    'Actions' => [
                        'promotion.edit' => 'edit',
                        'promotion.destroy' => 'delete_forever'
                    ],
                ],
                'create_route' => 'promotion.create',
                'data' => $promotions,
                'model_name' => 'promotion',
                'title' => $title,
                'custom_add' => 'Nouvelle promotion',
            ]
        )
    </div>
</div>
@endsection


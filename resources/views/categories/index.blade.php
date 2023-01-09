@extends('dashboard.layout')

@section('title',  $title)

@php
    function getColumns($sous){
        $columns = [
            'Désignation' => 'nom',
            'Description' => 'small_description'
        ];
        if(!$sous){
            $columns['Sous-Categories'] = [
                'list_sub_categorie' => ['sous_categorie']
            ];
        }

        return $columns;
    }

@endphp

@section('content')
    <div class="w-full md:p-3">
        <div class="bg-white border rounded shadow">
            @include('components.table',
                [
                    'columns'=>[
                        'Désignation' => 'nom',
                        'Description' => 'small_description',
                        'Sous Catégories' => 'sous_categorie'
                    ],
                    'create_route' => $sous?['create_sub_categorie', $parent->id]:'categorie.create',
                    'data' => $categories,
                    'model_name' => 'categorie',
                    'custom_add' => $sous?'Nouvelle sous-catégorie':'Nouvelle catégorie',
                    'title' => $title
                ]
            )
        </div>
    </div>
@endsection


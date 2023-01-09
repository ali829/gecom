@extends('dashboard.layout')
@section('title',  $title)
@section('content')

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{$title}}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{route('product.addEntrepot',$id)}}" class="btn btn-sm btn-outline-secondary">
                  <span data-feather="plus-circle"></span>
                  Ajouter
                </a>
        </div>
        </div>
    <div >
        <table class="table table-bordered table-striped">
            <thead>
            <td>Nom Entrepot</td>
            <td>Quantite</td>
            <td>Avertissement</td>
            <td>Actions</td>
            </thead>
            <tbody>
            @forelse($entrepots as $ent)
                <tr>
                    <td>{{$ent->nom}}</td>
                    <td>{{$ent->pivot->quantite}}</td>
                    <td>{{$ent->pivot->avert}}</td>
                    <td>
                    <a title="Supprimer" class="btn btn-light afficher" data-link="{{route('product.destroyEntrepot',[$id,$ent->pivot->id])}}" data-toggle="modal" data-target="#delete"><span data-feather="trash-2"></span></a>
                    </td>
                </tr>
            @empty
            <tr>
             <td colspan="4">Pas d'entrepot.</td>
            </tr>
            @endforelse
            </tbody>

        </table>
        <div>
                Affichage de l’élément  {{$entrepots->firstItem()}} à {{$entrepots->lastItem()}} sur {{$entrepots->total()}} éléments
        </div>
    </div>
    <div class="pagination justify-content-center">
        {{$entrepots->links()}}
      </div>
      @include('components.confirmModal')
@endsection
@section('script')
    <script>
        $('.afficher').click(function(){
            $('#delete_form').attr('action', $(this).data('link'));
        });
    </script>
@endsection

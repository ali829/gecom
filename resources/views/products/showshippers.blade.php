@extends('dashboard.layout')
@section('title',  $title)
@section('content')

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{$title}}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{route('product.addShipper',$id)}}" class="btn btn-sm btn-outline-secondary">
                  <span data-feather="plus-circle"></span>
                  Ajouter
                </a>
        </div>
        </div>
    <div >
        <table class="table table-bordered table-striped">
            <thead>
            <td>Nom Livreur</td>
            <td>Actions</td>
            </thead>
            <tbody>
            @forelse($shippers as $ship)
                <tr>
                    <td>{{$ship->company_name}}</td>
                    <td>
                    <a title="Supprimer" class="btn btn-light afficher" data-link="{{route('product.destroyShipper',[$id,$ship->id])}}" data-toggle="modal" data-target="#delete"><span data-feather="trash-2"></span></a>
                    </td>
                </tr>
            @empty
            <tr>
             <td colspan="2">Pas de livreur.</td>
            </tr>
            @endforelse
            </tbody>

        </table>
        <div>
                Affichage de l’élément  {{$shippers->firstItem()}} à {{$shippers->lastItem()}} sur {{$shippers->total()}} éléments
        </div>
    </div>
    <div class="pagination justify-content-center">
        {{$shippers->links()}}
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

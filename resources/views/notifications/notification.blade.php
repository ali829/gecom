@extends('dashboard.layout')

@section('title',  $title)

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{$title}}</h1>
    </div>

    <div>
        <table class="table table-bordered table-striped">
        <thead>
            <tr>
            <th scope="col">notifications</th>

            </tr>
        </thead>
        <tbody>

                        @forelse ($allnot as $not)
                        @if ($not->read_at)
                        <tr>
                            <td colspan="1">
                                @if ($not->type=="App\Notifications\ProductAvertissment")
                                <a class=" bg-light list-group-item-action" style="padding-top:0.5rem;padding-bottom:0.5rem;"
                                href="{{route('notification.redirect_ent',[$not->id,$not->data['entrepot_id']])}}">
                                <img class="rounded-circle"src="https://images.unsplash.com/photo-1525966222134-fcfa99b8ae77?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="" style="height:43px;width:43px;">
                                la quantite du
                                {{$not->data['product_name']}} est faible dans l'entrepot
                                {{$not->data['entrepot_name']}}</a>
                                @else
                                <a class="dropdown-item bg-light list-group-item-action" style="padding-top:0.5rem;padding-bottom:0.5rem;"
                                href="{{route('notification.redirect_ord',[$not->id,$not->data['order_id']])}}">
                                <img class="rounded-circle" src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="" style="height:43px;width:43px;">
                                nouvelle commande a ete creer</a>
                                @endif
                        
                        </td>
                        </tr>
                        @else
                        <tr>
                            <td>
                                @if ($not->type=="App\Notifications\ProductAvertissment")
                                <a class=" bg-secondary list-group-item-action" style="padding-top:0.5rem;padding-bottom:0.5rem;"
                                href="{{route('notification.redirect_ent',[$not->id,$not->data['entrepot_id']])}}">
                                <img class="rounded-circle" src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="" style="height:43px;width:43px;">
                                 la quantite
                                du {{$not->data['product_name']}} est faible dans l'entrepot
                                {{$not->data['entrepot_name']}} </a>
                                @else
                                <a class="dropdown-item bg-secondary list-group-item-action" style="padding-top:0.5rem;padding-bottom:0.5rem;color:color: #fff;"
                                href="{{route('notification.redirect_ord',[$not->id,$not->data['order_id']])}}">
                                <img class="rounded-circle" src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="" style="height:43px;width:43px;">
                                nouvelle commande a ete creer</a>
                                @endif
                        
                        </td>
                        </tr>
                        @endif
                        @empty
                        <tr>empty.</tr>
                        @endforelse

        </tbody>
        </table>
    </div>
    <div>
        Affichage de l’élément  {{$allnot->firstItem()}} à {{$allnot->lastItem()}} sur {{$allnot->total()}} éléments
    </div>
    <div class="pagination justify-content-center">
        {{$allnot->links()}}
      </div>

@endsection


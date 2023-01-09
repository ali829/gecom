<!doctype html>
<html lang="fr" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Twidlo')</title>
</head>

<body class="d-flex flex-column h-100">
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{route('home')}}">Twidlo</a>

        <ul class="navbar-nav px-3 ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    <span data-feather="bell" style="color:white;"></span><span class="text-danger" id="notcount"
                        class="badge" onclick="readAll()">{{count($notifications->where('read_at',Null))}}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right mt-3 bg-light shadow rounded menu-dialog-scrollable" style="position:absolute">
                        <div class="d-inline-flex p-2 bd-highlight">
                                <h6 class="dropdown-header">notifications</h6>
                            </div>

                        <a href="" onclick="readAll()" class="float-right"style="padding-top:0.6rem;margin-right:0.5rem">marker touts come lu</a>
                    @forelse ($notifications as $not)
                    @if ($not->read_at)
                        @if ($not->type=="App\Notifications\ProductAvertissment")
                            <a class="dropdown-item bg-light list-group-item-action" style="padding-top:0.5rem;padding-bottom:0.5rem;"
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
                    @else
                        @if ($not->type=="App\Notifications\ProductAvertissment")
                            <a class="dropdown-item bg-secondary list-group-item-action" style="padding-top:0.5rem;padding-bottom:0.5rem;color:color: #fff;"
                            href="{{route('notification._ent',[$not->id,$not->data['entrepot_id']])}}">
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
                    @endif
                    @empty
                    empty.
                    @endforelse
                    <div class="d-inline-flex p-2 bd-highlight">
                    <a href="{{route('notification.viewall')}}" class="ml-50">view all</a>
                        </div>
                </div>
            </li>
        </ul>

        <ul class="navbar-nav px-3">
            <li class="nav-item">
                <a class="nav-link" href="#" target="_blank">Mon store</a>
            </li>
        </ul>

        <ul class="navbar-nav px-3">
            <li class="nav-item">
                <a class="nav-link" href="#"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Se
                    déconnecter</a>
                <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    <div class="container-fluid flex-shrink-0 mb-5">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                @include('components.sidebar', [
                'links' => [
                    ['title' => 'Acceuil', 'icon' => 'home', 'route' => route('dashboard')],
                    ['title' => 'acces rapide'],
                    ['title' => 'Catégories', 'icon' => 'tag', 'route' => route('categorie.index')],
                    ['title' => 'Produits', 'icon' => 'shopping-cart', 'route' => route('product.index')],
                    ['title' => 'Clients', 'icon' => 'users', 'route' => route('client.index')],
                    ['title' => 'Commandes', 'icon' => 'book', 'route' => route('order.index')],
                    ['title' => 'Livreurs', 'icon' => 'truck', 'route' => route('shipper.index')],
                    ['title' => 'Destinations', 'icon' => 'navigation', 'route' => route('destination.index')],
                    ['title' => 'Entrepôts', 'icon' => 'layers', 'route' => route('entrepot.index')],
                    ['title' => 'Packs', 'icon' => 'package', 'route' => route('bundle.index')],
                    ['title' => 'parametres', 'icon' => 'settings', 'route' => route('setting.showSetting')],
                ]
                ]);
            </nav>
            <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4">
                <div class="pt-4">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <footer class="footer mt-auto py-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 offset-md-2">
                    <span class="text-muted">Powered By <a href="http://twidlo.com/">Twidlo</a></span>
                </div>
            </div>
        </div>
    </footer>
</body>
<script type="text/javascript" src="{!! asset('js/app.js') !!}"></script>
<script>
    function readAll(e) {
        e.preventDefault();
        $.ajax({
                url: '{{route('notification.readall')}}',
                type: 'GET',
        });
    }
</script>
@include('sweetalert::alert')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
@yield('script')

</html>

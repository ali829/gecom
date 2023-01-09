<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Twidlo')</title>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
</head>

<body class="bg-gray-200">
    <div class="h-screen w-full flex items-start">
        <!-- Sidebar -->
        <div class="grid-sidebar">
            <div id="lgsidebar" class="container-sidebar">
                <data-sidebar></data-sidebar>
            </div>
        </div>

        <!-- sm md sidebar-->
        <div id="mdsidebar" class="fixed trans1 h-full w-64 bg-gray-200 shadow close-menu">
            <div id="hidemenu" class="flex justify-end py-3 px-2">
                <button>
                    <i class="material-icons">
                        close
                    </i>
                </button>
            </div>
            <data-sidebar></data-sidebar>
        </div>


        <div id="container-noscroll" class="grid-body">
            <!--Body -->
            <div class="container-body">
                <!-- Topbar -->
                <div class="flex items-center">
                    <div class="flex items-center w-4/12 lg:w-3/12 mx-1">
                        <!-- icone Show Menu -->
                        <button id="menu" class="focus:outline-none lg:hidden ">
                            <span class="pt-1">
                                <i class="material-icons text-gray-700">
                                    menu
                                </i>
                            </span>
                        </button>
                        <!-- Select Language -->
                        <div class="w-full md:w-2/4 lg:w-1/4 px-3">
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full bg-white border border-gray-200 text-xs text-gray-700 font-bold py-2 px-2 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-300"
                                    id="grid-language">
                                    <option selected="selected">Fr</option>
                                    <option>Eng</option>
                                    <option>Ar</option>
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Searchbar -->
                    <div class="hidden md:w-4/12 md:flex items-center bg-white rounded px-1 mx-1">
                        <span class="pt-1">
                            <i class="material-icons text-gray-700">
                                search
                            </i>
                        </span>
                        <input class="w-full mx-1 py-1 px-2 text-sm rounded" type="text" name="" id=""
                            placeholder="Search">
                    </div>
                    <!-- user slot -->
                    <div id="notif" class="w-8/12 md:w-6/12 lg:w-5/12 flex items-center justify-around md:justify-end py-1 mx-1">
                        <!-- voir Store -->
                        <div class="mx-1 lg:mx-3">
                            <a class="flex items-center" target="_blank"
                            href="{{route('home')}}">
                                <span class="pt-2">
                                    <i class="material-icons text-gray-700 ">
                                        storefront
                                    </i>
                                </span>
                                <span class="hidden lg:flex text-sm font-semibold mx-1">
                                    Mon Store
                                </span>
                            </a>
                        </div>
                        <!-- notification -->
                        <div class="mx-1 relative lg:mx-3">
                            <button class="relative flex items-end" @click="b">
                                <!-- icone -->
                                <span class="pt-1">
                                    <i class="material-icons text-gray-700">
                                        notification_important
                                    </i>
                                </span>
                                <!-- allert red -->
                                <span class="absolute top-0 left-0 w-3 h-3 rounded-full bg-red-700 ">

                                </span>
                                <!-- nombre d'alerte-->
                                <span class=" rounded-full bg-orange-500 text-xs font-bold text-gray-100 p-1">
                                    {{count($notifications->where('read_at',Null))}}
                                </span>
                            </button>
                            <div v-if="showNotif == true" id="notifmenu"
                                class="bg-white rounded shadow-md mt-2 absolute mt-12 top-0 right-0  overflow-auto z-30 ">
                                <ul class="list-reset">
                                    @forelse ($notifications as $not)
                                    @if ($not->read_at)
                                    @if ($not->type=="App\Notifications\ProductAvertissment")
                                    <li>
                                        <a href="{{route('notification.redirect_ent',[$not->id,$not->data['entrepot_id']])}}"
                                            class="text-xs px-4 py-2 w-64 block text-gray-900 bg-white hover:bg-gray-200 no-underline hover:no-underline truncate">
                                            la quantite du
                                            {{$not->data['product_name']}} est faible dans l'entrepot
                                            {{$not->data['entrepot_name']}}
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="border-t  border-gray-400">
                                    </li>
                                    @else
                                    <li>
                                        <a href="{{route('notification.redirect_ord',[$not->id,$not->data['order_id']])}}"
                                            class="text-xs px-4 py-2 w-64 block text-gray-900 bg-white hover:bg-gray-200 no-underline hover:no-underline truncate">
                                            nouvelle commande a ete creer
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="border-t  border-gray-400">
                                    </li>
                                    @endif
                                    @else
                                    @if ($not->type=="App\Notifications\ProductAvertissment")
                                    <li>
                                        <a href="{{route('notification.redirect_ent',[$not->id,$not->data['entrepot_id']])}}"
                                            class="text-xs px-4 py-2 w-64 block text-gray-900 bg-gray-500 hover:bg-gray-200 no-underline hover:no-underline truncate">
                                            la quantite du
                                            {{$not->data['product_name']}} est faible dans l'entrepot
                                            {{$not->data['entrepot_name']}}
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="border-t  border-gray-400">
                                    </li>
                                    @else
                                    <li>
                                        <a href="{{route('notification.redirect_ord',[$not->id,$not->data['order_id']])}}"
                                            class="text-xs px-4 py-2 w-64 block text-gray-900 bg-gray-500 hover:bg-gray-200 no-underline hover:no-underline truncate">
                                            nouvelle commande a ete creer
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="border-t  border-gray-400">
                                    </li>
                                    @endif
                                    @endif
                                    @empty
                                    <li>
                                        <p
                                            class="text-xs px-4 py-2 w-64 block text-gray-900 no-underline hover:no-underline truncate">
                                            Pas de notifications
                                        </p>
                                    </li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <!--compte user -->
                        <div class="flex relative items-center mx-1 lg:mx-3">
                            <button  class="flex items-center focus:outline-none" @click="a">
                                <!-- image user -->
                                <div class="rounded-full border border-gray-500 mx-1">
                                    <img class="object-cover w-10 h-10 rounded-full" src="https://picsum.photos/1920"
                                        alt="">
                                </div>
                                <!-- Nom user -->
                                <span class="hidden lg:flex text-sm mx-1">
                                    {{Auth::guard('admin')->user()->name}}
                                </span>
                                <!-- arrow down -->
                                <span class="pt-2">
                                    <i class="material-icons text-gray-700">
                                        arrow_drop_down
                                    </i>
                                </span>
                            </button>
                            <div id="userMenu" v-if="showUser == true"
                                class="bg-white rounded shadow-md absolute mt-12 top-0 right-0  overflow-auto z-30 ">
                                <ul class="list-reset">
                                    <li>
                                        <a href="#"
                                            class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">
                                            Mon compte
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="border-t mx-2 border-gray-400">
                                    </li>
                                    <li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                            class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">Déconnexion</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Breadcrumbs-->
                <div class="container-breadcrumbs">
                    <a class="lien-breadcrumbs" href="">
                        You Are Here
                        <span>
                            <i class="material-icons pt-2">
                                keyboard_arrow_right
                            </i>
                        </span>
                    </a>
                    <a class="lien-breadcrumbs" href="">
                        You Are Here
                        <span>
                            <i class="material-icons pt-2">
                                keyboard_arrow_right
                            </i>
                        </span>
                    </a>
                    <span class="lien-breadcrumbs-disabled">
                        Dashbord
                    </span>
                </div>
                @yield('content')
            </div>
        </div>
    </div>

    {{-- scripts --}}
    <script type="text/javascript" src="{{asset('js/admin.js')}}"></script>
    @include('sweetalert::alert')
    @yield('script')
    <script>
        var lg = new Vue({
            el: "#lgsidebar"
        })

    </script>
    <script>
        var sm = new Vue({
            el: "#mdsidebar",
        })

    </script>
    <script>
        document.getElementById('menu').addEventListener("click", function () {
            var sidebar = document.getElementById('mdsidebar');
            sidebar.classList.remove("close-menu");
            sidebar.classList.add("open-menu");
            document.body.classList.add("noscroll");
        })
    </script>
    <script>
        document.getElementById('hidemenu').addEventListener("click", function () {
            var s = document.getElementById('mdsidebar');
            s.classList.remove("open-menu");
            document.body.classList.remove("noscroll");
            s.classList.add("close-menu");
        })
    </script>
    <script>
       new Vue({
           el:"#notif",
           data: {
               showUser:false,
               showNotif:false,
           },
           methods: {
               a(){
                   this.showUser = !this.showUser;
               },
               b(){
                   this.showNotif = !this.showNotif;
               }
           },
       })
    </script>
    <script>
        var box = document.querySelector("#userMenu");

        // Detect all clicks on the document
        document.addEventListener("click", function(event) {

            // If user clicks outside the element, hide it!
            box.classList.add("close");
});
    </script>
</body>

</html>

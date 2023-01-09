<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/7d92c4acd3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/node_modules/material-icons/iconfont/material-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/front.css')}}">
    <title>Store
    </title>
    <script src="https://kit.fontawesome.com/7d92c4acd3.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="{{asset('css/slick/slick.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick/slick-theme.css')}}" />
</head>
<body>

 <!-- nav bar    -->
 <div class="hidden md:flex justify-between relative h-12  items-center px-5 nav-bar">
    <!-- logo -->
    <div>
    <a href="{{asset('')}}" class="flex justify-center items-center">
            <img src="{{asset('images/logo.png')}}" alt="" class="h-10">
            <span class="pl-2 text-2xl items-nav">
                Twidlo
            </span>
        </a>
    </div>
    <!-- lien -->
    <div class="items-center flex justify-center">
        <!-- Store  -->
        <div class="flex px-5">
            <a href="{{asset('/')}}" class="items-nav">
                <i class="material-icons text-3xl">
                    store
                </i>
                <p class="px-1">
                    Home
                </p>
            </a>
            <!-- Contact Us  -->
            <a href="{{asset('/contactus')}}" class="items-nav">
                <i class="material-icons text-3xl">
                    textsms
                </i>
                <p class="px-1 ">
                    Contact Us
                </p>
            </a>
        </div>
        <div class="flex px-5">
            <!-- favorite -->
            <a href="" class="items-nav">
                <i class="material-icons text-3xl">
                    favorite
                </i>
            </a>
            <!-- shopping  -->
            <a href="{{asset('/cart')}}" class="items-nav items-star">
                    <span class=" material-icons text-3xl">
                            shopping_cart
                        </span>
                        <span
                            class="-ml-3 rounded-full h-5 w-5 px-1  bg-red-600 uppercase  text-xs text-gray-100 font-medium text-center ">
                            @if (session()->get('cart.items'))
                            {{count(session()->get('cart.items'))}}
                            @else
                                0
                            @endif

                        </span>
            </a>
        </div>
        <div class="items-nav">
            <!-- account  -->
            <a href="{{asset('/connexion')}}" class="items-center flex px-1 ">
                <i class="material-icons text-3xl">
                    account_circle
                </i>
            </a>
        </div>
    </div>
</div>
<!-- responsive nav bar  -->
<div class="flex justify-between md:hidden py-2 px-4 nav-bar">

    <a href="{{asset('/')}}">
        <img src="images/logo.png" alt="" class="h-8">
    </a>
    <div class="flex">
        <div class="items-center flex  px-2">
            <!-- favorite -->
            <a href="" class="items-nav">
                <i class="material-icons text-xl">
                    favorite
                </i>
            </a>
            <!-- shopping  -->
            <a href="{{asset('/cart')}}" class="items-nav-sm ">
                <span class=" material-icons text-xl">
                        shopping_cart
                    </span>
                    <span
                        class="-ml-3 rounded-full h-5 w-5 px-1  bg-red-600 uppercase  text-xs text-gray-100 font-medium text-center ">
                        @if (session()->get('cart.items'))
                            {{count(session()->get('cart.items'))}}
                        @else
                                0
                        @endif
                    </span>
        </a>
        </div>
        <a href="#mySidenav" class="menu">
            <div></div>
            <div></div>
            <div></div>
        </a>
        <div id="mySidenav" class="sidenav absolute text-gray-900 bg-gray-500 z-40">
            <a href="#" class="closebtn">&times;</a>
            <!-- store  -->
            <a href="{{asset('/home')}}" class="items-center flex px-1">
                <i class="material-icons text-xl">
                    store
                </i>
                <p class="px-1">
                    Home
                </p>
            </a>

            <!-- contact us  -->
            <a href="{{asset('/contactus')}}" class="items-center flex px-1">
                <i class="material-icons text-xl">
                    textsms
                </i>
                <p class="px-1 whitespace-no-wrap">
                    Contact Us
                </p>
            </a>
            <!-- account  -->
            <a href="{{asset('/connexion')}}" class="items-center flex px-1">
                <i class="material-icons text-xl">
                    account_circle
                </i>
                <p class="px-1 whitespace-no-wrap">
                    Account
                </p>
            </a>
        </div>

    </div>
</div>
{{-- end of nav bar  --}}

@yield('content')



<!-- border separate  -->
<div class="separator-border">
</div>
<!-- end of border separate  -->

<!-- footer  -->
<div class="py-2  lg:flex justify-between px-4">
    <!-- Site map  -->
    <div class=" py-2 w-1/2 lg:w-1/6 mx-auto lg:mx-0 ">
        <div class="   border-b-2 border-gray-800">
            <p class="font-semibold ">
            Site Map
            </p>
        </div>

        <div class="px-2">
        <a href="{{asset('/')}}" class="link-footer">
                home
        </a>
        <a href="{{asset('/contactus')}}" class="link-footer">
            <p>
                Contact Us
            </p>
        </a>
        <a href="" class="link-footer">
            <p>
                Policy
            </p>
        </a>
        </div>
    </div>
    <!-- end Site map  -->

    <div class=" py-2 w-1/2 lg:w-1/6 mx-auto lg:mx-0 ">
        <div class=" border-b-2 border-gray-800">
            <p class="font-semibold">
            Store
            </p>
        </div>

        <div class="px-2">
        <a href="{{asset('/categories')}}" class="link-footer">
            <p>
                Categories
            </p>
        </a>
    <a href="{{asset('/products')}}" class="link-footer">
            <p>
                Products
            </p>
        </a>
        <a href="{{asset('/connexion')}}" class="link-footer">
            <p>
                My account
            </p>
        </a>
        </div>
    </div>

    <!-- follow us   -->
    <div class="py-2 w-1/2 lg:w-1/6 mx-auto lg:mx-0 ">
        <div class=" border-b-2 border-gray-800">
            <p class="font-semibold">
                follow Us
            </p>
        </div>

        <div class="text-2xl px-2">
        <a href="">
            <i class="fab fa-facebook">
            </i>
        </a>
        <a href="">
            <i class="fab fa-instagram">
            </i>
        </a>
        <a href="">
            <i class="fab fa-twitter">
            </i>
        </a>
        </div>
    </div>
    <!-- end of follow us  -->
    <div class=" py-2 w-1/2 lg:w-1/6 mx-auto lg:mx-0 ">
        <div class=" border-b-2 border-gray-800">
            <p class="font-semibold">
            Here To help
            </p>
        </div>
        <div class="flex py-2">
            <i class="material-icons mr-1">
                phone
            </i>
            <p>
                Tél :
                <span class="hover:underline ">
                    <a  href="" class=" whitespace-no-wrap">
                        {{$setting->tel}}
                    </a>
                </span>
            </p>
        </div>

        <div class="flex py-2">
                <i class="material-icons mr-1">
                    my_location
                </i>
                <p>
                    Adresse :
                    <span class="hover:underline ">
                        <a  href="" class=" ">
                            {{$setting->address}}
                        </a>
                    </span>
                </p>
            </div>

            <div class="flex">
                
                    <i class="material-icons mr-1">
                        email
                    </i>
                    <p>
                        E-mail :
                        <span class="hover:underline ">
                            <a  href="" class=" whitespace-no-wrap">
                                {{$setting->email}}
                            </a>
                        </span>
                    </p>
            </div>
    </div>


    <!-- copy right  -->
    <div class="w-1/2 py-2 mx-auto lg:mx-0 lg:w-1/6 flex items-end">
        <p>
            <span class="text-xs">
                <i class="material-icons text-sm">
                copyright
                </i>
            </span>
            2019-
            <span class="font-bold">
                Store
            </span>
            Powred by
            <span class="text-blue-400 font-semibold">
                <a href="" class="hover:underline">
                    Twidlo
                </a>
            </span>
        </p>
    </div>
    <!-- end of copy right  -->
</div>
<!-- end of footer  -->


<!-- Scripts of slides -->
<script src="{{asset('js/front.js')}}"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="{{asset('css/slick/slick.min.js')}}"></script>
</body>
@yield('script')



        

    

    <!-- slide product sm -->
    <script>
        $('.productslidesm').slick({
            dots: false,
            slidesToShow: 2,
            slidesToScroll: 2,
        });
        $('.productslidesm2').slick({
            dots: false,
            slidesToShow: 2,
            slidesToScroll: 2,
        });
        $('.productslidesm3').slick({
            dots: false,
            slidesToShow: 2,
            slidesToScroll: 2,
        });
        $('.productslidesm4').slick({
            dots: false,
            slidesToShow: 2,
            slidesToScroll: 2,
        });
    </script>
    <!-- slide product sm -->


</html>

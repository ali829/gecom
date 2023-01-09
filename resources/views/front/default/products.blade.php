
@extends('front.default.masterpage')
@section('content')
    {{-- product div  --}}
    <div class="block lg:flex cards mx-auto w-11/12 p-2">
        {{-- left div  --}}
        <div id="pImgs"  class="lg:w-1/2 mx-1">

            <div class=" border border-gray-900 mx-1 my-1">
                <a href="">
                    <img v-bind:src="firstimg" alt="" class="w-full h-full  ">
                </a>
            </div>

            <div class="flex justify-between my-1">
                <div v-for="item in itemsImgs" @mouseover="updateProduct(item.imgsrc)" class="w-1/3 border border-gray-900 mx-1 ">
                    <a href="">
                        <img :src="item.imgsrc" alt="" class="w-full h-full ">
                    </a>
                </div>
            </div>

        </div>



        {{-- end of left div  --}}

        {{-- left div  --}}
        <div class="lg:w-1/2 mx-1 px-1">

            {{-- title  --}}
            <div>
                <p class="text-base md:text-xl">
                    {{$product->name}}
                </p>
            </div>
            {{-- end of title  --}}

            {{-- price nd description  --}}
            <div class="py-4">
                <p class="py-1">
                    {{$product->price}} {{$setting->devise}}
                    <span class="line-through px-1 text-xs md:text-sm">
                        250
                    </span>
                </p>
                <p class="text-xs md:text-sm py1">
                   {{$product->description}}
                </p>
            </div>
            {{-- end of  price nd description  --}}

             {{-- color nd qty  --}}
             <div class="py-2 md:mt-2 lg:mt-0">

                    {{-- colors  --}}
                    <div class="md:w-1/2 lg:w-1/3 flex justify-start lg:px-3 py-3">
                        <span class="whitespace-no-wrap text-sm font-semibold mr-2">
                            Color :
                        </span>
                            <label class="container ">
                                <input type="radio"  name="radio" class="color-input">
                                <span class="checkmark bg-red-500"></span>
                            </label>
                            <label class="container ">
                                <input type="radio" name="radio">
                                <span class="checkmark bg-gray-500"></span>
                            </label>
                            <label class="container ">
                                <input type="radio" name="radio">
                                <span class="checkmark bg-blue-500"></span>
                            </label>
                            <label class="container ">
                                <input type="radio" name="radio">
                                <span class="checkmark bg-yellow-500"></span>
                            </label>
                        </div>
                    {{-- colors  --}}

                    {{-- qty  --}}
                <div class="flex   items-center lg:px-5 py-3 ">
                            <span class="text-sm font-semibold mr-2">
                                    Qte :
                            </span>
                        <div class="flex  items-center">
                                <!-- - -->
                            <button id="minus" class="flex items-center justify-center bg-white h-6 w-6 font-semibold rounded-full focus:outline-none">
                                -
                            </button>

                            <!-- qte label  -->
                            <span>
                                <input id="qte" type="text" name="" id="" class="w-6  lg:w-6 bg-transparent border-b-1 border-blue-1000 focus:outline-none text-center text-sm md:text-lg" value="1" disabled>
                            </span>
                            <!-- + -->
                            <button id="plus" class="flex items-center justify-center bg-white h-6 w-6 rounded-full focus:outline-none">
                                    +
                            </button>
                        </div>
                    </div>
                    {{-- qty  --}}
                </div>
            {{-- end of  color nd qty  --}}

                {{-- fav nd add to bag  --}}
                <div class="flex items-center ">
                    <form action="{{route('cart.addtocart',$product->id)}}" method="post">
                        @csrf
                        <button class="buttons py-2 mx-2">
                            <i class="material-icons text-sm md:text-base">
                                add_shopping_cart
                            </i>
                            <span class="md:pl-1">
                                <p class="whitespace-no-wrap text-xs md:text-sm">
                                    Add To Cart
                                </p>
                            </span>
                        </button>
                    </form>

                        <button class="button-second">
                            <i class="material-icons text-red-600 rounded-full p-2 bg-gray-300 shadow-md">
                                favorite
                            </i>
                        </button>
                    </div>
                    {{-- fav nd add to bag  --}}
        </div>
        {{-- end of left div  --}}
    </div>
    {{-- end of  product div  --}}

    {{-- vide div  --}}
    <!-- tabulation  -->
    <div class=" w-4/5 mx-auto my-10 py-10 rounded-lg border-t border-b border-gray-600">
        <!-- button of tab  -->
        <div class="overflow-hidden px-4 py-2 border-b border-gray-600 ">
            <button  id="tablink2" class="float-left  grand-titre  cursor-pointer p-1 lg:p-2 tab tabhover  focus:outline-none  ">
                Costumer overview
            </button>
            <button id="tablink1" class="grand-titre cursor-pointer   p-1 lg:p-2 tab tabhover   focus:outline-none    " >
                reviews
                <span>(2)</span>
            </button>
        </div>
        <!-- tab content 2 -->
        <div id="tab2" class="block w-11/12 p-10">
               <div>
                    tab content 2
               </div>
        </div >
        {{-- tab content 1  --}}
        <div id="tab1" class="tabcontent">

            <div>
                {{-- rating div  --}}
                <div class="flex justify-star text-base py-4 md:px-10">
                    <p class="font-bold ">
                        Average Rate :
                    </p>
                    <div class="px-2">
                        <button>
                                <i class="material-icons">
                                    star
                                </i>
                        </button>
                        <button>
                                <i class="material-icons">
                                    star
                                </i>
                        </button>
                        <button>
                                <i class="material-icons">
                                    star
                                </i>
                        </button>
                        <button>
                                <i class="material-icons">
                                    star
                                </i>
                        </button>
                        <button>
                                <i class="material-icons">
                                    star
                                </i>
                        </button>
                    </div>
                    <div class="flex">
                        <span>
                            5
                        </span>
                        <p>
                            /
                        </p>
                        <span>
                            5
                        </span>
                    </div>
                </div>
                {{-- rating div  --}}
                {{-- reviews  --}}
                <div class="md:w-11/12 mx-auto py-2">
                    {{-- comment title  --}}
                    <div class="border-b border-gray-900 ">
                        <p>
                           <span>1</span> - <span>3 413</span> Commentaires
                        </p>
                    </div>
                     {{-- comment title  --}}
                </div>
                {{-- reviews  --}}





                @for ($i = 0; $i < 3; $i++)
                <!-- comment  div -->
                <div class=" mx-auto  md:w-5/6 p-1">

                    <div class="content-center flex w-full">
                        <!-- pic div  -->
                        <div>
                                <a href=""  >
                                    <img src="https://picsum.photos/200/300" alt="" class="rounded-full md:mx-auto h-8  w-8 md:h-16 md:w-16">
                                </a>
                                <a href="" class="hidden md:block">
                                    <p class="whitespace-no-wrap hover:underline">
                                        client name
                                    </p>
                                </a>
                        </div>
                        <!-- end of pic div  -->
                        <!-- comment  -->
                        <div class="w-full relative bg-gray-400 mx-2 rounded ">
                            <!-- like dislike and hours  -->
                            <div class="flex justify-between border-b border-gray-900 p-1 ">
                                <!-- hours  -->
                                <div class="text-sm">
                                    <p>
                                        <span>
                                            1
                                        </span>
                                        <span>
                                            Hour
                                        </span>
                                    </p>
                                </div>
                                <!-- end of hours  -->
                                <!-- like dislike  -->
                                <div class="flex">
                                    <div class="items-center px-1">
                                        <button class="px-1">
                                            <i class="material-icons text-base">
                                                thumb_up_alt
                                            </i>
                                        </button>
                                        <span class="text-base">
                                            12
                                        </span>
                                    </div>
                                    <div class="items-center px-1">
                                        <button class="px-1">
                                            <i class="material-icons text-base">
                                                thumb_down_alt
                                            </i>
                                        </button>
                                        <span class="text-base">
                                            10
                                        </span>
                                    </div>
                                </div>
                                <!-- end of  like dislike  -->
                            </div>
                            <!-- like dislike and hours  -->
                            <!-- content comment  -->
                            <div>
                                <p class="hidden md:flex text-xs md:text-sm py-1 px-2 ">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis labore tempore eligendi reiciendis, tempora corporis blanditiis dignissimos autem fugit molestias voluptatibus saepe adipisci perferendis vero eveniet, culpa, sit possimus veritatis.
                                </p>
                                <p class=" text-xs md:text-sm py-1 px-1 md:hidden ">
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis labore tempore eligendi reiciendis, tempora corporis blanditiis...
                                        <span class="text-blue-500 hover:underline">
                                            <button>
                                                Read more >>
                                            </button>
                                        </span>
                                </p>
                            </div>
                            <!-- end of  content comment  -->

                            <div class="hidden md:flex triangle absolute bottom-0 -ml-2 ">

                            </div>
                            <div class=" trianglesm absolute top-0 -ml-2 lg:hidden">

                            </div>
                             {{-- client rate  --}}
                    <div class="px-2 flex  items-center">
                            <i class="material-icons text-xs md:text-sm">
                                star
                            </i>
                            <i class="material-icons text-xs md:text-sm">
                                star
                            </i>
                            <i class="material-icons text-xs md:text-sm">
                                star
                            </i>
                            <i class="material-icons text-xs md:text-sm">
                                star
                            </i>
                            <i class="material-icons text-xs md:text-sm">
                                star
                            </i>
                            <p class="text-xs md:text-sm">
                                <span>
                                    5
                                </span>
                                /
                                <span>
                                    5
                                </span>
                            </p>
                    </div>
                    {{-- end of  client rate  --}}
                        </div>


                    </div>
                    <!-- end of  comment div -->

                </div>
                <!-- end of comment  -->
                @endfor
                </div>

                {{-- pagination  --}}
                <div class="flex justify-center py-2">
                    <ul class="flex items-center">
                        <li >
                            <a href="">
                                <p>
                                    <i class="material-icons">
                                            keyboard_arrow_left
                                    </i>
                                </p>
                            </a>
                        </li>
                        <li class="flex">
                            <a href="" class="hover:underline px-3">
                                <p >
                                    1
                                </p>
                            </a>
                            <a href="" class="hover:underline px-3">
                                <p >
                                    2
                                </p>
                            </a>
                            <a href="" class="hover:underline px-3">
                                <p >
                                    3
                                </p>
                            </a>
                        </li>
                        <li >
                            <a href="" class=" ">
                                <p>
                                    <i class="material-icons">
                                            keyboard_arrow_right
                                    </i>
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
                {{-- end of  pagination  --}}

        </div >
        {{-- tab content 1  --}}
    </div>
    {{-- end of  vide div  --}}
{{-- title  --}}
<div class="lg:w-3/4  mx-auto flex justify-center lg:text-xl items-center p-4">
        <p class=" grand-titre">
            Produits Similaires
        </p>
        <span class="grand-titre-border">

        </span>
</div>
{{-- end of title  --}}


    {{-- product similair  lg--}}
    <div class="hidden lg:block w-11/12 my-4 mx-auto ">
        <!-- row 1  -->
        <div class=" w-3/4 mx-auto flex productslide ">
            @foreach ($products as $pro)
                <!-- col -->
                <div class="product-card animecarte">
                    <!-- first div  -->
                    <div>
                        <a href="">
                            <img src="{{asset('images/products.jpg')}}" alt="" class="h-full w-full">
                        </a>
                        <button class="cursor-pointer favorite">
                            <i id="favicon" class="material-icons product-btn-favorie">
                                favorite_border
                            </i>
                        </button>
                    </div>
                    <!-- first div  -->
                    <!-- second div  -->
                    <div class="px-2">
                        <!-- left    -->
                        <div class=" flex justify-star items-center">
                            <a href="#" class=" overflow-x-hidden">
                                <p class="product-title ">
                                    {{$pro->name}}
                                </p>
                            </a>
                        </div>
                        <!-- end of left    -->
                        <!-- right    -->
                        <div class="flex justify-between py-2">
                            <span>
                                <p class="prix-slot ">
                                    {{$pro->price}}Dhs
                                </p>
                            </span>
                            <a href="">
                                <span class="product-btn-shopping">
                                    <i class="material-icons text-lg ">
                                        add_shopping_cart
                                    </i>
                                </span>
                            </a>
                        </div>
                        <!-- end of right    -->
                    </div>
                    <!-- second div  -->
                </div>
                @endforeach
            </div>
            <!-- end of row 1 lg -->


    </div>
    {{-- product similair lg  --}}
{{-- ------------------------------------------------------------------------ --}}
    {{-- product similair sm  --}}
    <div class="lg:hidden mx-auto w-11/12">
        <!-- row 1  -->
        <div class="mx-8 flex productslidesm ">
            @foreach ($products as $pro)
     <!-- col 1 -->
        <div class=" w-1/2 mx-1 relative  border border-gray-500 animecarte">
            <!-- first div  -->
            <div>
                <a href="">
                <img src="{{asset('images/products.jpg')}}" alt="" class="h-full w-full">
                </a>
                <button class="cursor-pointer favorite">
                    <i id="favicon" class="material-icons sm-btn-favorie">
                        favorite_border
                    </i>
                </button>
            </div>
            <!-- first div  -->
            <!-- second div  -->
            <div class="p-1  bg-gray-100 ">
                <!-- left    -->
                <div>
                    <a href="#" class="overflow-x-hidden">
                        <p class="product-title-sm  ">
                            {{$pro->name}}
                        </p>
                    </a>
                </div>
                <!-- end of left    -->
                <!-- right    -->
                <div class="flex justify-between items-center">
                    <a href="#">
                        <p class="text-xs text-gray-800 font-bold">
                        {{$pro->price}}Dhs
                        </p>
                    </a>
                    <a href="">
                        <span class="sm-shopping-btn">
                            <i class="material-icons text-xs ">
                                add_shopping_cart
                            </i>
                        </span>
                    </a>
                </div>
                <!-- end of right    -->
            </div>
            <!-- second div  -->
        </div>
        <!-- end of col 1 -->
        @endforeach
        </div>


    </div>
    {{-- end of product  similair sm   --}}
@endsection

@section('script')
<!-- tabulation script -->
<script>
        //   tabulation
            document.querySelector('#tablink1').addEventListener("click" , function()
            {
                var tabactive = document.getElementById('tab1');
                tabactive.style.display = "block";
                document.getElementById('tab2').style.display = "none";
                document.querySelector('#tablink1').classList.add('active');
                document.querySelector('#tablink2').classList.remove('active');

            }
            );
            document.querySelector('#tablink2').addEventListener("click" , function()
            {
                var tabactive = document.getElementById('tab2');
                tabactive.style.display = "block";
                document.getElementById('tab1').style.display = "none";
                document.querySelector('#tablink1').classList.remove('active');
                document.querySelector('#tablink2').classList.add('active');

            }
            );


            </script>

            {{-- vue script hover  --}}
            <script>
                var imgouver = new Vue ({
                    el:'#pImgs',
                    data: {
                        firstimg: '{{asset('images/imageId1.jpg')}}',
                        itemsImgs: [
                         {
                            productId: 1,
                            imgsrc: '{{asset('images/imageId1.jpg')}}'
                         },
                         {
                            productId: 3,
                            imgsrc: '{{asset('images/imageId2.jpg')}}'
                         },
                         {
                            productId: 3,
                            imgsrc: '{{asset('images/imageId3.jpg')}}'
                         }
                    ]
                    },
                    methods: {
                        updateProduct(imgsrc)
                        {
                            this.firstimg = imgsrc
                        }
                    }
                })
                </script>
                {{-- vue script hover  --}}


                {{-- qty script  --}}
        <script>
            // plus
        document.getElementById('plus').addEventListener("click" , function(){
            var q ;
            qte.value = parseInt(qte.value) + 1;
            q = qte.value;
        });
        //minus
        document.getElementById('minus').addEventListener("click" , function(){
        var q ;
        var qte = document.getElementById('qte');
        qte.value = parseInt(qte.value) - 1;
        q = qte.value;
        if(qte.value <= 0)
        {
            qte.value = 0;
        }
        });
        </script>
        {{-- end of sty script  --}}

        {{-- slide lg script  --}}
        <script>
        $('.productslide').slick({
        prevArrow: '.prevlg',
        nextArrow: '.nextlg',
        dots: false,
        autoplay: true,
        slidesToShow: 4,
        slidesToScroll: 2,
    });
        </script>
        {{-- slide lg script  --}}
@endsection

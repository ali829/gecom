@extends('front.default.masterpage')
@section('content')
<div id="content">
    <!-- top carroussel  -->
    <div class="relative">
        <div class="topcaroussel">
            @for ($i = 0; $i < 3; $i++) <div>
                <a href="">
                <img src="{{asset('/images/caroussel.jpg')}}" alt="">
                </a>
        </div>
        @endfor
    </div>
    <span class="topnext cursor-pointer right-0 -mt-21 md:-mt-33 lg:-mt-56 xl:-mt-72 mx-3 absolute">
        <i class="material-icons hidden lg:block iconenext lg:text-3xl text-gray-800">
            arrow_drop_down_circle
        </i>
    </span>
    <span class="topprev cursor-pointer left-0 -mt-21  md:-mt-33 lg:-mt-56 xl:-mt-72 mx-3  absolute">
        <i class="material-icons hidden lg:block iconeprev lg:text-3xl text-gray-800">
            arrow_drop_down_circle
        </i>
    </span>
    </div>
    <!-- top carroussel  -->
    <!-- wtp and card icon  -->
    <div class="fixed z-10  right-0 px-4">
        <div>
            <button>
                <i
                    class="fab fa-whatsapp rounded-full shadow-lg m-2  text-center py-1 lg:py-3 text-2xl text-gray-100 bg-green-600 h-8 w-8 lg:h-12 lg:w-12">

                </i>
            </button>
        </div>
    </div>
    <!-- end of wtp and card icon  -->

    <!-- msnger icon  -->
    <div class="fixed z-10 left-0 px-4">
        <a href="">
            <i
                class="fab fa-facebook-messenger rounded-full shadow-lg m-2  text-center py-2 lg:py-3 lg:text-2xl text-gray-100 bg-blue-600 h-8 w-8 lg:h-12 lg:w-12">

            </i>
        </a>
    </div>
    <!-- end of msnger icon  -->

    <!-- title  -->
    <div class="lg:w-3/4  mx-auto flex justify-center lg:text-xl items-center p-4">
        <p class="grand-titre">
            Catégorie
        </p>
        <span class="grand-titre-border">

        </span>
    </div>
    <div class="relative lg:w-11/12 flex justify-center mx-auto items-start">
        <!-- left div -->
        <div id="cat" class=" hidden h-64 overflow-y-scroll scroller lg:block category-slot">
            <!-- categorie 1  -->
            <div v-for="categorie in categories">
                <div class="accordion " v-if="categorie.children.length > 0">
                    <button class="p-2 w-full  btn text-left text-lg font-semibold" @click="currentQ = categorie"
                        :class="{visubcolor : currentQ == categorie}">
                        <a :href="'/categorie/'+categorie.id">
                            <span v-text="categorie.nom"></span>
                        </a>
                        <i class="material-icons float-right" :class="{visubarrow : currentQ == categorie}">
                            expand_more
                        </i>
                    </button>
                    <div class="bg-gray-200 text-gray-900  py-2" :class="{visub : currentQ == categorie}">
                        <a v-for="scat in categorie.children" :href="'/categorie/'+scat.id"
                            class=" w-full block text-left pl-4 font-semibold" v-text="scat.nom">
                        </a>
                    </div>
                </div>
                <div v-else>
                    <button class="p-2 w-full  btn text-left text-lg font-semibold">

                        <a :href="'/categorie/'+categorie.id" class="w-full">
                            <span v-text="categorie.nom"></span>
                        </a>

                    </button>
                </div>
            </div>
        </div>
        <!--end of left div -->
        <!-- right div  Sm -->
        <div class="w-4/5 relative lg:hidden">
            <div class="flex justify-center  Smcatslide  mx-auto px-8 ">
                @foreach ($categories as $cat)

                <div class="w-1/3 lg:w-1/4 mx-2">
                    <a href="{{route('front.categories',$cat)}}">
                        <p class="grand-titre-sm md:text-xl">
                            {{$cat->nom}}
                        </p>
                    <img src="{{asset('images/categories.jpg')}}" alt="" class="w-full h-full">
                    </a>
                </div>
                @endforeach

            </div>
            <span class="prev cursor-pointer absolute left-0 -mt-16  px-4">
                <i class="material-icons buttons ">
                    arrow_back_ios
                </i>
            </span>
            <span class="next cursor-pointer  absolute right-0  -mt-16  px-2">
                <i class="material-icons buttons">
                    arrow_forward_ios
                </i>
            </span>
            <!--end of right div sm  -->
        </div>
        <!-- right div  lg -->
        <div class="hidden lg:block w-4/5 relative">
            <div class="flex justify-center  catslide  mx-auto px-8 ">
                @foreach ($categories as $cat)
                <div class="w-1/3 mx-2">
                    <a href="{{route('front.categories',$cat)}}">
                        <p class="text-center grand-titre  ">
                            {{$cat->nom}}
                        </p>
                    <img src="{{asset('images/categories.jpg')}}" alt="" class="w-full h-full">
                    </a>
                </div>
                @endforeach
            </div>
            <span class="prev1 cursor-pointer  absolute left-0 -mt-16 ml-1 md:-mt-24 lg:-mt-40 xl:-mt-52 ">
                <i class="material-icons  buttons">
                    arrow_back_ios
                </i>
            </span>
            <span class="next1 cursor-pointer  absolute right-0 -mt-16 mr-1 md:-mt-24 lg:-mt-40 xl:-mt-52 ">
                <i class="material-icons buttons">
                    arrow_forward_ios
                </i>
            </span>
            <!--end of right div  -->
        </div>
    </div>
    <!-- product div  -->
    <div>
        <!-- title div  -->
        <div class="lg:w-3/4  mx-auto flex justify-center lg:text-xl items-center p-4">
            <p class="grand-titre">
                Produit
            </p>
            <span class="grand-titre-border">

            </span>
        </div>
        <!-- end of title div  -->
        <!-- content div  -->
        <div class="lg:flex justify-center  w-11/12 mx-auto my-4">
            <!-- publication   -->
            <div class="mx-auto lg:mx-0 lg:w-1/5 flex lg:block">
                @for ($i = 0; $i < 4; $i++) <div class="px-1 lg:py-1">
                    <a href="">
                    <img src="{{asset('images/publication.jpg')}}" alt="" class="w-full h-full">
                    </a>
            </div>
            @endfor
        </div>
        <!-- end of publication  -->
        @php
            $islide = 0;
        @endphp
        <!-- product pics lg  -->
        <div class="w-3/4 hidden lg:block ">
            @for ($i = 0; $i < 4; $i++) {{-- full row  --}} <div class="w-full">
                <div class="lg:w-3/4  mx-auto flex justify-center lg:text-xl items-center p-4">
                    <p class="grand-titre">
                        Produits title
                    </p>
                    <span class="grand-titre-border">
                    </span>
                </div>
            <span  class="prevlg-{{$islide}} cursor-pointer  absolute mt-24  ml-10   xl:mt-32 iconeprev buttons">
                    <i class="material-icons">
                        arrow_drop_down_circle
                    </i>
                </span>
            <span  class="nextlg-{{$islide}} cursor-pointer absolute mt-24 right-0 mr-32 xl:mt-32  iconenext buttons">
                    <i class="material-icons ">
                        arrow_drop_down_circle
                    </i>
                </span>

                <!-- row 1  -->


            <div  class="productslide-{{$islide++}} mx-16 mb-16   ">
                    @foreach ($products as $pro)
                    <!-- col -->
                    <div class="product-card animecarte">
                        <!-- first div  -->
                        <div>
                            <a href="{{route('front.products',$pro->id)}}">
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
                            <div class=" flex justify-star items-center overflow-x-hidden">
                            <a href="{{route('front.products',$pro->id)}}">
                                    <p class="product-title  ">
                                        {{$pro->name}}
                                    </p>
                                </a>
                            </div>
                            <!-- end of left    -->
                            <!-- right    -->
                            <div class="flex justify-between py-2">
                                <span>
                                    <p class="prix-slot ">
                                        {{$pro->price}} {{$setting->devise}}
                                    </p>
                                </span>

                                    <a href="{{route('front.validation',$pro->id)}}" class="product-btn-shopping">
                                        <i class="material-icons text-lg ">
                                            add_shopping_cart
                                        </i>
                                    </a>


                            </div>
                            <!-- end of right    -->
                        </div>
                        <!-- second div  -->
                    </div>
                    @endforeach
                </div>
                <!-- end of row 1  -->

        </div>
        {{--end of full row  --}}
        @endfor
    </div>
    <!-- end of  product pics lg -->

    <!-- ----------------------------------------------------------------------------- -->

    <!-- product pics sm  -->
    <div class=" mx-auto   lg:hidden  ">

        @for ($i = 0; $i < 4; $i++) <div class="flex justify-center py-2 lg:text-xl items-center px-4">
            <p class="grand-titre">
                Produits title
            </p>
            <span class="border-b border-4 border-gray-900 w-full mx-4">
            </span>
    </div>
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
                <div class="overflow-x-hidden">
                    <a href="#">
                        <p class="product-title-sm">
                            {{$pro->name}}
                        </p>
                    </a>
                </div>
                <!-- end of left    -->
                <!-- right    -->
                <div class="flex justify-between items-center">
                    <a href="#">
                        <p class="text-xs text-gray-800 font-bold">
                            {{$pro->price}} {{$setting->devise}}
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
    @endfor
    </div>

    </div>
    <!-- end of  product pics sm -->
    </div>
    <!-- end of content div  -->
    </div>
    <!-- end of product div  -->
    <!-- newsletter  -->
    <div class="py-4 news-div">
        <!-- title  -->
        <div class=" text-center grand-titre text-gray-200 py-3">
            <p>
                NewsLetter
            </p>
        </div>
        <!-- end of title  -->
        {{-- paragrape  --}}
        <div class="text-center text-sm text-gray-100 py-3">
            <p>
                Sign up for Shella updates to receive information about new arrivals, future events and specials
            </p>
        </div>
        {{-- paragrape  --}}
        <!-- form  -->
        <div class="mx-auto flex justify-center py-5">
            <input type="email" name="" id="" class="mx-2 bg-transparent border-b border-gray-100 placeholder-gray-100"
                placeholder="Your E-mail">
            <button class="buttons ">
                Subscribe
            </button>
        </div>
        <!-- form  -->
    </div>
    <!-- end of newsletter  -->
</div>

<div class="loader w-full h-screen absolute top-0 left-0 flex justify-center items-center" >
    <span class="w-3 lg:w-6 h-32 lg:h-56 mx-1 lg:mx-4 rounded-t-full rounded-b-full">  </span>
    <span class="w-3 lg:w-6 h-32 lg:h-56 mx-1 lg:mx-4 rounded-t-full rounded-b-full">  </span>
    <span class="w-3 lg:w-6 h-32 lg:h-56 mx-1 lg:mx-4 rounded-t-full rounded-b-full">  </span>
    <span class="w-3 lg:w-6 h-32 lg:h-56 mx-1 lg:mx-4 rounded-t-full rounded-b-full">  </span>
    <span class="w-3 lg:w-6 h-32 lg:h-56 mx-1 lg:mx-4 rounded-t-full rounded-b-full">  </span>
    <span class="w-3 lg:w-6 h-32 lg:h-56 mx-1 lg:mx-4 rounded-t-full rounded-b-full">  </span>
</div>
@endsection

@section('script')
<!-- script  categorie slide  -->
<script>
    $('.catslide').slick({
        prevArrow: '.prev1',
        nextArrow: '.next1',
        dots: true,
        slidesToShow: 4,
        slidesToScroll: 2,
        autoplay: true,
        autoplaySpeed: 4000,
    });
    $('.Smcatslide').slick({
        prevArrow: '.prev',
        nextArrow: '.next',
        dots: false,
        slidesToShow: 2,
        slidesToScroll: 2,
        autoplay: true,
        autoplaySpeed: 4000,
    });

</script>
<!--end of script  categorie slide  -->
<!-- categorie script  -->
<script>
    new Vue({
        el: '#cat',
        data: {
            categories: {!!$categories!!},
            active: 'sub',
            currentQ: -1
        }
    });
</script>
<!-- script  categorie slide  -->
<script>
    $('.catslide').slick({
        prevArrow: '.prev1',
        nextArrow: '.next1',
        dots: false,
        slidesToShow: 4,
        slidesToScroll: 2,
        autoplay: true,
        autoplaySpeed: 4000,
    });
    $('.Smcatslide').slick({
        prevArrow: '.prev',
        nextArrow: '.next',
        dots: false,
        slidesToShow: 2,
        slidesToScroll: 2,
        autoplay: true,
        autoplaySpeed: 4000,
    });

</script>
<!--end of script  categorie slide  -->

<!-- top carroussel script -->
<script>
    $('.topcaroussel').slick({
        prevArrow: '.topprev',
        nextArrow: '.topnext',
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        autoplay: true,
        autoplaySpeed: 8000,
    });

</script>
<!--end of top carroussel script -->
<!-- slide product lg-->
<script>
     @for ($i = 0; $i < $islide; $i++)
    $('.productslide-{{$i}}').slick({
        prevArrow: '.prevlg-{{$i}}',
        nextArrow: '.nextlg-{{$i}}',
        dots: false,
        slidesToShow: 4,
        slidesToScroll: 2,
    });
    @endfor
</script>
<!-- slide product lg-->

{{-- loader script  --}}
<script>



(function() {
   document.querySelector('#content').style.visibility = 'visible';

document.querySelector('.loader').style.visibility = 'hidden';
})();
</script>
{{-- loader script  --}}
@endsection

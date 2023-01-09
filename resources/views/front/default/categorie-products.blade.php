@extends('front.default.masterpage')
@section('content')

{{-- globale div  --}}
<div class="lg:flex justify-center px-2 lg:px-0 py-16">
    {{-- left div  --}}
    <div class="p-4 border-b flex lg:w-1/5 lg:border-b-0  lg:border-r lg:block border-gray-900">
        @for ($i = 0; $i < 4; $i++)
        <div class="px-1 lg:py-1">
            <a href="">
            <img src="{{asset('images/publication.jpg')}}" alt="" class="w-full h-full">
            </a>
        </div>
         @endfor

    </div>
{{-- end of left div  --}}

{{-- right div  --}}
<div class="lg:w-4/5 ">

    {{-- top div  --}}
    <div id="subcategorie">
        {{-- title  --}}
        <div class="lg:w-3/4  mx-auto flex justify-center lg:text-xl items-center p-4">
            <p class="grand-titre">
               Sub-Catégorie
            </p>
            <span class="grand-titre-border">

            </span>
        </div>
        {{-- end of title  --}}

        {{-- categori --}}
        <div class="w-full">

            {{-- select list  --}}
            <div class="relative w-1/2 md:w-1/4 mx-auto">
                <select
                    class="block appearance-none w-full  border-b border-gray-900 text-gray-700 py-3 px-4 pr-8   focus:outline-none  focus:border-gray-500 items-center"
                    id="grid-cat ">
                    @foreach ($categories as $cat)
                    <option class="text-sm -p-1 lg:p-1">{{$cat->nom}}</option>
                    @endforeach
                </select>
                <div
                    class=" pointer-events-none rounded-full h-8 w-8 flex justify-center  bg-gray-100 absolute top-0 right-0 flex items-center px-2 text-gray-700 mt-2">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                </div>
            </div>
            {{-- end of  select list  --}}

            {{-- pics list  --}}
            <div class="flex justify-center px-3 py-10">
                @forelse ($childrens as $child)
                <div class="w-1/6  animecarte px-1 grand-titre-sm md:grand-titre  text-center">
                    <p>
                        {{$child->nom}}
                    </p>
                    <a href="">
                    <img src="{{asset('images/subcat.jpg')}}" alt="">
                    </a>
                </div>
                @empty
                    <div class="text-center">
                        <i class="material-icons empty-cat-icon">
                            category
                        </i>
                        <p class="grand-titre">
                            this Category have no sub-categories
                        </p>
                    </div>
                @endforelse

            </div>
            {{-- end of  spics list  --}}

    </div>
    {{-- end of categori --}}
</div>
{{-- end of top div  --}}

{{-- bottom div  --}}
<div class="md:px-4">
    {{-- title  --}}
    <div class="lg:w-3/4  mx-auto flex justify-center lg:text-xl items-center p-4">
        <p class="grand-titre">
            Produits
        </p>
        <span class="grand-titre-border">

        </span>
    </div>
    {{-- end of title  --}}

    {{-- pructs div  --}}

    {{-- row1  --}}
    <div class="lg:w-11/12 lg:flex justify-start flex-wrap mx-auto py-2 lg:pl-20">
        @foreach ($products as $pro)

         {{-- cart  --}} <div class="cards lg:w-2/5   lg:m-4 ">

            {{-- left div  --}}
            <div class="w-1/2 flex items-center cartslide rounded px-2 py-4 lg:px-1">
                @for ($j = 0; $j < 3; $j++) <a href="">
                <img src="{{asset('images/product-cat.jpg')}}" alt="" class="w-full h-full rounded">
                    </a>

                    @endfor
            </div>
            {{-- end of  left div  --}}

            {{-- right div  --}}

            <div class="w-1/2 p-1 md:mt-2 lg:mt-0">
                {{-- title  --}}
                <div>
                    <p class="font-semibold overflow-x-hidden">
                        {{$pro->name}}
                    </p>
                    <p class="font-semibold text-lg">
                        {{$pro->price}} {{$setting->devise}}
                        <span class="px-1 line-through text-xs md:text-sm">
                            250
                        </span>
                    </p>
                </div>
                {{-- title  --}}

                {{-- color nd qty  --}}
                <div class="py-2 md:mt-2 lg:mt-0">

                    {{-- colors  --}}
                    <div class="md:w-1/2 lg:w-full flex justify-start lg:px-3 py-3">
                        <span class="whitespace-no-wrap text-sm font-semibold mr-2">
                            Color :
                        </span>
                        <label class="container ">
                            <input type="radio" name="radio" class="color-input">
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
                            <button id="minus"
                                class="flex items-center justify-center bg-white h-6 w-6 font-semibold rounded-full focus:outline-none">
                                -
                            </button>

                            <!-- qte label  -->
                            <span>
                                <input id="qte" type="text" name="" id=""
                                    class="w-6  lg:w-6 bg-transparent border-b-1 border-blue-1000 focus:outline-none text-center text-sm md:text-lg"
                                    value="1" disabled>
                            </span>
                            <!-- + -->
                            <button id="plus"
                                class="flex items-center justify-center bg-white h-6 w-6 rounded-full focus:outline-none">
                                +
                            </button>
                        </div>
                    </div>
                    {{-- qty  --}}
                </div>
                {{-- end of  color nd qty  --}}

                {{-- fav nd add to bag  --}}
                <div class="flex justify-end">
                    <button class="buttons mx-2">
                        <i class="material-icons text-sm md:text-base ">
                            add_shopping_cart
                        </i>
                    </button>

                    <button class="buttons-second ">
                        <i class="material-icons text-red-600 text-sm md:text-base">
                            favorite
                        </i>
                    </button>

                </div>
                {{-- fav nd add to bag  --}}
            </div>
            {{-- end of  right div  --}}
    </div>

    {{-- end of first cart  --}}
   @endforeach


</div>
{{-- end of  row1  --}}


{{-- end of  pructs div  --}}
{{-- pagination div --}}
<div id="pagination" class="flex justify-center Items-center">

    <button class="Items-center mx-2  focus:outline-none" @click="minuspaginatio">
        <i class="material-icons arrows-pagination">
            arrow_left
        </i>
    </button>
            <input type="button" class="items-pagination " v-for=" (n, i) in index" :value="n" @click="currentQ = i" :class="{ 'active-pagination'  : currentQ == i} ">
    <button @click="addpaginatio()" class="Items-center mx-2  focus:outline-none">
        <i class="material-icons arrows-pagination ">
            arrow_right
        </i>
    </button>

</div>
{{-- pagination div --}}
</div>
{{-- end of bottom div  --}}

</div>
{{-- end of right div  --}}

</div>
{{-- globale div  --}}

@endsection



@section('script')
{{-- product slide  --}}
<script>
    $('.cartslide').slick({
        arrows: false,
        dots: true,
        autoplay: true,
        slidesToShow: 1,
        slidesToScroll: 1,
    });

</script>
{{-- product slide  --}}

{{-- pagination script  --}}
<script>
 new Vue({
        el: '#pagination',
        data: {
            index: 4,
            active: 'active-pagination',
            currentQ: 0
        }
        ,methods: {
        addpaginatio: function()
        {
            if(this.currentQ < this.index-1)
            {
                return this.currentQ += 1 ;
            }else{
                return this.currentQ = 0;
            }

        },
        minuspaginatio: function()
        {
            if(this.currentQ > 0)
            {
                return this.currentQ -= 1 ;
            }else{
                return this.currentQ = 0;
            }

        }
    },
    })
</script>
{{-- pagination script  --}}


@endsection

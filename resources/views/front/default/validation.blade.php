@extends('front.default.masterpage')
@section('content')
{{-- validation  --}}
{{-- title  --}}
<div class="lg:w-3/4  mx-auto flex justify-center lg:text-xl items-center p-4">
    <p class="grand-titre">
        Validation d'ajout au panier
    </p>
    <span class="grand-titre-border">

    </span>
</div>
{{-- end of title  --}}
<form action="{{route('cart.addtocart',$product->id)}}" method="post">
<div class="w-11/12 md:w-2/3 mx-auto md:flex items-center">

    {{--  cart  --}}
    <div class="flex justify-center  mx-auto lg:w-2/3 cards  lg:my-0  ">

        {{-- left div  --}}
        <div class="w-1/2 flex items-center  rounded px-2 py-4 lg:px-1">
            <a href="">
                <img src="https://picsum.photos/seed/picsum/400/200" alt="" class="w-full h-full rounded">
            </a>
        </div>
        {{-- end of  left div  --}}

        {{-- right div  --}}

        <div class="w-1/2 p-1 md:mt-2 lg:mt-0 ">
            {{-- title  --}}
            <div class="text-sm md:text-lg">
                <p>
                    {{$product->name}}
                </p>
                <p>
                    {{$product->price}} {{$setting->devise}}
                    <span class="px-1 line-through text-xs md:text-sm">
                        {{$product->price+1}} {{$setting->devise}}
                    </span>
                </p>
            </div>
            {{-- title  --}}

            {{-- color nd qty  --}}
            <div class="py-2 md:mt-2 lg:mt-0">

                {{-- colors  --}}
                <div class=" flex justify-center  lg:px-5 pb-1">
                    <span class="pr-1 text-sm md:text-lg">
                        Color:
                    </span>
                    <label class="container ">
                        <input type="radio" name="radio">
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
                <div class="flex   items-center lg:px-5  ">
                    <span>
                        <p class=" pr-1 text-sm md:text-lg">
                            Quantity:
                        </p>
                    </span>

                        <div id="input">
                        <number-input name="qte" v-model="qty" :min="{{$product->qte_min}}" size="small"   :max="{{$product->qte_max}}" inline center controls rounded ></number-input>
                        </div>

                </div>
                {{-- qty  --}}
            </div>
            {{-- end of  color nd qty  --}}
        </div>
        {{-- end of  right div  --}}

    </div>
    {{-- validation button  --}}
    <div class="w-1/6 md:mt-2 lg:mt-0 flex jutifiy-center">
            @csrf
            <input name="id" type="hidden" value="{{$product->id}}">
            <button class="buttons">
                <i class="material-icons btn-icon">
                    done
                </i>
                Valider
            </button>
            <button class="buttons-second border border-gray-600 mx-1">
                <i class="material-icons btn-icon">
                    clear
                </i>
                Cancel
            </button>
        </div>
        {{-- end of validation button  --}}
        {{-- end of first cart  --}}
    </div>
    {{-- end of  validation  --}}
</form>

    {{-- title  --}}
<div class="lg:w-3/4  mx-auto flex justify-center lg:text-xl items-center p-4">
    <p class=" grand-titre">
        Pensez apprendre le pack
    </p>
    <span class="grand-titre-border">

    </span>
</div>
{{-- end of title  --}}
{{-- pack div  --}}
<div class="p-1 block mb-12 w-11/12 cards rounded items-center lg:flex justify-between mx-auto">
    <div class="lg:w-2/3 flex justify-center">
        @for ($i = 0; $i < 3; $i++) <div class="my-2 md:my-0 md:w-1/3 border border-gray-900 rounded mx-1">
            <a href="">
                <img src="https://picsum.photos/seed/picsum/300" alt="" class="w-full h-full object-cover">
            </a>
    </div>
    @endfor
</div>

<div class="lg:flex lg:w-1/3">
    <div
        class="mx-auto  w-3/4 lg:mx-2 my-2 lg:my-0 lg:border-l border-b border-t lg:border-b-0 lg:border-t-0 lg:border-r px-2  border-gray-700">
        <div class=" border-b-4  border-gray-700">
            <div class="flex justify-between py-2">
                <p class="font-bold">
                    Pack :
                </p>

            </div>
            @for ($j = 0; $j < $i; $j++) <div class="flex justify-between py-2 px-4">
                <p class="prix-slot">
                    title
                </p>
                <p class="prix-slot">
                    <span>
                        200
                    </span>
                    <span>
                        Dhs
                    </span>
                </p>
        </div>
        @endfor


    </div>

    <div class="flex justify-between my-3">
        <p class="total-slot">
            Total
        </p>
        <p class="total-slot">
            <span>
                600
            </span>
            <span>
                Dhs
            </span>
        </p>
    </div>
</div>
{{-- validation button  --}}
<div class=" flex items-center justify-center mx-auto w-1/4">

        <button class="buttons">
            <i class="btn-icon material-icons">
                done
            </i>
            Valider
        </button>

</div>
{{-- end of validation button  --}}
</div>
</div>
{{-- end of pack div  --}}
@endsection
@section('script')
    <script>
        new Vue({
            el: '#input',
            data() {
                return {
                    idProduct: {{$product->id}},
                    qty : {{$product->qte_min}}
                }
            }
        })
    </script>
@endsection

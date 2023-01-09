@extends('front.default.masterpage')
@section('content')
{{-- content car --}}
<div class="py-20">
    {{-- title  --}}
    <div class="lg:w-4/5  mx-auto flex justify-center lg:text-xl items-center p-4">
        <p class=" grand-titre">
            Cart (
            <span>
                @if (session()->get('cart.items'))
                {{count(session()->get('cart.items'))}}
                @else
                0
                @endif
            </span>)
        </p>
        <span class="grand-titre-border">

        </span>
    </div>
    {{-- end of title  --}}
    @php
        $counter = 0;
    @endphp
    @forelse ($items as $item)

    <div class="lg:w-3/4 py-2 px-2  mx-auto flex items-center border-b-2  border-gray-800">
        {{-- pic of product  --}}
        <div class="w-1/6">
            <a href="{{route('front.products', $item['id'])}}">
            <img src="{{asset('images/cart.jpg')}}" alt="" class="border border-gray-900">
            </a>
        </div>
        {{-- end  pic of product  --}}

        {{-- product title  --}}
        <div class="w-1/6  text-center md:border-l border-gray-800 ">
        <a href="{{route('front.products', $item['id'])}}">
                <p class="product-title">
                    {{$item['name']}}
                </p>
            </a>
        </div>
        {{--end of product title  --}}
        {{-- color  --}}
        <div class="w-1/6 flex justify-center items-center md:border-l border-gray-800 ">
            <div class="w-5 h-5 mx-1 rounded-full bg-red-700">

            </div>
        </div>
        {{-- end of  color  --}}
        {{-- qty  --}}
        <div class="w-1/6 text-center flex px-2   items-center  md:border-l border-gray-800 ">
        <div id="input-{{$counter}}">
        <number-input v-model="qty" :min="{{$item['product']->qte_min}}" size="small" @change="change"  :max="{{$item['product']->qte_max}}"      inline center controls rounded ></number-input>
        </div>
        </div>
        {{-- end of qty  --}}

        {{-- prix unitaire  --}}
        <div class="w-1/3 text-center md:border-l-2 border-gray-800">
            <p class="text-gray-500">
                price :
                <span class=" product-title">
                    {{$item['price']}} {{$setting->devise}}
                </span>
            </p>
        </div>
        {{-- end of prix unitaire  --}}
        {{-- total  --}}
        <div class="w-1/3 text-center md:border-l-2 border-gray-800">
            <p class="text-gray-500">
                Total :
                <span class=" product-title">
                    <span id="toto-{{$counter++}}">{{$item['price']*$item['qte']}}</span> {{$setting->devise}}
                </span>
            </p>
        </div>
        {{-- end of total  --}}
        {{-- annuler  --}}

        <div class="w-1/6 flex items-center justify-center md:border-l border-gray-800">
            <form action="{{route('cart.remove',$item['id'])}}" method="POST">
                @csrf
                <input type="submit" class="buttons" value="delete">
            </form>

        </div>
        {{-- annuler  --}}
    </div>
    @empty
    <div>
        <img src="{{asset('images/emptycart.svg')}}" alt="" class="w-1/3 mx-auto ">
        <p class="grand-titre text-center">Your Shopping Cart is empty</p>
        <span class="flex items-center justify-center text-xs  py-10">
            <a href="{{route('front.categories')}}">
                <p class="label-form hover:underline">
                    Take a look to our Categories
                </p>
            </a>
            <p class="mx-1"> Or </p>
            <a href="{{route('front.cnx')}}">
                <p class="label-form hover:underline">
                    log in
                </p>
            </a>
            <p class="mx-1">To see products added .</p>
        </span>
    </div>
    @endforelse
    {{-- valider  --}}
            @if (count($items)> 0)
            <div class="lg:w-2/3 my-4 lg:flex justify-end">
                <div class="lg:w-1/4 px-8  border-t-2 border-b-2  border-gray-800    ">
                    <div class="flex justify-between my-1">
                        <p>Total :</p>
                        <p>
                            <span id="subtotal">
                                {{$total}}
                            </span>
                            {{$setting->devise}}
                        </p>
                  </div>
                <form action="{{route('front.order-step1')}}" >
                    <button class="buttons mx-auto my-1">
                       <i class="material-icons btn-icon">
                            check
                        </i>
                       <p>
                           valider
                       </p>
                     </button>
                </form>
             </div>
             </div>
            @else
           @endif
             {{-- valider  --}}
</div>
{{-- end of content car --}}
@endsection
@section('script')<script>
    {{-- qty script  --}}
    @for ($i = 0; $i < $counter; $i++)

        new Vue({
            el: '#input-{{$i}}',
            data() {
                return {
                    idProduct: {{$items[$i]['id']}},
                    qty : {{$items[$i]['qte']}},
                }
            },
            methods: {
                change(n, o) {
                    if(!Number.isNaN(o)){
                        axios.post('/addtocart/' + this.idProduct, {"qte": n})
                            .then(res => {
                                document.getElementById('toto-{{$i}}').innerHTML = res.data.product.price * n
                                document.getElementById('subtotal').innerHTML = res.data.total
                            })
                            .catch();
                    }

                }
            },
        })

    @endfor</script>
    {{-- end of sty script  --}}
@endsection

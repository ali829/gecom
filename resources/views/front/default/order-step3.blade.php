@extends('front.default.masterpage')
@section('content')
<div class="max-w-sm flex  mx-auto my-5">
    <div class="text-center z-10">
        <button class="rounded-full w-10 h-10 py-2 border bg-gray-100 text-purple-600">
            <i class="material-icons">
                info
            </i>
        </button>
        <p class="grand-titre">
            info
        </p>
    </div>
    <div class="border-t-4 w-40 mt-5 -ml-2"></div>
    <div class="text-center z-10 -ml-6">
        <button class="rounded-full w-10 h-10 py-2 border   bg-gray-100 text-purple-600 ">
            <i class="material-icons">
                local_shipping
            </i>
        </button>
        <p class="grand-titre -mr-2">
            shipping
        </p>
    </div>
    <div class="border-t-4 w-40 mt-5 -ml-6 "></div>
    <div class="text-center z-10 -ml-6 z-10 ">
        <button class="rounded-full w-10 h-10 py-2  text-gray-100 bg-purple-600">
            <i class="material-icons">
                payment
            </i>
        </button>
        <p class="grand-titre -mr-2">
            payment
        </p>
    </div>
    </div>

    <div id="payment" class=" my-5 max-w-sm mx-auto border-t border-gray-500 md:border-t-0 py-3 md:py-0 ">
        @php
            $count = 0 ;
        @endphp
    <form  action="{{route('front.order_3_paymentInfo',$order->id)}} " method="POST">
        @csrf
            <label class="label-form" for="adresse">
                Payment method
            </label>
            {{-- btn payment method  --}}
            <div class="w-full ">
                @foreach ($methods as $method)
            <label for="input-{{$count}}" class="container-radio block">
<input type="radio" id="input-{{$count}}" name="input"  {{$method->id == 1 ? 'checked' : ''}} class="method-pay-check hidden">
                <span id="{{$count++}}" class="w-4 h-4 inline-block mr-2 rounded-full border border-grey flex-no-shrink"></span>
                <p class="inline">
                    {{$method->nom}}
                </p>
                
            </label>
                @endforeach

            </div>
            {{-- btn payment method  --}}

            {{-- livraison  --}}
            <div>
            <img src="{{asset('images/livraison.svg')}}" alt="">
            </div>
            {{-- livraison  --}}
            <div class="flex justify-end my-3">
                <button class="buttons" type="submit">
                    valider
                    <i class="material-icons ml-2">
                        send
                    </i>
                </button>
            </div>
        </form>
    </div>
@endsection


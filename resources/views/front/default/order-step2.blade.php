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
        <button class="rounded-full w-10 h-10 py-2  text-gray-100 bg-purple-600 ">
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
        <button class="rounded-full w-10 h-10 py-2 border bg-gray-100 text-purple-600 ">
            <i class="material-icons">
                payment
            </i>
        </button>
        <p class="grand-titre -mr-2">
            payment
        </p>
    </div>
    </div>

    <div id="infos" class=" my-5 max-w-sm mx-auto border-t border-gray-500 md:border-t-0 py-3 md:py-0 display">
    <form action="{{route('front.order-step2-shippingInfo',$order->id)}}" method="post">
            @csrf
            <div class="my-3">
                <label class="label-form" for="adresse">
                    Adresse
                </label>
                <input class="input-form w-full" name="shipping_address" id="adresse" type="text" placeholder="Enter your adresse">
            </div>
            <div class="my-3">
                <label class="label-form" for="City">
                    City
                </label>
                <div class="relative ">
                    <select name="destination_id" class=" input-form appearance-none w-full " id="grid-state" aria-placeholder="jfskskn">
                      <option disabled selected hidden>select your city</option>
                      @foreach ($destinations as $dest)
                    <option value="{{$dest->id}}">{{$dest->name}}</option>
                      @endforeach
                    </select>
                    <div class="pointer-events-none  absolute top-0 right-0 flex items-center px-2 py-2 text-grey-darker">
                      <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                  </div>

            </div>
            <div class="flex justify-end my-3">
                <button class="buttons" type="submit">
                    next
                    <i class="material-icons ml-2">
                        forward
                    </i>
                </button>
            </div>
        </form>
    </div>

@endsection

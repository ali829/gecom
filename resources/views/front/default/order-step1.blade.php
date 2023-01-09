@extends('front.default.masterpage')
@section('content')





        <div class="max-w-sm flex  mx-auto my-5">
            <div class="text-center z-10">
                <button class="rounded-full w-10 h-10 py-2 text-gray-100 bg-purple-600">
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
                <button class="rounded-full w-10 h-10 py-2 border bg-gray-100 text-purple-600 ">
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

        <form class="p-5 max-w-sm" action="{{route('cart.convert')}}" method="POST">
                @csrf
                <div class="my-3">
                    <label class="label-form" for="nom">
                        Full Name
                    </label>
                    <input class="input-form w-full" name="nom" id="nom" type="text" placeholder="FirstName">
                    @error('nom')
                    <div class="text-xs text-red-700 ">{{ $message }}</div>
                    @enderror
                </div>
                <div class="my-3">
                    <label class="label-form" for="email">
                        Adresse Mail
                    </label>
                    <input class="input-form w-full " name="email" id="email" type="email" placeholder="Enter Your E-mail">
                    @error('email')
                    <div class="text-xs text-red-700 ">{{ $message }}</div>
                    @enderror
                </div>
                <div class="my-3">
                    <label class="label-form" for="tel">
                        Phone
                    </label>
                    <input class="input-form w-full" name="tel" id="phone" type="tel"
                        placeholder="Enter Your Phone Number">
                        @error('tel')
                        <div class="text-xs text-red-700 ">{{ $message }}</div>
                        @enderror
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

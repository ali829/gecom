@extends('dashboard.layout')
@section('title',  $title)
@section('content')

<div class="w-full  md:p-3">
    <!--Table Card-->
    <form method="POST" action="{{$form_action}}" class="w-full lg:w-1/2 mx-auto">
        @csrf
        @if(isset($shipper->id))
        <input type="hidden" name="_method" value="PUT">
        @endif
        <p class="font-bold uppercase text-xl text-gray-600">
            {{$title}}
        </p>
        <div class="bg-white border rounded shadow mt-5">
            <!-- champs -->
            <div class="md:flex w-full">
                <div class=" px-5 my-3 w-full">
                    <label class="block text-gray-800 font-semibold  mb-1" for="company_name">
                        Désignation
                    </label>
                    <input
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="company_name" value="{{old_value('company_name', $shipper ?? null)}}" name="company_name" type="text" placeholder="Désignation">
                    @error('company_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="md:flex w-full">
                <div class=" px-5 my-3 w-full">
                    <label class="block text-gray-800 font-semibold  mb-1" for="phone">
                        Téléphone
                    </label>
                    <input
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="phone" value="{{old_value('phone', $shipper ?? null)}}" name="phone" type="text" placeholder="Téléphone">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="md:flex w-full">
                <div class=" px-5 my-3 w-full">
                    <label class="block text-gray-800 font-semibold  mb-1" for="email">
                        E-mail
                    </label>
                    <input
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="email" value="{{old_value('email', $shipper ?? null)}}" name="email" type="email" placeholder="E-mail">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
                <div class="flex w-full justify-end p-2">
                    <button type="submit" class="text-sm text-gray-100 font-semibold rounded bg-purple-500 hover:bg-purple-700 shadow-lg px-2 py-1 flex items-center justify-end m-3tea">
                        <i class="material-icons mr-1">
                            add_circle_outline
                        </i>{{isset($shipper)?'Modifier':'Ajouter'}}
                    </button>
                </div>
    </form>
</div>

@endsection

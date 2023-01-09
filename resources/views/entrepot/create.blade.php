@extends('dashboard.layout')
@section('title',  $title)
@section('content')
<div class="w-full md:p-3">
    <form action="{{$form_action}}" method="POST" class="w-full mx-auto  lg:w-1/2">
        @csrf
        @if(isset($entrepot->id))
        <input type="hidden" name="_method" value="PUT">
        @endif
        <p class="font-bold uppercase text-xl text-gray-600">
            {{$title}}
        </p>
        <div class="bg-white border rounded shadow mt-5">
            <div class="md:flex w-full">
                <div class=" px-5 my-3 w-full">
                    <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                        Désignation
                    </label>

                    <input
                        class="@error('nom') border-red-500 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="nom" name="nom" type="text" value="{{old_value('nom', $entrepot ?? null)}}" placeholder="Désignation">
                        @error('nom')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                </div>
            </div>
            <div class="md:flex w-full">
                <div class=" px-5 my-3 w-full">
                    <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                        Adresse
                    </label>

                    <input
                        class="@error('adresse') border-red-500 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="adresse" name="adresse" type="text" value="{{old_value('adresse', $entrepot ?? null)}}" placeholder="adresse">
                        @error('adresse')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                </div>
            </div>
            <div class=" px-5 my-3">
                <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                    Ville
                </label>
                <div class="relative">
                    <select
                        class="@error('destination_id') border-red-500 @enderror block bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="categorie" name="destination_id">
                        @foreach ($destinations as $dist)
                            @if (isset($entrepot->id) && $entrepot->destination_id==$dist->id )
                            <option value="{{$dist->id}}" selected> {{$dist->name}}</option>
                            @endif    
                        <option value="{{$dist->id}}"> {{$dist->name}}</option>
                        @endforeach
                    </select>
                    @error('destination_id')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
            </div>
                   
        </div>
        <div class="flex w-full justify-end p-2">
            <button type="submit" class="text-sm text-gray-100 font-semibold rounded bg-purple-500 hover:bg-purple-700 shadow-lg px-2 py-1 flex items-center justify-end m-3tea" onclick="submit()">
                <i class="material-icons mr-1">
                    add_circle_outline
                </i>{{isset($entrepot)? 'Modifier':'ajouter'}}
            </button>
        </div>
    </form>
</div>
@endsection

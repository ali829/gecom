@extends('dashboard.layout')

@section('title', $title)

@section('content')

    <p class="font-bold uppercase text-xl text-gray-600">
        {{$title}}
    </p>
    <form action="{{$form_action}}" method="POST" class="w-full  lg:w-1/2">
        @csrf
        @if(isset($supplier->id))
                <input type="hidden" name="_method" value="PUT">
        @endif
        <div class="bg-white border rounded shadow mt-5">
            <div class="border-b p-3">
                <h5 class="font-semibold uppercase text-gray-600">Info</h5>
            </div>
            <!-- champs -->
            <div class="md:flex w-full">
                <div class=" px-5 my-3 w-full">
            <div class="md:flex w-full">
                <div class=" px-5 my-3 w-full">
                    <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                        Nom
                    </label>
                    <input
                        class=" @error('nom') border-red-500 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="nom" name="nom" type="text" value="{{old_value('nom', $supplier ?? null)}}" placeholder="Nom">
                </div>
                @error('nom')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="md:flex w-full">
                <div class=" px-5 my-3 w-full">
                    <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                        Prenom
                    </label>
                    <input
                        class=" @error('prenom') border-red-500 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="prenom" name="prenom" type="text" value="{{old_value('prenom', $supplier ?? null)}}" placeholder="Prenom">
                </div>
                @error('prenom')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="md:flex w-full">
                <div class=" px-5 my-3 w-full">
                    <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                        Telephone
                    </label>
                    <input
                        class=" @error('tel') border-red-500 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="tel" name="tel" type="text" value="{{old_value('tel', $supplier ?? null)}}" placeholder="telephone">
                </div>
                @error('tel')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="md:flex w-full">
                <div class=" px-5 my-3 w-full">
                    E-mail
                    <label class="  block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                    </label>
                    <input
                        class="@error('email') border-red-500 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="email" name="email" type="text" value="{{old_value('email', $supplier ?? null)}}" placeholder="email">
                </div>
                @error('email')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="md:flex w-full">
                <div class=" px-5 my-3 w-full">
                    <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                        Adresse
                    </label>
                    <input
                        class="@error('adresse') border-red-500 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="adresse" name="adresse" type="text" value="{{old_value('adresse', $supplier ?? null)}}" placeholder="adresse">
                </div>
                @error('adresse')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="md:flex w-full">
                <div class=" px-5 my-3 w-full">
                    <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                        Ville
                    </label>
                    <input
                        class="@error('ville') border-red-500 @enderror  bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="ville" name="ville" type="text" value="{{old_value('ville', $supplier ?? null)}}" placeholder="Ville">
                </div>
                @error('ville')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
                <div class=" px-5 my-3 w-full">
                    <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                        Code postale
                    </label>
                    <input
                        class="@error('code_postal') border-red-500 @enderror  bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="code_postal" name="code_postal" type="text" value="{{old_value('code_postal', $supplier ?? null)}}" placeholder="Code postale">
                </div>
                @error('code_postal')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
                <div class=" px-5 my-3 w-full">
                    <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                        Pays
                    </label>
                    <input
                        class="@error('pays') border-red-500 @enderror  bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="pays" name="pays" type="text" value="{{old_value('pays', $supplier ?? null)}}" placeholder="pays">
                </div>
                @error('pays')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>        
    </form>
    
    
</div>
<div class="w-full flex justify-end my-1">
    <button class="text-sm  text-gray-100 font-semibold rounded bg-purple-500 hover:bg-purple-700 shadow-lg px-2 py-1  flex items-center capitalize" onclick="submit()">
            <i class="material-icons mr-1">
                add_circle_outline
            </i>{{isset($supplier)?'Modifier':'Ajouter'}}
    </button>
</div>

 
        
    
@endsection

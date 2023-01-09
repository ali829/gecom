@extends('dashboard.layout')

@section('title', $title)

@section('content')


<!--Table Card-->
    
<form action="{{$form_action}}" method="POST" class="w-full  lg:w-1/2">
    @csrf
    @if(isset($client->id))
    <input type="hidden" name="_method" value="PUT">
@endif
    <p class="font-bold uppercase text-xl text-gray-600">
        {{$title}}
    </p>
    <!-- Générale -->
    <div class="bg-white border rounded shadow mt-5">
        <div class="border-b p-3">
            <h5 class="font-semibold uppercase text-gray-600">Info</h5>
        </div>
        <div class="px-5 my-3 w-full">
            <label for="" class="block text-gray-800 font-semibold  mb-1">titre</label>
            <div>
                <label class="inline-flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" name="titre" value="M." checked>
                    <span class="ml-2">M.</span>
                </label>  
                <label class="inline-flex items-center">
                    <input type="radio" class="form-radio text-green-500" name="titre" value="Mme.">
                    <span class="ml-2">Mme.</span>
                  </label>
            </div>
        </div>
        <div class="md:flex w-full">
            <div class=" px-5 my-3 w-full">
                <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                    Nom
                </label>
                <input
                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                    id="nom" name="nom" type="text" value="" placeholder="Nom">
            </div>
        </div>
        <div class="md:flex w-full">
            <div class=" px-5 my-3 w-full">
                <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                    Prenom
                </label>
                <input
                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                    id="prenom" name="prenom" type="text" value="" placeholder="Prenom">
            </div>
        </div>
        <div class="md:flex w-full">
            <div class=" px-5 my-3 w-full">
                <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                    Telephone
                </label>
                <input
                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                    id="tel" name="tel" type="text" value="" placeholder="telephone">
            </div>
        </div>
        <div class="md:flex w-full">
            <div class=" px-5 my-3 w-full">
                <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                    E-mail
                </label>
                <input
                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                    id="email" name="email" type="text" value="" placeholder="email">
            </div>
        </div>
        <div class="md:flex w-full">
            <div class=" px-5 my-3 w-full">
                <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                    Mot de pass
                </label>
                <input
                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                    id="password" name="password" type="password" value="" placeholder="password">
            </div>
        </div>
        <div class="md:flex w-full">
            <div class=" px-5 my-3 w-full">
                <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                    Adresse
                </label>
                <input
                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                    id="adresse" name="adresse" type="text" value="" placeholder="adresse">
            </div>
        </div>
        <div class="md:flex w-full">
            <div class=" px-5 my-3 w-full">
                <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                    Ville
                </label>
                <input
                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                    id="ville" name="ville" type="text" value="" placeholder="Ville">
            </div>
            <div class=" px-5 my-3 w-full">
                <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                    Code postale
                </label>
                <input
                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                    id="code_postal" name="code_postal" type="text" value="" placeholder="Code postale">
            </div>
            <div class=" px-5 my-3 w-full">
                <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                    Pays
                </label>
                <input
                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                    id="pays" name="pays" type="text" value="" placeholder="pays">
            </div>
        </div>

    </div>
    

   
    



    <div class="w-full flex justify-end my-1">
        <button class="text-sm  text-gray-100 font-semibold rounded bg-purple-500 hover:bg-purple-700 shadow-lg px-2 py-1  flex items-center capitalize" onclick="submit()">
                <i class="material-icons mr-1">
                    add_circle_outline
                </i>Ajouter
        </button>
    </div>

</form>
<!--/table Card-->























  
        
    
@endsection

@extends('dashboard.layout')

@section('title',  $title)

@section('content')
    <input type="file" name="image" accept="image/*" id="imageUpload" hidden>
    <form action="{{$form_action}}" method="POST" class="w-full lg:max-w-3xl">
        @csrf
        @if(isset($categorie->id))
            <input type="hidden" name="_method" value="PUT">
        @endif
        <input name="parent_id" type="hidden" value="{{$categorie->parent_id ?? ''}}">
        <!--Table Card-->
        <p class="font-bold uppercase text-xl text-gray-600">
            {{$title}}
        </p>
        <!-- Générale -->
        <div class="bg-white w-full  border rounded shadow mt-5">
            <div class="border-b p-3">
                <h5 class="font-semibold uppercase text-gray-600">Générale</h5>
            </div>
            <!-- champs -->
            <div class="md:flex w-full">
                <div class=" px-5 my-3 w-full">
                    <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                        Désignation
                    </label>

                    <input
                        class="@error('nom') border-red-500 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="nom" name="nom" type="text" value="{{old_value('nom', $categorie ?? null)}}" placeholder="Désignation">
                        @error('nom')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                </div>
            </div>
            <div class="px-5 my-3">
                <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                    Description
                </label>
                <textarea
                    class="@error('description') border-red-500 @enderror resize-none bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full h-32 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                    id="description" name="description" type="text" placeholder="Description">{{old_value('description', $categorie ?? null)}}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- image -->
        <div class="bg-white border rounded shadow mt-5">
            <div class="border-b p-3">
                <h5 class="font-semibold uppercase text-gray-600">Image</h5>
            </div>
            <!-- image ajouter a modifier -->

            <div class="py-3 md:py-0 md:flex mx-auto w-11/12">
                @php
                    $images = [];
                    if(isset($categorie->image)){
                        $images[] = $categorie->image;
                    }
                @endphp
                @include('components.upload', ['images' => $images, 'max' => 1])
            </div>
        </div>
        <div class="w-full flex justify-end my-1">
            <button
                class=" text-sm flex items-center  text-gray-100 font-semibold rounded bg-purple-500 hover:bg-purple-700 shadow-lg px-2 py-1">
                {{isset($categorie->id)?'Modifier':'Ajouter'}}
                <i class="material-icons ml-1">
                    add_circle_outline
                </i>
            </button>
        </div>
    </form>

@endsection

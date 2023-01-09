@extends('dashboard.layout')
@section('title',  $title)
@section('content')
<div class="w-full md:p-3">
    
    <form action="{{$form_action}}" method="POST" class="w-full mx-auto  lg:w-1/2">
        @csrf
        @if(isset($destination->id))
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
                        class="@error('name') border-red-500 @enderror bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="name" name="name" type="text" value="{{old_value('name', $destination ?? null)}}" placeholder="Désignation">
                        @error('name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                </div>
            </div>
        </div>
        <div class="flex w-full justify-end p-2">
            <button type="submit" class="text-sm text-gray-100 font-semibold rounded bg-purple-500 hover:bg-purple-700 shadow-lg px-2 py-1 flex items-center justify-end m-3tea">
                <i class="material-icons mr-1" onclick="submit()">
                    add_circle_outline
                </i>{{isset($destination)? 'Modifier':'Ajouter'}}
            </button>
        </div>
    </form>
</div>
@endsection

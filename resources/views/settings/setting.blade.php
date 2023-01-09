@extends('dashboard.layout')

@section('title', $title)

@section('content')
<div class="w-full">
    <form action="{{route('setting.update',$setting)}}" method="POST" class="w-full lg:w-1/2">
        @csrf
        @method('PUT')
        <div class="bg-white border rounded shadow mt-5">
            <div class="border-b p-3">
                <h5 class="font-semibold uppercase text-gray-600">Paramètres</h5>
            </div>
            <div class="md:flex w-full">
                <div class=" px-5 my-3 w-full">
                    <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                        Nom
                    </label>

                    <input
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="nom_client" name="nom" type="text" value="{{@old('nom',$setting->nom)}}"
                        placeholder="Saisir un nom">
                </div>
            </div>
            <div class="md:flex w-full">
                <div class=" px-5 my-3 w-full">
                    <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                        Description
                    </label>
                    <textarea
                        class="resize-none bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full h-32 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="description" name="description" type="text" value="" placeholder="Description">{{$setting->description}}</textarea>
                </div>
            </div>
            <div class="md:flex w-full">
                <div class=" px-5 my-3 w-full">
                    <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                        domain
                    </label>

                    <input
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="domain" name="domain" type="text" value="{{@old('nom',$setting->domain)}}"
                        placeholder="Domain">
                </div>
            </div>
            <div class="md:flex w-full">
                <div class=" px-5 my-3">
                    <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                        Devise
                    </label>
                    <div class="relative">
                        <select
                            class="block bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                            id="deviseSelect" name="devise">
                            @foreach($devises as $dev)
                            @if ($dev==$setting->devise)
                            <option value="{{$dev}}" selected>{{$dev}}</option>
                            @else
                            <option value="{{$dev}}">{{$dev}}</option>
                            @endif
                            @endforeach
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:flex w-full">
                <div class=" px-5 my-3 w-full">
                    <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                        Email
                    </label>

                    <input
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="email" name="email" type="text" value="{{@old('nom',$setting->email)}}" placeholder="Email">
                </div>
            </div>
            <div class="md:flex w-full">
                <div class=" px-5 my-3 w-full">
                    <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                        tele
                    </label>

                    <input
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="tel" name="tel" type="text" value="{{@old('tel',$setting->tel)}}"
                        placeholder="numero de telephone">
                </div>
            </div>
            <div class="md:flex w-full">
                <div class=" px-5 my-3">
                    <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                        Theme
                    </label>
                    <div class="relative">
                        <select
                            class="block bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                            id="themeSelect" name="theme">
                            @foreach($themes as $theme)
                            @if ($theme==$setting->theme)
                            <option value="{{$theme}}" selected>{{$theme}}</option>
                            @else
                            <option value="{{$theme}}">{{$theme}}</option>
                            @endif
                            @endforeach
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:flex w-full">
                <div class=" px-5 my-3 w-full">
                    <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                        Footer
                    </label>

                    <input
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="footer" name="footer" type="text" value="{{@old('footer',$setting->footer)}}"
                        placeholder="Saisir footer">
                </div>
            </div>
            <div class="flex justify-end mt-5">
                <button
                    class="text-sm text-gray-100 font-semibold rounded bg-purple-500 hover:bg-purple-700 shadow-lg px-2 py-1 flex items-center m-4 p-4"
                    id="valid">valider</button>
            </div>
    </form>
</div>
@endsection

@extends('front.default.masterpage')



@section('content')



{{-- globale div  --}}
<div>
<div class="lg:flex justify-center px-2 lg:px-0 py-16">
    {{-- left div  --}}
    <div class="p-4 border-b flex lg:w-1/5 lg:border-b-0  lg:border-r lg:block border-gray-900">
        @for ($i = 0; $i < 4; $i++)
        <div class="px-1 lg:py-1">
            <a href="">
            <img src="{{asset('images/publication.jpg')}}" alt="" class="w-full h-full">
            </a>
        </div>
         @endfor

    </div>
{{-- end of left div  --}}

{{-- right div  --}}
<div class="lg:w-1/2 mx-auto">

    {{-- top div  --}}
    <div>
        {{-- title  --}}
        <div class="lg:w-3/4  mx-auto flex justify-center lg:text-xl items-center p-4">
            <p class="grand-titre">
                Catégorie
            </p>
            <span class="grand-titre-border">

            </span>
        </div>
        {{-- end of title  --}}

        {{-- categori --}}
        <div class="w-full">

            {{-- select list  --}}
            <div class="relative w-1/2 md:w-1/3 mx-auto">
                <select
                    class="block appearance-none w-full  border-b border-gray-900 text-gray-700 py-3 px-4 pr-8   focus:outline-none  focus:border-gray-500 items-center"
                    id="grid-cat ">
                    @foreach ($categorie as $cat)
                    <option class="text-sm -p-1 lg:p-1">{{$cat->nom}}</option>
                    @endforeach
                </select>
                <div
                    class=" pointer-events-none rounded-full h-8 w-8 flex justify-center  bg-gray-100 absolute top-0 right-0 flex items-center px-2 text-gray-700 mt-2">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                </div>
            </div>
            {{-- end of  select list  --}}

            {{-- pics list  --}}
            <div class="flex justify-center flex-wrap px-3 py-10">

                @foreach ($categorie as $cat)
                    <div class="w-1/5 relative animecat   my-2 mx-1">
                        <div class="lg:hidden">
                            <p class="grand-titre-sm overflow-x-hidden">
                                {{$cat->nom}}
                            </p>
                        </div>
                        <a href="{{route('front.categorie-products',$cat)}}" class="w-full h-full  bg-transparent">
                        <img src="{{asset('images/subcat.jpg')}}" alt="" class=" h-full w-full">
                            <div class="absolute-div ">

                            </div>
                            <div class="absolute top-0 w-full h-full flex items-center justify-center">
                                <p class="grand-titre-cat overflow-x-hidden">
                                    {{$cat->nom}}
                                </p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            {{-- end of  spics list  --}}

    </div>
    {{-- end of categori --}}
</div>
{{-- end of top div  --}}
</div>
{{-- end of global div  --}}
</div>


@endsection

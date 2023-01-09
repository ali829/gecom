@extends('dashboard.layout')
@section('title', $title)
@section('content')
{{-- @php
        dd($products)
    @endphp --}}
<div id="pack">
    <pack :products="{{$products}}"></pack>
    <div class="w-full flex justify-end py-3">
        <form action="" method="POST">
            <button
                class=" text-sm flex items-center  text-gray-100 font-semibold rounded bg-purple-500 hover:bg-purple-700 shadow-lg px-2 py-1">
                Ajouter
                <i class="material-icons ml-1">
                    add_circle_outline
                </i>
            </button>
        </form>
    </div>
</div>
@endsection


@section('script')
<script>
    new Vue({
        el: "#pack",
    });

</script>
@endsection

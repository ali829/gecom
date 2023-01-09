@extends('dashboard.layout')

@section('title', $title)

@section('content')
<div id="transfer" class="w-full lg:max-w-3xl mx-auto">
    <transfer :entrepots="{{$entrepots}}" :products="{{$products}}" @updated="updateData"></transfer>
    <div class="w-full flex justify-end py-3">
        <form action="{{route('transfert.store')}}" method="POST">
            @csrf
            <input id="data" type="hidden" name="data" value="{}">
            <button
                class=" action-btn ">

                <i class="material-icons mr-1">
                    add_circle_outline
                </i>
                Ajouter
            </button>
        </form>
    </div>
</div>
@endsection
@section('script')
    <script>
        new Vue({
            el: "#transfer",
            methods: {
                updateData(data){
                    document.getElementById('data').value = JSON.stringify(data);
                }
            }
        });
    </script>
@endsection

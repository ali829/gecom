@extends('dashboard.layout')

@section('content')
<div class="overflow-y-hidden">
    <h1 class="text-center welcome uppercase text-gray-800 text-6xl" style="transition: all .4s cubic-bezier(.68,-0.55,.27,1.55); ">welcome</h1>
    <br>
    <p class="text-center username text-purple-600 text-3xl">{{Auth::guard('admin')->user()->name}}</p>
</div>
@endsection

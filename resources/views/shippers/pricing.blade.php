@extends('dashboard.layout')
@section('title',  $title)
@section('content')
<div id="app" class="w-full md:p-3">
<shipper-pricing :shipper="{{$shipper}}" :destinations="{{$destinations}}"></shipper-pricing>
</div>
@endsection
@section('script')
<script>
    const app = new Vue({
        el: '#app',
    });
</script>
@endsection

@extends('dashboard.layout')
@section('title')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{$title}}</h1>
    </div>
<form method="POST" action="{{route('product.assignShipper',$product->id)}}">
        @csrf
        <div class="col-5">
            <label for="shipper_id">livreur</label>
            <select class="custom-select @error('shipper_id') is-invalid @enderror" id="inputGroupSelect01" name="shipper_id">
                <option selected>Choose...</option>
                @foreach($shippers as $ship)
                    <option value="{{$ship->id}}">{{$ship->company_name}}</option>
                @endforeach
            </select>
            @error('shipper_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <input class="btn btn-outline-secondary" type="submit"  value="add">
        </div>


    </form>
@endsection

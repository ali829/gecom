@extends('dashboard.layout')

@section('title', $title)

@section('content')
<form method="POST" action="{{route('order.store')}}">
    @csrf
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{$title}}</h1>
        </div>
    <div class="col-5">
        <div class="form-group">
            <label for="cleint_id">client</label>
            <select class="custom-select mb-3 @error('client_id') is-invalid @enderror" id="inputGroupSelect01"
                name="client_id">
                <option selected>Choose...</option>
                @foreach($clients as $client)
                <option value="{{$client->id}}">{{$client->nom}} {{$client->nom}}</option>
                @endforeach
            </select>
            @error('client_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
                <label for="shipping_name">nom </label> <br>
                <input class="form-control @error('shipping_name') is-invalid @enderror" type="text" name="shipping_name" placeholder="entrer un nom" value="{{@old('shipping_name')}}">
                    @error('shipping_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                <label for="shipping_address">adresse </label> <br>
                <input class="form-control @error('shipping_address') is-invalid @enderror" type="text" name="shipping_address" placeholder="entrer une adresse" value="{{@old('shipping_address')}}">
                    @error('shipping_address')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                <label for="shipping_phone">tele </label> <br>
                <input class="form-control @error('shipping_phone') is-invalid @enderror" type="text" name="shipping_phone" placeholder="numero de telephone" value="{{@old('shipping_phone')}}">
                    @error('shipping_phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                    <div class="form-group">
                        <label for="shipper_id">livreur</label>
                        <select class="custom-select mb-3 @error('shipper_id') is-invalid @enderror" id="inputGroupSelect01"
                            name="shipper_id">
                            <option selected>Choose...</option>
                            @foreach($shippers as $shipper)
                            <option value="{{$shipper->id}}">{{$shipper->company_name}}</option>
                            @endforeach
                        </select>
                        @error('shipper_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="destination_id">distination</label>
                        <select class="custom-select mb-3 @error('destination_id') is-invalid @enderror" id="inputGroupSelect01"
                            name="destination_id">
                            <option selected>Choose...</option>
                            @foreach($destinations as $dist)
                            <option value="{{$dist->id}}">{{$dist->name}}</option>
                            @endforeach
                        </select>
                        @error('shipper_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="payment">mode de payment</label>
                        <select class="custom-select mb-3 @error('payment') is-invalid @enderror" id="inputGroupSelect01"
                            name="payment">
                            <option selected>Choose...</option>
                            @foreach($payments as $mp)
                            <option value="{{$mp}}">{{$mp}}</option>
                            @endforeach
                        </select>
                        @error('shipper_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                   <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="is_quote">
                    <label class="form-check-label" for="defaultCheck1">
                        c'est un devis
                    </label>

                </div>
    </div>

    <input class="btn btn-outline-secondary mt-3" type="submit" value="ajouter">
    </div>
</form>

@endsection

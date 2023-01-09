@extends('dashboard.layout')
@section('title')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{$title}}</h1>
    </div>
<form method="POST" action="{{route('product.assignEntrepot',$product->id)}}">
        @csrf

        <div class="col-5">


            <label for="entrepot_id">nom d'entrepot</label>
            <select class="custom-select @error('entrepot_id') is-invalid @enderror" id="inputGroupSelect01" name="entrepot_id">
                <option selected>Choose...</option>
                @foreach($entrepots as $ent)
                    <option value="{{$ent->id}}">{{$ent->nom}}</option>
                @endforeach
            </select>
            @error('entrepot_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <br>
            <label for="quantite">quantite</label>
            <input class="form-control @error('quantite') is-invalid @enderror" type="text" name="quantite" placeholder="quantite" value="{{old('quantite')}}" >
            @error('quantite')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <label for="avert">avertissment</label>
            <input class="form-control @error('avert') is-invalid @enderror" type="text" name="avert" placeholder="avert" value="{{old('avert')}}" >
            @error('avert')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <input class="btn btn-outline-secondary mt-3" type="submit"  value="ajouter">

        </div>



    </form>
@endsection



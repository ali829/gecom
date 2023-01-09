@extends('dashboard.layout')
@section('title')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{$title}}</h1>

    </div>
    <div>
        <div class="col-5">
                <table class="table">
                        <tbody>
                            <tr>
                                <td>Etat</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Nom</td>
                            <td>{{$order->shipping_name}}</td>
                            </tr>
                            <tr>
                                <td>Telephone</td>
                            <td>{{$order->shipping_phone}}</td>
                            </tr>
                            <tr>
                                <td>Adresse</td>
                                <td>{{$order->shipping_address}}</td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td>{{$order->created_at}}</td>
                            </tr>
                            <tr>
                                <td>Livreur :</td>
                                <td>{{$shipper->company_name}}</td>
                            </tr>
                        </tbody>
                    </table>
        </div>
        <h1>article(s)</h1>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>photo</th>
                    <th>nom</th>
                    <th>prix unitaire</th>
                    <th>quantite</th>
                    <th>prix de vente</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($order->products as $pro)
                   <tr>
                       <td>photo</td>
                       <td>{{$pro->name}}</td>
                       <td>{{$pro->pivot->original_price}}</td>
                       <td>{{$pro->pivot->qte}}</td>
                       <td>{{($pro->pivot->qte*$pro->pivot->original_price)-(($pro->pivot->qte*$pro->pivot->original_price)*$pro->pivot->remise/100)}}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5"></td>
                    </tr>
                @endforelse
                <tr>
                    <td colspan="4" style="text-align:right">commande :</td>
                    <td>{{$order->total}}</td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align:right">prix de livraison :</td>
                    <td>{{$order->shipping_price}}</td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align:right">total :</td>
                    <td>{{$order->total + $order->shipping_price}}</td>
                </tr>
            </tbody>
        </table>

    </div>
@endsection

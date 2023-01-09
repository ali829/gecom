@extends('dashboard.layout')

@section('title', $title)

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{$title}}</h1>
</div>
<div class="col-5">
    <input type="hidden" value="{{$order->id}}" id="order_id">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="1" id="devis" name="is_quote" style="visibility:hidden">
    </div>
    <table class="table">
            <tbody>
                <tr>
                    <td>Etat</td>
                    <td>nouveau</td>
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
<form method="POST" action="{{route('order.store')}}" id="command_detail">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="devis" name="is_quote" style="visibility:hidden">
        </div>

        <div class="form-group">
                <label for="product_id">Produit</label>
                <select id="product_select">
                    <option value="">Selectionner</option>
                </select>
                <br>
                <a href="#duplicatediv" onclick="addNewRow()" class="btn btn-outline-secondary ml-auto">ajouter produit</a>
            </div>

        <table class="table " id="productsTable">
            <thead>
                <tr>
                    <th>id</th>
                    <th>lebele</th>
                    <th>quantite</th>
                    <th>remise</th>
                    <th>prix unitaire</th>
                    <th>prix total</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody id="products">
                @foreach ($order->products as $pro)
                <tr>
                    <td>{{$pro->id}}</td>
                    <td>{{$pro->name}}</td>
                    <td><input class="border-0 qte" onchange="calculatePrice(this)" type="number" value="{{$pro->pivot->qte}}" style="width:40px" ></td>
                    <td><input class="border-0 rem" onchange="calculatePrice(this)" type="number" value="{{$pro->pivot->remise }}" style="width:40px" ></td>
                    <td>{{$pro->pivot->original_price}}</td>
                    <td>{{$pro->pivot->qte*$pro->pivot->original_price}}</td>
                    <td><button onclick="removeRow(this)" class="btn btn-light"><span data-feather="trash"></span></button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</form>
<button class="btn btn-outline-secondary mt-3" id="save" >enregistrer</button>
<button  class="btn btn-outline-secondary mt-3" id="valid" >valider</button>
@endsection
@section('script')
<script type="text/javascript">
    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function () {

        $("#product_select").select2({
            ajax: {
                url: "{{route('product.getProducts')}}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        _token: CSRF_TOKEN,
                        search: params.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results: response

                    };
                },
                cache: true
            }

        });

    });


    var url = '{{route('product.getProductPrix','')}}';

    function addNewRow() {
        var table = document.getElementById("products");
        var elt = document.getElementById('product_select');
        var prix = 0;
        $.ajax({
            url: url + '/' + elt.value,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                prix = data['prix'];
                if (elt.value != 0) {
                    var productPrix = prix;
                    var row = table.insertRow(0);
                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);
                    var cell3 = row.insertCell(2);
                    var cell4 = row.insertCell(3);
                    var cell5 = row.insertCell(4);
                    var cell6 = row.insertCell(5);
                    var cell7 = row.insertCell(6);

                    cell1.innerHTML = elt.value;
                    cell2.innerHTML = elt.options[elt.selectedIndex].text;
                    cell3.innerHTML =
                        '<input class="border-0 qte" onchange="calculatePrice(this)" type="number" value="1" style="width:40px" >';
                    cell4.innerHTML =
                        '<input class="border-0 rem" onchange="calculatePrice(this)" type="number" value="0" style="width:40px" >';
                    cell5.innerHTML = productPrix;
                    cell6.innerHTML = productPrix;
                    cell7.innerHTML =
                        '<button onclick="removeRow(this)" class="btn btn-light"><span data-feather="trash"></span></button>';
                    feather.replace();
                    $("#product_select").val(null).trigger("change");

                }
            }
        });
    }


    function calculatePrice(obj) {

        if (obj.classList.contains('qte')) {

            let qte = Number(obj.value);
            let pu = Number(obj.parentNode.nextElementSibling.nextElementSibling.innerHTML);
            let rem = Number(obj.parentNode.nextElementSibling.children[0].value);
            let prixTotal = qte * pu;
            let prixFinal = prixTotal - (prixTotal * rem / 100);
            obj.parentNode.nextElementSibling.nextElementSibling.nextElementSibling.innerHTML = prixFinal;
        } else {

            let qte = Number(obj.parentNode.previousElementSibling.children[0].value);
            let pu = Number(obj.parentNode.nextElementSibling.innerHTML);
            let rem = Number(obj.value);
            let prixTotal = qte * pu;
            let prixFinal = prixTotal - (prixTotal * rem / 100);
            obj.parentNode.nextElementSibling.nextElementSibling.innerHTML = prixFinal;
        }
    }
    function fillInputs(obj){
        if(obj.selectedIndex != 0){
            document.getElementById('shipping_name').value=obj.options[obj.selectedIndex].innerHTML ;
            document.getElementById('shipping_address').value=obj.options[obj.selectedIndex].getAttribute("data-address");
            document.getElementById('shipping_phone').value=obj.options[obj.selectedIndex].getAttribute("data-tel");
            document.getElementById('client_id').value=obj.options[obj.selectedIndex].getAttribute("data-id");
        }
        else{
            document.getElementById('shipping_name').value='' ;
            document.getElementById('shipping_address').value='';
            document.getElementById('shipping_phone').value='';
            document.getElementById('client_id').value='';
        }

    }
    function removeRow(obj) {
        obj.parentNode.parentNode.remove();
    }


        $("#valid").on('click', function (e) {
            e.preventDefault();
            var $products = [];
            $("#productsTable tbody tr").each(function (i) {
                var x = $(this);
                var cells = x.find('td');
                var $pro=[];
                $(cells).each(function (i) {
                    var $d=$(this).text() || $(this).find(" input[type='number']").val();
                    $pro.push($d);
                });
                if ($products[1] == "N/A") {

                }
                $products.push($pro);

            });
                var url = '{{route('order.update','')}}';
                var order_id= document.getElementById('order_id').value;
                var is_quote=$("input[name='is_quote']:checked").val();
                $.ajax({
                        type: "PUT",
                        data: {
                                _token: "{{ csrf_token() }}",
                                products: $products,
                                is_quote:is_quote,
                                } ,
                        url: url + '/' + order_id,
                        success: function(msg){
                            location.replace('/admin/order');

                        },
                        error :function( data ) {
                            console.log('error');
                }
                });
        });
        $("#save").on('click', function (e) {
            document.getElementById("devis").checked = true;
            document.getElementById("valid").click();
         });

</script>
@endsection

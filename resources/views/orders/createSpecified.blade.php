@extends('dashboard.layout')

@section('title', $title)

@section('content')

<div class="lg:w-1/2">
    <p class="font-bold uppercase text-xl text-gray-600">
        {{$title}}
    </p>

    <div class=" md:p-3 bg-white  border rounded shadow mt-5">
        <form action="{{$form_action}}" method="POST" id="command_detail" class="w-full  ">
        @csrf
            @if(isset($categorie->id))
                    <input type="hidden" name="_method" value="PUT">
            @endif
            <input type="hidden" value="{{$client->id ?? ''}}" id="client_id" name="client_id">
            @if (isset($clients))
                <div class=" px-5 my-3">
                    <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                        Client
                    </label>
                    <div class="relative">
                        <select
                            class="block bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                            onChange="fillInputs(this)"
                            id="client" name="clientSelect">
                            @foreach ($clients as $clt)    
                            <option  value="" data-id="{{$clt->id}}" 
                                data-address="{{$clt->adresse}}" 
                                data-tel="{{$clt->tel}}">{{$clt->nom_complet}}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div>
            @endif
            <div class=" px-5 my-3 w-full">
                <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                    Nom
                </label>
                    <input 
                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                    type="text" name="shipping_name"
                    placeholder="nom complet" value="{{@old('shipping_name',$client->nom_complet ?? '')}}" id="shipping_name">
            </div>
            <div class=" px-5 my-3 w-full">
                <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                    Adresse
                </label>
                    <input 
                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                    type="text" name="shipping_address"
                    placeholder="adresse" value="{{@old('shipping_address',$client->adresse ?? '')}}" id="shipping_address">
            </div>
            <div class=" px-5 my-3 w-full">
                <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                    Tele
                </label>
                    <input 
                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                    type="text" name="shipping_phone"
                    placeholder="numero de telephone" value="{{@old('shipping_phone',$client->tel ?? '')}}" id="shipping_phone">
            </div>
            <div class=" px-5 my-3">
                <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                    livreur
                </label>
                <div class="relative">
                    <select
                        class="block bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="shipperSelect" name="shipper_id">
                        @foreach ($shippers as $shipper)    
                        <option  value="{{$shipper->id}}">{{$shipper->company_name}}</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class=" px-5 my-3">
                <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                    destination
                </label>
                <div class="relative">
                    <select
                        class="block bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="destinationSelect" name="destination_id">
                        @foreach ($destinations as $dist)    
                        <option value="{{$dist->id}}">{{$dist->name}}</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class=" px-5 my-3">
                <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                    mode de payment
                </label>
                <div class="relative">
                    <select
                        class="block bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="paymentSelect" name="payment_method">
                        @foreach ($payments as $mp)    
                        <option value="{{$mp->id}}">{{$mp->nom}}</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class=" px-5 my-3 w-full">
                <input class="form-check-input" type="checkbox" value="1" id="devis" name="is_quote" style="visibility:hidden">
            </div>
        </div>
        <div class="py-5 px-2 md:p-5 bg-white  border rounded shadow mt-5">
                    <div class=" px-5 my-3 w-full">
                        <label class="block text-gray-800 font-semibold  mb-1" for="inline-full-name">
                            produits
                        </label>
                            <select id="product_select" 
                            class=" bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                                <option value="" class="bg-gray-600">Selectionner</option>
                            </select>
                            <button>
                                <a href="#duplicatediv" onclick="addNewRow()" class=" mt-2 text-sm text-gray-100 font-semibold rounded bg-purple-500 hover:bg-purple-700 shadow-lg px-2 py-1 flex items-center mx-1 ">
                                    ajouter produit
                                    <i class="material-icons ml-1">
                                        add_circle_outline
                                    </i>    
                                </a>
                            </button>
                        </div>
                <table class="table-auto w-full " id="productsTable">
                    <thead>
                        <tr>
                            <th class="font-bold">id</th>
                            <th class="font-bold">lebele</th>
                            <th class="font-bold">quantite</th>
                            <th class="font-bold">remise</th>
                            <th class="font-bold">prix unitaire</th>
                            <th class="font-bold">prix total</th>
                            <th class="font-bold">action</th>
                        </tr>
                    </thead>
                    <tbody class="font-normal text-sm" id="products">
        
                    </tbody>
                </table>
            </div>
                    <div class="flex justify-end mt-5">
                        <button class="text-sm text-gray-100 font-semibold rounded bg-blue-500 hover:bg-blue-700 shadow-lg px-2 py-1 flex items-center mx-1 " id="save" >
                            enregistrer
                            <i class="material-icons ml-1">
                                save_alt
                            </i>    
                        </button>
                        <button  class="text-sm text-gray-100 font-semibold rounded bg-purple-500 hover:bg-purple-700 shadow-lg px-2 py-1 flex items-center mx-1 " id="valid" >
                            valider
                            <i class="material-icons ml-1">
                                beenhere
                            </i>
                        </button>
                    </div>
    
        </form>
    </div>
</div>
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
                    var input = document.createElement('input')
                    input.type = 'number'
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
            let pu = Number(obj.parentNode.nextSibling.nextSibling.innerHTML);
            let rem = Number(obj.parentNode.nextSibling.children[0].value);
            let prixTotal = qte * pu;
            let prixFinal = prixTotal - (prixTotal * rem / 100);
            obj.parentNode.nextSibling.nextSibling.nextSibling.innerHTML = prixFinal;
        } else {
            let qte = Number(obj.parentNode.previousSibling.children[0].value);
            let pu = Number(obj.parentNode.nextSibling.innerHTML);
            let rem = Number(obj.value);
            let prixTotal = qte * pu;
            let prixFinal = prixTotal - (prixTotal * rem / 100);
            obj.parentNode.nextSibling.nextSibling.innerHTML = prixFinal;
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
            var url = '{{route('product.newOrder')}}';
            var client_id = $("input[name='client_id']").val();
            var shipping_name = $("input[name='shipping_name']").val();
            var shipping_address = $("input[name='shipping_address']").val();
            var shipping_phone = $("input[name='shipping_phone']").val();
            var shipper_id= $('#shipperSelect').val();
            var destination_id= $('#destinationSelect').val();
            var is_quote=$("input[name='is_quote']:checked").val();
            var payment_method= $('#paymentSelect').find('option:selected').text();
                $.ajax({
                        type: "POST",
                        data: {
                                _token: "{{ csrf_token() }}",
                                products: $products,
                                client_id:client_id,
                                shipping_name:shipping_name,
                                shipping_address:shipping_address,
                                shipping_phone:shipping_phone,
                                shipper_id:shipper_id,
                                destination_id:destination_id,
                                payment_method:payment_method,
                                is_quote:is_quote,
                                } ,
                        url: '{{route('product.newOrder')}}',
                        success: function(msg){
                            location.replace('/admin/order');

                        },
                        error :function( data ) {
                        if( data.status === 422 ) {
                        console.log(data.responseJSON.errors);
                        // clearing previous errors
                        $('.invalid-feedback').each(function(i, el){
                            $(el).html('');
                        });

                        $('.form-control').each(function(i, el){
                            $(el).removeClass('is-invalid');
                        });
                        if(!(typeof data.responseJSON.error === 'undefined')){
                            Swal.fire(
                                    'Attention!',
                                    'veullier selectionez un autre livreur',
                                    'warning'
                                    );
                        }
                        else{
                            // displaying new errors
                            $.each(data.responseJSON.errors, function (i, error) {
                            $(document).find('[name="' + i + '"]').addClass('is-invalid');
                            $('#' + i + '_error').html(error[0]);
                            
                            if(error[0]== 'veulliez choisir un autre livreur'){
                                Swal.fire(
                                    'Attention!',
                                    'veullier selectionez un autre livreur',
                                    'warning'
                                    );
                            }
                        });
                        }
                        
                        
                        }
                }
                });
        });
        $("#save").on('click', function (e) {
            document.getElementById("devis").checked = true;
            document.getElementById("valid").click();
         });

</script>
@endsection

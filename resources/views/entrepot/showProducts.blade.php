@extends('dashboard.layout')
@section('title', $title)
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{$title}}</h1>
</div>

<div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nom Produit</th>
                <th>Prix</th>
                <th>Quantite</th>
                <th>Categorie</th>
                <th>Retirer</th>
                <th>Transferer</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $pro)
            @if ($pro->entrepots()->where('entrepot_id',$ent->id)->first()->pivot->quantite <= $pro->entrepots()->where('entrepot_id',$ent->id)->first()->pivot->avert && $pro->entrepots()->where('entrepot_id',$ent->id)->first()->pivot->quantite > 0)
            <tr class="bg-warning">
                <td>{{$pro->name}}</td>
                <td>{{$pro->price}}</td>
                <td>{{$pro->entrepots()->where('entrepot_id',$ent->id)->first()->pivot->quantite}}</td>
                <td>{{$pro->categorie->nom}}</td>
                <td style="text-align:center">
                    <div class="btn-group">
                        <a title="Supprimer" class="btn btn-light afficher"
                            data-link="{{route('entrepot.dettach',[$id,$pro->id])}}" data-toggle="modal"
                            data-target="#delete"><span data-feather="trash-2"></span></a>
                    </div>
                </td>
                <td>
                    <a title="transferer" class="btn btn-light trans" data-productid="{{$pro->id}}"
                        data-product="{{$pro->name}}" data-entrepot="{{$ent->nom}}"
                        data-quantite="{{$pro->entrepots()->where('entrepot_id',$ent->id)->first()->pivot->quantite}}"
                        data-toggle="modal" data-target="#transferModal"><span data-feather="chevrons-right"></span></a>
                </td>
            </tr>
            @else
                @if ($pro->entrepots()->where('entrepot_id',$ent->id)->first()->pivot->quantite === 0)
                <tr class="bg-danger disabled">
                    <td>{{$pro->name}}</td>
                    <td>{{$pro->price}}</td>
                    <td>{{$pro->entrepots()->where('entrepot_id',$ent->id)->first()->pivot->quantite}}</td>
                    <td>{{$pro->categorie->nom}}</td>
                    <td style="text-align:center">
                        <div class="btn-group">
                            <a title="Supprimer" class="btn btn-light afficher"
                                data-link="{{route('entrepot.dettach',[$id,$pro->id])}}" data-toggle="modal"
                                data-target="#delete"><span data-feather="trash-2"></span></a>
                        </div>
                    </td>
                    <td>
                        <a title="transferer" class="btn btn-light disabled trans" data-productid="{{$pro->id}}"
                            data-product="{{$pro->name}}" data-entrepot="{{$ent->nom}}"
                            data-quantite="{{$pro->entrepots()->where('entrepot_id',$ent->id)->first()->pivot->quantite}}"
                            data-toggle="modal" data-target="#transferModal"><span data-feather="chevrons-right"></span></a>
                    </td>
                </tr>
                @else
                <tr class="bg-white">
                    <td>{{$pro->name}}</td>
                    <td>{{$pro->price}}</td>
                    <td>{{$pro->entrepots()->where('entrepot_id',$ent->id)->first()->pivot->quantite}}</td>
                    <td>{{$pro->categorie->nom}}</td>
                    <td style="text-align:center">
                        <div class="btn-group">
                            <a title="Supprimer" class="btn btn-light afficher"
                                data-link="{{route('entrepot.dettach',[$id,$pro->id])}}" data-toggle="modal"
                                data-target="#delete"><span data-feather="trash-2"></span></a>
                        </div>
                    </td>
                    <td>
                        <a title="transferer" class="btn btn-light trans" data-productid="{{$pro->id}}"
                            data-product="{{$pro->name}}" data-entrepot="{{$ent->nom}}"
                            data-quantite="{{$pro->entrepots()->where('entrepot_id',$ent->id)->first()->pivot->quantite}}"
                            data-toggle="modal" data-target="#transferModal"><span data-feather="chevrons-right"></span></a>
                    </td>
                </tr>
                 @endif


            @endif
            @empty
            <tr>
                <td colspan="8">Pas de produits.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div>
    Affichage de l’élément {{$products->firstItem()}} à {{$products->lastItem()}} sur {{$products->total()}} éléments
</div>
<div class="pagination justify-content-center">
    {{$products->links()}}
</div>
@include('components.confirmModal')
<div class="modal fade" id="transferModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Transferer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('entrepot.transfer')}}" id="transferer_form">
                    <div class="row">
                        <div class="col-md-6">
                            <label id="product"></label>
                            <label class="mt-3" id="entrepot"> </label>
                            <br>
                            <label class="mt-4" id="quantite"></label>
                        </div>
                        <div class="col-md-6">
                            {{-- Hidden elements --}}
                            <input type="hidden" name="or_quantite" id="or_quantite">
                            <input type="hidden" name='product_id' id="product_id">
                            <input type="hidden" name='entrepot_id' value="{{$ent->id}}">
                            {{-- inputs --}}
                            <div>
                                <label class="mt-2" for="entrepotdist_id">Entrepôt</label>
                                <select class="custom-select form-control" id="inputGroupSelect01" name="entrepotdist_id">
                                <option selected>choisir...</option>
                                    @foreach($entrepots as $ent)
                                        <option value="{{$ent->id}}">{{$ent->nom}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback" id="entrepotdist_id_error"></div>
                            </div>
                            <div>
                                <label class="mt-2" for="quantite">Quantité</label>
                                <input class="form-control" type="text" name="quantite" placeholder="quantite">
                                <div class="invalid-feedback" id="quantite_error"></div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="transferer" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $('.afficher').click(function(){
            $('#delete_form').attr('action', $(this).data('link'));
        });

        $('.trans').click(function(){
            $('#product').html($(this).data('product'));
            $('#product_id').attr('value',$(this).data('productid'));
            $('#or_quantite').attr('value',$(this).data('quantite'));
            $('#entrepot').html("entrepot : " + $(this).data('entrepot'));
            $('#quantite').html("quantite : " + $(this).data('quantite'));
        });

        $('#transferer').click(function(e){
            e.preventDefault();

            let form = $('#transferer_form');

            $.ajax({
                url: '{{route('entrepot.transfer')}}',
                data: form.serialize(),
                type: 'POST',
                success:function(data){
                    location.reload(); // TODO: clear errors
                },
                error :function( data ) {
                    if( data.status === 422 ) {
                        // clearing previous errors
                        $('.invalid-feedback').each(function(i, el){
                            $(el).html('');
                        });

                        $('.form-control').each(function(i, el){
                            $(el).removeClass('is-invalid');
                        });

                        // displaying new errors
                        $.each(data.responseJSON.errors, function (i, error) {
                            $(document).find('[name="' + i + '"]').addClass('is-invalid');
                            $('#' + i + '_error').html(error[0]);
                        });
                    }
                }
            });
        });
    </script>
@endsection

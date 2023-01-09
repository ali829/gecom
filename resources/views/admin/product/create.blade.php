@extends('admin.layout')


@section('content')
<div class="container-body">
    <!-- fixedbar Enregistrement -->
    <div class="fixed right-0 top-0 w-full z-50 bg-orange-300 shadow">
        <div class="flex justify-end">
            <div class="w-64 hidden lg:block">
            </div>
            <div class="container-body">
                <div class="container-forme">
                    <div class="colone-zone-1">
                        <!-- Sauvgarder + Supprimer -->
                        <div class="flex justify-end">
                            <button class="action-btn">
                                <i class="material-icons mr-1">
                                    cancel
                                </i>
                                Anuller
                            </button>
                            <button class="action-btn">
                                <i class="material-icons mr-1">
                                    save_alt
                                </i>
                                enregistrer
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Formulaire zone -->
    <div class="container-forme">
        <p class="forme-title">
            Noveau Produit
        </p>

        <!-- ligne 1 -->
        <div class="row">
            <!-- Générales -->
            <div class="colone-zone-2">
                <div class="zone-contenu">
                    <!-- titre -->
                    <div class="zone-title">
                        générale
                    </div>
                    <!--body forme-->
                    <div class="">
                        <div class="row-zone">
                            <!-- Désignation + Réf -->
                            <div class="container-item-2">
                                <label class="label-title" for="">Désignation</label>
                                <input class="input-zone" type="text" placeholder="Désignation">
                            </div>
                            <div class="container-item-2">
                                <label class="label-title" for="">Réf.</label>
                                <input class="input-zone" type="text" placeholder="Réf.">
                            </div>
                        </div>
                        <div class="row-zone">
                            <!-- Désignation -->
                            <div class="w-full mx-1">
                                <label class="label-title" for="">Déscription</label>
                                <textarea class="textarea-zone" name="" id="" cols="30" rows="10"
                                    placeholder="Déscription"></textarea>
                            </div>
                        </div>
                        <div class="row-zone">
                            <!-- Catégorie -->
                            <div class="container-item-1">
                                <label class="label-title" for="grid-categorie">Catégorie</label>
                                <div class="relative">
                                    <select
                                        class="block appearance-none w-full border border-orange-400 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white"
                                        id="grid-categorie">
                                        <option>Catégorie 1</option>
                                        <option>Catégorie 2</option>
                                        <option>Catégorie 3</option>
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Images -->
                <div class="row">
                    <div class="zone-contenu">
                        <!-- titre -->
                        <div class="zone-title">
                            Images
                        </div>
                        <!--body forme-->
                        <div class="md:flex items-start justify-start">
                            <div class="row-zone" id="upload_zone">
                                <button type="button" id="customButton" class="zone-upload">
                                    <div>
                                        <svg version="1.1" class="h-8 w-8 text-gray-700 mx-auto"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 60 60"
                                            style="enable-background:new 0 0 60 60;" xml:space="preserve">
                                            <g>
                                                <path
                                                    d="M50.975,20.694c-0.527-9-7.946-16.194-16.891-16.194c-5.43,0-10.688,2.663-13.946,7.008
                                              c-0.074-0.039-0.153-0.065-0.228-0.102c-0.198-0.096-0.399-0.188-0.605-0.269c-0.115-0.045-0.23-0.086-0.346-0.127
                                              c-0.202-0.071-0.406-0.133-0.615-0.19c-0.116-0.031-0.231-0.063-0.349-0.09c-0.224-0.051-0.452-0.09-0.683-0.124
                                              c-0.102-0.015-0.202-0.035-0.305-0.047C16.677,10.523,16.341,10.5,16,10.5c-4.962,0-9,4.037-9,9c0,0.129,0.007,0.255,0.016,0.381
                                              C2.857,22.148,0,26.899,0,31.654C0,38.737,5.762,44.5,12.845,44.5H18c0.552,0,1-0.447,1-1s-0.448-1-1-1h-5.155
                                              C6.865,42.5,2,37.635,2,31.654c0-4.154,2.705-8.466,6.432-10.253L9,21.13V20.5c0-0.123,0.008-0.249,0.015-0.375l0.009-0.175
                                              l-0.012-0.188C9.007,19.675,9,19.588,9,19.5c0-3.859,3.14-7,7-7c0.309,0,0.614,0.027,0.917,0.067
                                              c0.078,0.01,0.155,0.023,0.232,0.036c0.268,0.044,0.532,0.102,0.792,0.177c0.034,0.01,0.069,0.016,0.102,0.026
                                              c0.286,0.087,0.565,0.198,0.838,0.322c0.069,0.031,0.137,0.065,0.205,0.099c0.242,0.119,0.479,0.251,0.707,0.399
                                              C21.72,14.875,23,17.039,23,19.5c0,0.553,0.448,1,1,1s1-0.447,1-1c0-2.754-1.246-5.219-3.2-6.871
                                              C24.666,8.879,29.388,6.5,34.084,6.5c7.744,0,14.178,6.135,14.848,13.887c-1.022-0.072-2.553-0.109-4.083,0.125
                                              c-0.546,0.083-0.921,0.593-0.838,1.139c0.075,0.495,0.501,0.85,0.987,0.85c0.05,0,0.101-0.004,0.152-0.012
                                              c2.224-0.336,4.543-0.021,4.684-0.002C54.49,23.372,58,27.661,58,32.472C58,38.001,53.501,42.5,47.972,42.5H44
                                              c-0.552,0-1,0.447-1,1s0.448,1,1,1h3.972C54.604,44.5,60,39.104,60,32.472C60,26.983,56.173,22.06,50.975,20.694z" />
                                                <path
                                                    d="M31.708,30.794c-0.092-0.093-0.203-0.166-0.326-0.217c-0.244-0.101-0.52-0.101-0.764,0
                                              c-0.123,0.051-0.233,0.124-0.326,0.217l-7.999,7.999c-0.391,0.391-0.391,1.023,0,1.414C22.488,40.402,22.744,40.5,23,40.5
                                              s0.512-0.098,0.707-0.293L30,33.914V54.5c0,0.553,0.448,1,1,1s1-0.447,1-1V33.914l6.293,6.293C38.488,40.402,38.744,40.5,39,40.5
                                              s0.512-0.098,0.707-0.293c0.391-0.391,0.391-1.023,0-1.414L31.708,30.794z" />
                                            </g>
                                        </svg>
                                        <p class="block text-grey text-xs font-semibold">Choisir une image</p>
                                        <p class="block text-grey text-xs font-semibold">(.JPEG, .PNG Ou .GIF)</p>
                                    </div>
                                </button>
                            </div>
                            <div class="image-uploaded">
                                <div class="static">
                                    <img src="https://picsum.photos/1980" class="image-cover">
                                </div>
                                <div class="absolute top-0 right-0">
                                    <button type="button" class="action-btn-rnd">
                                        <i class="material-icons">cancel</i>
                                    </button>
                                </div>
                            </div>
                            <div class="image-uploaded">
                                <div class="static">
                                    <img src="https://picsum.photos/1980" class="image-cover">
                                </div>
                                <div class="absolute top-0 right-0">
                                    <button type="button" class="action-btn-rnd">
                                        <i class="material-icons">cancel</i>
                                    </button>
                                </div>
                            </div>
                            <div class="image-uploaded">
                                <div class="static">
                                    <img src="https://picsum.photos/1980" class="image-cover">
                                </div>
                                <div class="absolute top-0 right-0">
                                    <button type="button" class="action-btn-rnd">
                                        <i class="material-icons">cancel</i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Lien video -->
                <div div class="zone-contenu">
                    <div class="container-item-1">
                        <!-- titre -->
                        <div class="zone-title">
                            Lien Video
                        </div>
                        <div class="flex items-start justify-start">
                            <span class="input-zone-indice">
                                <i class="material-icons text-xs">
                                    share
                                </i>
                            </span>
                            <input class="input-zone-indiced" type="text" placeholder="Lien Video">
                        </div>
                    </div>
                </div>
            </div>
            <!-- logistique -->
            <div class="colone-zone-3">
                <div class="zone-contenu">
                    <!-- titre -->
                    <div class="zone-title">
                        Quantités de vente
                    </div>
                    <!--body forme-->
                    <div class="">
                        <!-- Qantité limites -->
                        <div class="row-zone">
                            <!-- Qantités Min -->
                            <div class="container-item-2">
                                <label class="label-title" for="">Quantité Min</label>
                                <div class="flex items-start justify-start">
                                    <span class="input-zone-indice">Min</span>
                                    <input class="input-zone-indiced" type="text" placeholder="Min.">
                                </div>
                            </div>
                            <!-- Qantité Max -->
                            <div class="container-item-2">
                                <label class="label-title" for="">Quantité Max</label>
                                <div class="flex items-start justify-start">
                                    <span class="input-zone-indice">Max</span>
                                    <input class="input-zone-indiced" type="text" placeholder="Max.">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Digital produit -->
                    <div class="row-zone mt-5">
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox">
                            <span class="ml-2 font-semibold text-gray-700">Ce Produit est Digitale ?</span>
                        </label>
                    </div>
                    
                    <!-- Poids -->
                    <div class="">
                        <!-- titre -->
                        <div class="zone-title">
                            Poid
                        </div>
                        <!--body forme-->
                        <div class="">
                            <!-- Poid -->
                            <div class="row-zone">
                                <!-- poid Net -->
                                <div class="container-item-2">
                                    <label class="label-title" for="">Poid Net</label>
                                    <div class="flex items-start justify-start">
                                        <span class="input-zone-indice">Kg</span>
                                        <input class="input-zone-indiced" type="text" placeholder="00.">
                                    </div>
                                </div>
                                <!-- Poid Embalé -->
                                <div class="container-item-2">
                                    <label class="label-title" for="">Poid Embalé</label>
                                    <div class="flex items-start justify-start">
                                        <span class="input-zone-indice">Kg</span>
                                        <input class="input-zone-indiced" type="text" placeholder="00.">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Dimmenssion -->
                    <div class="">
                        <!-- titre -->
                        <div class="zone-title">
                            Dimenssions
                        </div>
                        <!--body forme-->
                        <div class="">
                            <!-- Dimenssions -->
                            <!-- Largeur -->
                            <div class="container-item-1">
                                <label class="label-title" for="">Largeur</label>
                                <div class="flex items-start justify-start">
                                    <span class="input-zone-indice">m</span>
                                    <input class="input-zone-indiced" type="text" placeholder="00.">
                                </div>
                            </div>
                            <!-- langeur -->
                            <div class="container-item-1">
                                <label class="label-title" for="">Longeur</label>
                                <div class="flex items-start justify-start">
                                    <span class="input-zone-indice">m</span>
                                    <input class="input-zone-indiced" type="text" placeholder="00.">
                                </div>
                            </div>
                            <!-- Hauteur -->
                            <div class="container-item-1">
                                <label class="label-title" for="">Hauteur</label>
                                <div class="flex items-start justify-start">
                                    <span class="input-zone-indice">m</span>
                                    <input class="input-zone-indiced" type="text" placeholder="00.">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- line 2 -->
        <div class="row">
            <!-- Options + Variantes -->
            <div class="colone-zone-2">
                <div class="zone-contenu">
                    <div class="line-and-block">
                        <!-- Options -->
                        <div class="forme-zone-1">
                            <!-- titre -->
                            <div class="zone-title">
                                Options
                            </div>
                            <!-- option ligne  -->
                            <div class="container-item-1">
                                <div>
                                    <div class="flex items-center justify-between">
                                        <label class="label-title" for="">option 1</label>
                                        <button class="action-btn-simple">
                                            <i class="material-icons">
                                                delete_forever
                                            </i>
                                        </button>
                                    </div>
                                    <div class="md:flex">
                                        <div class="w-full md:w-1/3 my-1 md:my-0 md:mx-1">
                                            <input class="input-zone" type="text" placeholder="Option 1">
                                        </div>
                                        <div class="input-zone">
                                        </div>
                                    </div>
                                </div>
                                <div class="border-b border-gray-400 mt-2"></div>
                                <button class="action-btn">
                                    <i class="material-icons mr-1">
                                        add_circle
                                    </i>
                                    New option
                                </button>
                            </div>
                        </div>
                        <!-- Variantes -->
                        <div class="forme-zone-1 border-t border-gray-400">
                            <!-- titre -->
                            <div class="zone-title">
                                Variantes
                            </div>
                            <div class="row-zone">
                                <!-- Variante table  -->
                                <div class="container-item-1">
                                    <div class="container-table">
                                        <!--Titre-->
                                        <div class="px-5 py-3">
                                            <span class="titre-table">
                                                Produits de l'entre
                                            </span>
                                        </div>
                                        <table class="auto-table">
                                            <thead>
                                                <tr>
                                                    <th class="th-table">variante</th>
                                                    <th class="th-table">réf.</th>
                                                    <th class="th-table">quantité</th>
                                                    <th class="th-table">entrepôt</th>
                                                    <th class="th-table">prix</th>
                                                    <th class="th-table">image</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="tr-table">
                                                    <td class="td-table">
                                                        <input class="input-zone" type="text">
                                                    </td>
                                                    <td class="td-table">
                                                        <input class="input-zone" type="text">
                                                    </td>
                                                    <td class="td-table">
                                                        <input class="input-zone" type="text">
                                                    </td>
                                                    <td class="td-table">
                                                        <div class="relative">
                                                            <select
                                                                class="block appearance-none w-full border border-orange-400 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white"
                                                                id="grid-entrepot">
                                                                <option>Entrepôt 1</option>
                                                                <option>Entrepôt 2</option>
                                                                <option>Entrepôt 3</option>
                                                            </select>
                                                            <div
                                                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                                <svg class="fill-current h-4 w-4"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 20 20">
                                                                    <path
                                                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="td-table">
                                                        <div class="flex items-start justify-start">
                                                            <span class="input-zone-indice">
                                                                MAD.
                                                            </span>
                                                            <input class="input-zone-indiced" type="text">
                                                        </div>
                                                    </td>
                                                    <td class="td-table">
                                                        <div class="flex justify-end">
                                                            <button class="action-btn-simple">
                                                                <i class="material-icons">
                                                                    add_photo_alternate
                                                                </i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Parametres -->
            <div class="colone-zone-3">
                <div class="zone-contenu">
                    <!-- Visibilité -->
                    <div>
                        <!-- titre -->
                        <div class="zone-title">
                            Paramétres
                        </div>
                        <!--body forme-->
                        <div class="">
                            <div class="row-zone items-end justify-between">
                                <span class="label-title">
                                    Visible en Stock ? :
                                </span>
                                <div class="" id="visible">
                                    <switchonoff></switchonoff>
                                </div>
                            </div>
                            <div class="row-zone items-end justify-between">
                                <span class="label-title">
                                    visible en site Web ? :
                                </span>
                                <div class="" id="visible">
                                    <switchonoff></switchonoff>
                                </div>
                            </div>
                            <div class="row-zone items-end justify-between">
                                <span class="label-title">
                                    Livrable ? :
                                </span>
                                <div class="" id="visible">
                                    <switchonoff></switchonoff>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ligne 3 -->
        <div class="row">
            <!-- Sauvgarder + Supprimer -->
            <div class="colone-zone-1">
                <div class="border-t py-3 my-3 flex flex-row-reverse justify-between">
                    <button class="action-btn">
                        <i class="material-icons mr-1">
                            save_alt
                        </i>
                        enregistrer
                    </button>
                    <button class="action-btn">
                        <i class="material-icons mr-1">
                            delete_forever
                        </i>
                        Supprimer
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('script')
<script>
    new Vue({
        el: "#visible"

    });

</script>
@endsection

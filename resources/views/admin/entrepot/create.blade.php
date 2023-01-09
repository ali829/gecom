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
            Nouveau Entrepôt
        </p>

        <!-- ligne 1 -->
        <div class="row">
            <div class="colone-zone-2">
                <!-- Générales -->
                <div class="zone-contenu">
                    <!-- titre -->
                    <div class="zone-title">
                        générale
                    </div>
                    <!--body forme-->
                    <div class="">
                        <div class="row-zone">
                            <!-- Désignation -->
                            <div class="container-item-1">
                                <label class="label-title" for="">Désignation</label>
                                <input class="input-zone" type="text" placeholder="Désignation">
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
                            <!-- Ville -->
                            <div class="container-item-1">
                                <label class="label-title" for="grid-categorie">Ville</label>
                                <div class="relative">
                                    <select
                                        class="block appearance-none w-full border border-orange-400 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white"
                                        id="grid-categorie">
                                        <option>Kenitra</option>
                                        <option>Rabat</option>
                                        <option>Casablanca</option>
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
                <!-- Images-->
                <div class="zone-contenu">
                    <!-- titre -->
                    <div class="zone-title">
                        Dimenssions
                    </div>
                    <!--body forme-->
                    <div class="">
                        <!-- Dimenssions -->
                        <div class="row-zone">
                            <!-- Largeur -->
                            <div class="container-item-3">
                                <label class="label-title" for="">Largeur</label>
                                <div class="flex items-start justify-start">
                                    <span class="input-zone-indice">m</span>
                                    <input class="input-zone-indiced" type="text" placeholder="00.">
                                </div>
                            </div>
                            <!-- langeur -->
                            <div class="container-item-3">
                                <label class="label-title" for="">Longeur</label>
                                <div class="flex items-start justify-start">
                                    <span class="input-zone-indice">m</span>
                                    <input class="input-zone-indiced" type="text" placeholder="00.">
                                </div>
                            </div>
                            <!-- Hauteur -->
                            <div class="container-item-3">
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
                                    Ouvert :
                                </span>
                                <div class="" id="visible">
                                    <switchonoff></switchonoff>
                                </div>
                            </div>
                            <div class="row-zone items-end justify-between">
                                <span class="label-title">
                                    visible en Stock :
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
        <!-- ligne 2 -->
        <div class="row">
            <div class="zone-contenu">
                <div class="colone-zone-1">
                    <!-- titre -->
                    <div class="zone-title">
                        En Stock
                    </div>
                    <!-- Table -->
                    <div class="container-table">
                        <!--Titre-->
                        <div class="px-5 py-3">
                            <span class="titre-table">
                                Produits
                            </span>
                        </div>
                        <table class="auto-table">
                            <thead>
                                <tr>
                                    <th class="th-table">Produit</th>
                                    <th class="th-table">Variante</th>
                                    <th class="th-table">Quantité</th>
                                    <th class="th-table">Qte Min.</th>
                                    <th class="th-table">Etat</th>
                                    <th class="th-table"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tr-table">
                                    <td class="td-table">
                                        Titre Produit
                                    </td>
                                    <td class="td-table">
                                        Titre Variante
                                    </td>
                                    <td class="td-table">
                                        <input class="input-zone" type="text" placeholder="00.">
                                    </td>
                                    <td class="td-table">
                                        <div class="w-2/3 flex items-start justify-start">
                                            <span class="input-zone-indice">Min.</span>
                                            <input class="input-zone-indiced" type="text" placeholder="00.">
                                        </div>
                                    </td>
                                    <td class="td-table">
                                        <div class="container-ligne">
                                            <span class="info-etat">
                                                panding
                                            </span>
                                        </div>
                                    </td>
                                    <td class="td-table">
                                        <div class="flex justify-end">
                                            <button class="action-btn-simple">
                                                <i class="material-icons">
                                                    delete_forever
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
        <!-- ligne 3 -->
        <div class="row">
            <div class="colone-zone-1">
                <!-- Sauvgarder + Supprimer -->
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

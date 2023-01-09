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
            Novelle livraison
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
                                <label class="label-title" for="">Date de Livraison</label>
                                <input class="input-zone" type="text" placeholder="Date Pcker">
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
                                <label class="label-title" for="">Etat D'urgence</label>
                                <input class="input-zone" type="text" placeholder=" Urgent, ....">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- line 2 -->
        <div class="row">
            <!-- Commande + livreur  -->
            <div class="colone-zone-2">
                <div class="zone-contenu">
                    <div class="row">
                        <!-- Choix de Commandes -->
                        <div class="container-item-2">
                            <label class="label-title" for="grid-categorie">Choisissez la Commande</label>
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full border border-orange-400 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white"
                                    id="grid-commande">
                                    <option>commande 1</option>
                                    <option>commande 2</option>
                                    <option>commande 3</option>
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
                        <!-- Choix de Livreur -->
                        <div class="container-item-2">
                            <label class="label-title" for="grid-categorie">Choisissez le Livreur</label>
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full border border-orange-400 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white"
                                    id="grid-livreur">
                                    <option>Livreur 1</option>
                                    <option>Livreur 2</option>
                                    <option>Livreur 3</option>
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

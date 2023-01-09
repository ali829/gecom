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
            Noveau Transfert
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
                    </div>
                </div>
            </div>
            <!-- logistique -->
            <div class="colone-zone-3">
                <div class="zone-contenu">
                    <!--body forme-->
                    <div class="my-5">
                        <!-- Date -->
                        <div class="row-zone">
                            <div class="container-item-1">
                                <label class="label-title" for="">Date d'Envois</label>
                                    <input class="input-zone" type="text" placeholder="Date">
                            </div>
                        </div>
                    </div>
                    <div class="my-5">
                        <!-- Emplacements -->
                        <div class="row-zone">
                            <!-- Entrepot origne -->
                            <div class="container-item-2">
                                <label class="label-title" for="">Origine</label>
                                    <input class="input-zone" type="text" placeholder="Origine">
                            </div>
                            <!-- Entrepot Destination -->
                            <div class="container-item-2">
                                <label class="label-title" for="">Destination</label>
                                    <input class="input-zone" type="text" placeholder="Destination">
                            </div>
                        </div>
                    </div>

                    <div class="my-5">
                        <!--body forme-->
                        <div class="row-zone">
                            <!-- Importance -->
                            <div class="container-item-1">
                                <label class="label-title" for="">Etat</label>
                                    <input class="input-zone" type="text" placeholder="Ajouter Tag">
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
                        <!-- sélectionner produits  -->
                        <div class="forme-zone-1">
                            <!-- titre -->
                            <div class="zone-title">
                                sélectionner produits 
                            </div>
                            <div class="container-item-1">
                                <div class="row">
                                    <input class="input-zone" type="text" placeholder="Selectionner Produit">
                                </div>
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
                                        <table class="auto-table">
                                            <thead>
                                                <tr>
                                                    <th class="th-table"></th>
                                                    <th class="th-table">variante</th>
                                                    <th class="th-table">Qté Origine</th>
                                                    <th class="th-table">Qté Desitination</th>
                                                    <th class="th-table">Qté Transfert</th>
                                                    <th class="th-table"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="td-table"  colspan="6">
                                                        1er Produit
                                                    </td>
                                                </tr>
                                                <tr class="tr-table">
                                                    <td class="td-table"></td>
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
                                                        <input class="input-zone" type="text">
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
                                                <tr class="tr-table">
                                                    <td class="td-table"></td>
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
                                                        <input class="input-zone" type="text">
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
                                                <tr>
                                                    <td class="td-table"  colspan="6">
                                                        2éme Produit
                                                    </td>
                                                </tr>
                                                <tr class="tr-table">
                                                    <td class="td-table"></td>
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
                                                        <input class="input-zone" type="text">
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

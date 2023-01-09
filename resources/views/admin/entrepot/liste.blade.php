@extends('admin.layout')

@section('content')
<div class="container-body">

    <div class="flex justify-end">
        <button class="action-btn">
            <i class="material-icons mr-1">
                add_circle
            </i>
            Ajouter entrepôt
        </button>
    </div>

    <!-- Table -->
    <div class="container-table">
        <!--Titre-->
        <div class="px-5 py-3">
            <span class="titre-table flex items-center">
                <i class="material-icons text-orange-500 mr-1">
                    house
                  </i>
                entrepots
            </span>
        </div>
        <table class="auto-table">
            <thead>
                <tr>
                    <th class="th-table">Designation</th>
                    <th class="th-table">Description</th>
                    <th class="th-table">Ville</th>
                    <th class="th-table">Produits</th>
                    <th class="th-table">Capacité</th>
                    <th class="th-table">Etat</th>
                </tr>
            </thead>
            <tbody>
                <tr class="tr-table">
                    <td class="td-table">Intro to CSS</td>
                    <td class="td-table">Adam</td>
                    <td class="td-table">Kenitra</td>
                    <td class="td-table">858</td>
                    <td class="td-table">20%</td>
                    <td class="td-table">Ouvert</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="container-body">

    <div class="flex justify-end">
        <button class="action-btn">
            <i class="material-icons mr-1">
                add_circle
            </i>
            Nouveau transfert
        </button>
    </div>

    <!-- Table -->
    <div class="container-table">
        <!--Titre-->
        <div class="px-5 py-3">
            <span class="titre-table flex items-center">
                <i class="material-icons text-orange-500 mr-1">
                    compare_arrows
                  </i>
                Transferts
            </span>
        </div>
        <table class="auto-table">
            <thead>
                <tr>
                    <th class="th-table">Date</th>
                    <th class="th-table">Origine</th>
                    <th class="th-table">Destination</th>
                    <th class="th-table">Nbr Articles</th>
                    <th class="th-table">Etat</th>
                </tr>
            </thead>
            <tbody>
                <tr class="tr-table">
                    <td class="td-table">Intro to CSS</td>
                    <td class="td-table">Adam</td>
                    <td class="td-table">Kenitra</td>
                    <td class="td-table">858</td>
                    <td class="td-table">Ouvert</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

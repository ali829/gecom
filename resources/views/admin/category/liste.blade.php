@extends('admin.layout')

@section('content')
<div class="container-body">

    <div class="flex justify-end">
      <button class="action-btn">
        <i class="material-icons mr-1">
          add_circle
        </i>
        Ajouter categorie
    </button>
    </div>

    <!-- Table -->
    <div class="container-table">
      <!--Titre-->
      <div class="px-5 py-3">
        <span class="titre-table flex items-center">
          <i class="material-icons text-orange-500 mr-1">
            storage
            </i>
          Catégories
          </span>
      </div>
      <table class="auto-table">
        <thead>
          <tr>
            <th class="th-table">Image</th>
            <th class="th-table">Designation</th>
            <th class="th-table">Description</th>
            <th class="th-table">Sous Catégories</th>
            <th class="th-table">Produits</th>
          </tr>
        </thead>
        <tbody>
          <tr class="tr-table">
            <td class="td-table">
              <img class="image-table" src="https://picsum.photos/200" alt="">
            </td>
            <td class="td-table">Intro to CSS</td>
            <td class="td-table">Adam</td>
            <td class="td-table">858</td>
            <td class="td-table">858</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
@endsection
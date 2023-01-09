@extends('admin.layout')

@section('content')
<div class="container-body">

    <!-- Table -->
    <div class="container-table">
      <!--Titre-->
      <div class="px-5 py-3">
        <span class="titre-table flex items-center">
          <i class="material-icons text-orange-500 mr-1">
            devices_other
            </i>
          Produits
        </span>
      </div>
      <table class="auto-table">
        <thead>
          <tr>
            <th class="th-table">Image</th>
            <th class="th-table">Designation</th>
            <th class="th-table">Catégorie</th>
            <th class="th-table">Variantes</th>
            <th class="th-table">Stock</th>
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
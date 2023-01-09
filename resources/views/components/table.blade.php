@extends('admin.layout')

@section('content')
<div class="container-body">

  @if(isset($create_route))
  <div class="flex justify-end">
    <a class="action-btn" 
    href="{{is_array($create_route)?route($create_route[0], $create_route[1]):route($create_route)}}">
      <i class="material-icons mr-1">
        add_circle
      </i>
      {{$custom_add??'Ajouter'}}
  </a>
  </div>
  @endif

    <!-- Table -->
    <div class="container-table">
      <!--Titre-->
      <div class="px-5 py-3">
        <span class="titre-table flex items-center">
          <i class="material-icons text-orange-500 mr-1">
            devices_other
            </i>
            {{$title}}
        </span>
      </div>
      <table class="auto-table">
        <thead>
          <tr>
            @foreach ($columns as $column => $var)
                    <th class="th-table">{{$column}}</th>
                @endforeach
          </tr>
        </thead>
        <tbody>
          @forelse($data as $d)
          <tr class="tr-table">
              @foreach ($columns as $column => $var)
                  @if (!is_array($var))
                      <td class="td-table">{{$d->$var}}</td>
                  @else
                  @endif
              @endforeach
          </tr>
      @empty
          <tr class="tr-table">
              <td colspan="{{count($columns)}}" class="td-table">
                  Pas de {{$model_name}}s.
              </td>
          </tr>
      @endforelse
        </tbody>
      </table>
    </div>
    <!-- pagination -->
    <div class="px-4">
      <div class="text-sm">
          Affichage de l’élément {{$data->firstItem()}} à {{$data->lastItem()}} sur {{$data->total()}}
          éléments
      </div>
      <div class="pagination justify-content-center py-4">
          {{$data->links()}}
      </div>
  </div>
  </div>
@endsection

@section('script')
@parent
<script>
    $('.afficher').click(function(e){
        e.preventDefault();
        $('#delete_form').attr('action', $(this).attr('href'));
        Swal.fire({
            title: 'Suppression',
            text: "Êtes-vous sûr de vouloir supprimer ce {{$model_name}}?",
            showCancelButton: true,
            confirmButtonColor: '#E53E3E',
            cancelButtonColor: '#A0AEC0',
            confirmButtonText: 'Oui, Supprimer',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.value) {
                $('#delete_form').submit();
            }
        })
    });
</script>
@endsection
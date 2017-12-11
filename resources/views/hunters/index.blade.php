@extends('layouts.layout')

@section('pageTitle', 'Sociétaires')

@section('content')

    @include('layouts.messages')

    <table id="hunters" class="table" role="grid">


        <div class="text-right">
            <label for="activeOnly">Afficher seulement les sociétaires actif </label>

            <input id="activeOnly" name="activeOnly" type="checkbox" checked>
        </div>

        <thead>
            <th>ID</th>
            <th>Titre</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Adresse</th>
            <th>Code postal</th>
            <th>Ville</th>
            <th>Actif</th>
            <th></th>
            @if (Auth::user()->isAdmin())
                <th></th>
            @endif
        </thead>
        <tbody>
            @foreach ($hunters as $hunter)
                <tr>
                    <td><a href="{{ route('showHunter', ['hunter' => $hunter->id]) }}">{{ $hunter->id }}</a></td>
                    <td>{{ $hunter->title->abbreviation }}</td>
                    <td>{{ $hunter->lastName }}</td>
                    <td>{{ $hunter->firstName }}</td>
                    <td>{{ $hunter->address->label }}</td>
                    <td>{{ $hunter->address->city->postalCode->label }}</td>
                    <td>{{ $hunter->address->city->label }}</td>
                    <td>{{ $hunter->active == true ? 'Oui' : 'Non' }}</td>
                    <td><a class="btn btn-default glyphicon glyphicon-pencil" href="{{ route('editHunter', ['hunter' =>  $hunter->id]) }}"></a></td>
                    @if (Auth::user()->isAdmin())
                        <td><a class="btn btn-default glyphicon glyphicon-remove" href="{{ route('deleteConfirmHunter', ['hunter' =>  $hunter->id]) }}"></a></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <th>ID</th>
            <th>Titre</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Adresse</th>
            <th>Code postal</th>
            <th>Ville</th>
            <th>Actif</th>
            <th></th>
            @if (Auth::user()->isAdmin())
                <th></th>
            @endif
        </tfoot>
    </table>

@endsection

@section('script')
    <script>


    $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
            if ($('#activeOnly:checked').val() == "on") {
                if ( data[7] == "Oui" )
                {
                    return true;
                }
                return false;
            }else{
                return true;
            }
        }
    );

    $(document).ready(function() {
        var hunters = $('#hunters').DataTable({
            columnDefs: [
                { orderable: false, targets: -1 },
                { orderable: false, targets: -2 }
            ],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/French.json"
            }
        });
        $('#activeOnly:checkbox').change(function() {
            hunters.draw();
        } );
    } );

    </script>

@endsection

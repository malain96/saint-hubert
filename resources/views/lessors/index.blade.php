@extends('layouts.layout')

@section('pageTitle', 'Bailleurs')

@section('content')

    @include('layouts.messages')

    <table id="lessors" class="table" role="grid">

        <div class="text-right">
            <label for="validOnly">Afficher seulement les bailleurs valide </label>

            <input id="validOnly" name="validOnly" type="checkbox" checked>
        </div>

        <thead>
            <th>ID</th>
            <th>Titre</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Adresse</th>
            <th>Code postal</th>
            <th>Ville</th>
            <th>Hectares</th>
            <th>Prix</th>
            <th>Validité</th>
            <th></th>
            @if (Auth::user()->isAdmin())
                <th></th>
            @endif
        </thead>
        <tbody>
            @foreach ($lessors as $lessor)
                <tr>
                    <td><a href="{{ route('showLessor', ['lessor' => $lessor->id ] ) }}">{{ $lessor->id }}</a></td>
                    <td>{{ $lessor->title->abbreviation }}</td>
                    <td>{{ $lessor->lastName }}</td>
                    <td>{{ $lessor->firstName }}</td>
                    <td>{{ $lessor->address->label }}</td>
                    <td>{{ $lessor->address->city->postalCode->label }}</td>
                    <td>{{ $lessor->address->city->label }}</td>
                    <td>{{ str_replace('.',',',$lessor->hectares + 0) }}</td>
                    <td>{{ str_replace('.',',',$lessor->price + 0) }}</td>
                    <td>{{ $lessor->validityDate }}</td>
                    <td><a class="btn btn-default glyphicon glyphicon-pencil" href="{{ route('editLessor', ['lessor' => $lessor->id ] ) }}"></a></td>
                    @if (Auth::user()->isAdmin())
                        <td><a class="btn btn-default glyphicon glyphicon-remove" href="{{ route('deleteConfirmLessor', ['lessor' => $lessor->id ] ) }}"></a></td>
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
            <th>Hectares</th>
            <th>Prix</th>
            <th>Validité</th>
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

            var date = new Date();
            var year = date.getFullYear();

            if ($('#validOnly:checked').val() == "on") {
                if ( data[9] >= year )
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
        var lessors = $('#lessors').DataTable({
            columnDefs: [
                { orderable: false, targets: -1 },
                { orderable: false, targets: -2 }
            ],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/French.json"
            }
        });
        $('#validOnly:checkbox').change(function() {
            lessors.draw();
        } );
    } );

    </script>

@endsection

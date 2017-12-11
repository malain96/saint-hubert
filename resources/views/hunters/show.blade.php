@extends('layouts.layout')

@section('pageTitle', 'Sociétaire')

@section('content')

    @include('layouts.errors')

    <form method="post" action="{{ route('patchHunter', ['hunter'=>  $hunter->id]) }}">

        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group">

            <label for="id">Identifiant</label>

            <input type="text" class="form-control" id="id" name="id" value="{{ $hunter->id }}" disabled>

        </div>

        <div class="from-group">

            <label for="title">Titre</label>

            <select class="form-control" id="title" name="title" disabled>

                @foreach ($titles as $title)

                    <option value="{{ $title->id }}">{{ $title->label }}</option>

                @endforeach

            </select>
        </div>

        <div class="form-group">

            <label for="lastName">Nom</label>

            <input type="text" class="form-control" id="lastName" name="lastName" style="text-transform:uppercase" value="{{ $hunter->lastName }}" required disabled>

        </div>

        <div class="form-group">

            <label for="firstName">Prénom</label>

            <input type="text" class="form-control" id="firstName" name="firstName" value="{{ $hunter->firstName }}" required disabled>

        </div>

        <div class="form-group">

            <label for="address">Adresse</label>

            <input type="text" class="form-control" id="address" name="address" value="{{ $hunter->address->label }}" required disabled>

        </div>

        <div class="form-group">

            <label for="postalCode">Code Postal</label>

            <input type="text" class="form-control" id="postalCode" name="postalCode" value="{{ $hunter->address->city->postalCode->label }}" required disabled>

        </div>

        <div class="form-group">

            <label for="city">Ville</label>

            <input type="text" class="form-control" id="city" name="city" style="text-transform:uppercase" value="{{ $hunter->address->city->label }}" required disabled>

        </div>

        <div class="form-group">

            <label for="active">Actif</label>

            <select class="form-control" name="active" id="active" disabled>
                <option value="1" {{ $hunter->active == true ? 'selected' : '' }}>Oui</option>
                <option value="0" {{ $hunter->active != true ? 'selected' : '' }}>Non</option>
            </select>

        </div>

        <button id='modify' type="button" class="btn btn-primary">Modifier</button>

        <div id='submit' style="display:none;">
            <button type="submit" class="btn btn-success">Valider</button>
            <a class="btn btn-danger" href="{{ route('hunters') }}">Annuler</a>
        </div>

    </form>


@endsection

@section('script')
    <script>
    $('#modify').click(function(){
        $('#firstName').prop('disabled', false);
        $('#lastName').prop('disabled', false);
        $('#title').prop('disabled', false);
        $('#address').prop('disabled', false);
        $('#postalCode').prop('disabled', false);
        $('#city').prop('disabled', false);
        $('#active').prop('disabled', false);
        $('#submit').show();
        $('#modify').hide();
});
    </script>

@endsection

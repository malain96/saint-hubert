@extends('layouts.layout')

@section('pageTitle', 'Modifier un Sociétaire')

@section('content')

    @include('layouts.errors')

    <form method="post" action="{{ route('patchHunter', ['hunter' =>  $hunter->id]) }}">

        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="from-group">

            <label for="title">Titre</label>

            <select class="form-control" id="title" name="title">

                @foreach ($titles as $title)

                    <option value="{{ $title->id }}">{{ $title->label }}</option>

                @endforeach

            </select>
        </div>

        <div class="form-group">

            <label for="lastName">Nom</label>

            <input type="text" class="form-control" id="lastName" name="lastName" style="text-transform:uppercase" value="{{ $hunter->lastName }}" required>

        </div>

        <div class="form-group">

            <label for="firstName">Prénom</label>

            <input type="text" class="form-control" id="firstName" name="firstName" value="{{ $hunter->firstName }}" required>

        </div>

        <div class="form-group">

            <label for="address">Adresse</label>

            <input type="text" class="form-control" id="address" name="address" value="{{ $hunter->address->label }}" required>

        </div>

        <div class="form-group">

            <label for="postalCode">Code Postal</label>

            <input type="text" class="form-control" id="postalCode" name="postalCode" value="{{ $hunter->address->city->postalCode->label }}" required>

        </div>

        <div class="form-group">

            <label for="city">Ville</label>

            <input type="text" class="form-control" id="city" name="city" style="text-transform:uppercase" value="{{ $hunter->address->city->label }}" required>

        </div>

        <div class="form-group">

            <label for="active">Actif</label>

            <select class="form-control" name="active" id="active">
                <option value="1" {{ $hunter->active == true ? 'selected' : '' }}>Oui</option>
                <option value="0" {{ $hunter->active != true ? 'selected' : '' }}>Non</option>
            </select>

        </div>

        <button type="submit" class="btn btn-primary">Valider</button>

    </form>

@endsection

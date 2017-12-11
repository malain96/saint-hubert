@extends('layouts.layout')

@section('pageTitle', 'Ajouter un Socétaire')

@section('content')

    @include('layouts.errors')

    <form method="post" action="{{ route('storeHunter') }}">

        {{ csrf_field() }}

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

            <input type="text" class="form-control" id="lastName" name="lastName" style="text-transform:uppercase" placeholder="Nom" required>

        </div>

        <div class="form-group">

            <label for="firstName">Prénom</label>

            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Prénom" required>

        </div>

        <div class="form-group">

            <label for="address">Adresse</label>

            <input type="text" class="form-control" id="address" name="address" placeholder="Adresse" required>

        </div>

        <div class="form-group">

            <label for="postalCode">Code Postal</label>

            <input type="text" class="form-control" id="postalCode" name="postalCode" placeholder="Code Postal" required>

        </div>

        <div class="form-group">

            <label for="city">Ville</label>

            <input type="text" class="form-control" id="city" name="city" style="text-transform:uppercase" placeholder="Ville" required>

        </div>

        <div class="form-group">

            <label for="active">Actif</label>

            <select class="form-control" name="active" id="active">
                <option value="1" selected>Oui</option>
                <option value="0" >Non</option>
            </select>

        </div>

        <button type="submit" class="btn btn-primary">Valider</button>

    </form>

@endsection

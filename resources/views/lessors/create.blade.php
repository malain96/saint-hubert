@extends('layouts.layout')

@section('pageTitle', 'Ajouter un Bailleur')

@section('content')

    @include('layouts.messages')
    @include('layouts.errors')

    <form method="post" action="{{ route('storeLessor') }}">

        {{ csrf_field() }}

        <div class="from-group">

            <label for="title">Titre</label>

            <select class="form-control" id="title" name="title" >

                @foreach ($titles as $title)

                    <option value="{{ $title->id }}">{{ $title->label }}</option>

                @endforeach

            </select>
        </div>

        <div class="form-group">

            <label for="lastName">Nom</label>

            <input type="text" class="form-control" id="lastName" name="lastName" style="text-transform:uppercase" placeholder="Nom" required >

        </div>

        <div class="form-group">

            <label for="firstName">Prénom</label>

            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Prénom" required >

        </div>

        <div class="form-group">

            <label for="address">Adresse</label>

            <input type="text" class="form-control" id="address" name="address" placeholder="Adresse" required >

        </div>

        <div class="form-group">

            <label for="postalCode">Code Postal</label>

            <input type="text" class="form-control" id="postalCode" name="postalCode" placeholder="Code Postal" required >

        </div>

        <div class="form-group">

            <label for="city">Ville</label>

            <input type="text" class="form-control" id="city" name="city" style="text-transform:uppercase" placeholder="Ville" required >

        </div>

        <div class="form-group">

            <label for="hectares">Hectares</label>

            <input type="number" min="1" step="any" class="form-control" id="hectares" name="hectares" placeholder="Hectares" required >

        </div>

        <div class="form-group">

            <label for="price">Prix</label>

            <input type="number" min="1" step="any" class="form-control" id="price" name="price" placeholder="Prix" required >

        </div>

        <div class="form-group">

            <label for="validityDate">Validité</label>

            <input type="number" min="{{ date('Y') }}" max="2050" step="1" class="form-control" id="validityDate" name="validityDate" placeholder="Validité" required >

        </div>

        <button type="submit" class="btn btn-primary">Valider</button>

    </form>

@endsection

@extends('layouts.layout')

@section('pageTitle', 'Modifier un Bailleur')

@section('content')

    @include('layouts.messages')
    @include('layouts.errors')

    <form method="post" action="{{ route('patchLessor', ['lessor' => $lessor->id ] ) }}">

        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group">

            <label for="id">Identifiant</label>

            <input type="text" class="form-control" id="id" name="id" value="{{ $lessor->id }}" >

        </div>

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

            <input type="text" class="form-control" id="lastName" name="lastName" style="text-transform:uppercase" value="{{ $lessor->lastName }}" required >

        </div>

        <div class="form-group">

            <label for="firstName">Prénom</label>

            <input type="text" class="form-control" id="firstName" name="firstName" value="{{ $lessor->firstName }}" required >

        </div>

        <div class="form-group">

            <label for="address">Adresse</label>

            <input type="text" class="form-control" id="address" name="address" value="{{ $lessor->address->label }}" required >

        </div>

        <div class="form-group">

            <label for="postalCode">Code Postal</label>

            <input type="text" class="form-control" id="postalCode" name="postalCode" value="{{ $lessor->address->city->postalCode->label }}" required >

        </div>

        <div class="form-group">

            <label for="city">Ville</label>

            <input type="text" class="form-control" id="city" name="city" style="text-transform:uppercase" value="{{ $lessor->address->city->label }}" required >

        </div>

        <div class="form-group">

            <label for="hectares">Hectares</label>

            <input type="number" min="1" step="any" class="form-control" id="hectares" name="hectares" value="{{ $lessor->hectares + 0 }}" required >

        </div>

        <div class="form-group">

            <label for="price">Prix</label>

            <input type="number" min="1" step="any" class="form-control" id="price" name="price" value="{{ $lessor->price + 0 }}" required >

        </div>

        <div class="form-group">

            <label for="validityDate">Validité</label>

            <input type="number" min="{{ date('Y') }}" max="2050" step="1" class="form-control" id="validityDate" name="validityDate" value="{{ $lessor->validityDate }}" required >

        </div>

        <button type="submit" class="btn btn-primary">Valider</button>

    </form>

@endsection

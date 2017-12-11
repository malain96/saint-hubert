@extends('layouts.layout')

@section('pageTitle', 'Bailleur')

@section('content')

    @include('layouts.messages')
    @include('layouts.errors')

    <form method="post" action="{{ route('patchLessor', ['lessor' => $lessor->id ] ) }}">

        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group">

            <label for="id">Identifiant</label>

            <input type="text" class="form-control" id="id" name="id" value="{{ $lessor->id }}" disabled>

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

            <input type="text" class="form-control" id="lastName" name="lastName" style="text-transform:uppercase" value="{{ $lessor->lastName }}" required disabled>

        </div>

        <div class="form-group">

            <label for="firstName">Prénom</label>

            <input type="text" class="form-control" id="firstName" name="firstName" value="{{ $lessor->firstName }}" required disabled>

        </div>

        <div class="form-group">

            <label for="address">Adresse</label>

            <input type="text" class="form-control" id="address" name="address" value="{{ $lessor->address->label }}" required disabled>

        </div>

        <div class="form-group">

            <label for="postalCode">Code Postal</label>

            <input type="text" class="form-control" id="postalCode" name="postalCode" value="{{ $lessor->address->city->postalCode->label }}" required disabled>

        </div>

        <div class="form-group">

            <label for="city">Ville</label>

            <input type="text" class="form-control" id="city" name="city" style="text-transform:uppercase" value="{{ $lessor->address->city->label }}" required disabled>

        </div>

        <div class="form-group">

            <label for="hectares">Hectares</label>

            <input type="number" min="1" step="any" class="form-control" id="hectares" name="hectares" value="{{ $lessor->hectares + 0 }}" required disabled>

        </div>

        <div class="form-group">

            <label for="price">Prix</label>

            <input type="number" min="1" step="any" class="form-control" id="price" name="price" value="{{ $lessor->price + 0 }}" required disabled>

        </div>

        <div class="form-group">

            <label for="validityDate">Validité</label>

            <input type="number" min="{{ date('Y') }}" max="2050" step="1" class="form-control" id="validityDate" name="validityDate" value="{{ $lessor->validityDate }}" required disabled>

        </div>

        <button id='modify' type="button" class="btn btn-primary">Modifier</button>

        <div id='submit' style="display:none;">
            <button type="submit" class="btn btn-success">Valider</button>
            <a class="btn btn-danger" href="{{ route('lessors') }}">Annuler</a>
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
        $('#hectares').prop('disabled', false);
        $('#price').prop('disabled', false);
        $('#validityDate').prop('disabled', false);
        $('#submit').show();
        $('#modify').hide();
});
    </script>

@endsection

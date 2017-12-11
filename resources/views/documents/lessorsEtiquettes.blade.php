@extends('layouts.layout')

@section('pageTitle', 'Documents')

@section('content')

    <form method="get" action="{{ route('lessorsSelectedEtiquettes') }}" target="_blank">

        {{ csrf_field() }}

        <div class="alert alert-info" role="alert">
            <p><span class="glyphicon glyphicon-info-sign"></span> Sélectioner les étiquettes que vous voullez imprimer.</p>
        </div>

    @foreach ($lessors as $lessor)
        <div class="col-md-3">
            <input type="checkbox" id="lessor{{ $lessor->id }}" name="lessor{{ $lessor->id }}" value="{{ $lessor->id }}" />
            <label for="lessor{{ $lessor->id }}" >{{ $lessor->lastName }} {{ $lessor->firstName }}</label>
        </div>

    @endforeach
    <div class="col-md-12 text-center">
        <br>
        <input type="submit" class="btn btn-success" value="Générer"/>
    </div>
</form>

@endsection

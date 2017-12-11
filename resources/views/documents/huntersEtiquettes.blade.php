@extends('layouts.layout')

@section('pageTitle', 'Documents')

@section('content')

    <form method="get" action="{{ route('huntersSelectedEtiquettes') }}" target="_blank">

        {{ csrf_field() }}

        <div class="alert alert-info" role="alert">
            <p><span class="glyphicon glyphicon-info-sign"></span> Sélectioner les étiquettes que vous voullez imprimer.</p>
        </div>

    @foreach ($hunters as $hunter)
        <div class="col-md-3">
            <input type="checkbox" id="hunter{{ $hunter->id }}" name="hunter{{ $hunter->id }}" value="{{ $hunter->id }}" />
            <label for="hunter{{ $hunter->id }}" >{{ $hunter->lastName }} {{ $hunter->firstName }}</label>
        </div>

    @endforeach
    <div class="col-md-12 text-center">
        <br>
        <input type="submit" class="btn btn-success" value="Générer"/>
    </div>
</form>

@endsection

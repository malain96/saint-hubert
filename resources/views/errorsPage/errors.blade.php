@extends('layouts.layout')

@section('pageTitle', 'Erreur')

@section('content')


    <div class="flash-message">

        <p class="alert alert-danger">Oops! Une erreur c'est produite! Merci de contacter Mathieu Alain.</p>

    </div>

    <div class="text-center">

        <img src="{{ asset('img/otherErrors.png') }}">

    </div>





@endsection

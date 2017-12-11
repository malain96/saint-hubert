@extends('layouts.layout')

@section('pageTitle', 'Erreur 404')

@section('content')


    <div class="flash-message">

        <p class="alert alert-danger">Oops! La page que vous cherchez est introuvable!</p>

    </div>

    <div class="text-center">

        <img src="{{ asset('img/error404.png') }}">

    </div>





@endsection

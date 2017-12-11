@extends('layouts.layout')

@section('pageTitle', 'Supprimer un Sociétaire')

@section('content')

    @include('layouts.errors')

    <form method="post" action="{{ route('deleteHunter', ['hunter' =>  $hunter->id]) }}">

        {{ csrf_field() }}
        {{ method_field('DELETE') }}

        <div class="alert alert-danger" role="alert">
            <p><span class="glyphicon glyphicon-warning-sign"></span> Attention! Etes-vous sur de vouloir supprimer le sociétaire n°{{ $hunter->id }}, {{ $hunter->firstName }} {{ $hunter->lastName }}? Cette action est définitive et déconseillée!</p>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success btn-lg">Oui</button>
            <a class="btn btn-danger btn-lg" href="{{ route('hunters') }}">Non</a>
        </div>

    </form>

@endsection

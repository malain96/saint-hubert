@extends('layouts.layout')

@section('pageTitle', 'Supprimer un Bailleur')

@section('content')

    @include('layouts.errors')

    <form method="post" action="{{ route('deleteLessor', ['lessor' => $lessor->id ] ) }}">

        {{ csrf_field() }}
        {{ method_field('DELETE') }}

        <div class="alert alert-danger" role="alert">
            <p><span class="glyphicon glyphicon-warning-sign"></span> Attention! Etes-vous sur de vouloir supprimer le bailleurs n°{{ $lessor->id }}, {{ $lessor->firstName }} {{ $lessor->lastName }}? Cette action est définitive et déconseillée!</p>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success btn-lg">Oui</button>
            <a class="btn btn-danger btn-lg" href="{{ route('lessors') }}">Non</a>
        </div>

    </form>

@endsection

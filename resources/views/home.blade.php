@extends('layouts.layout')

@section('pageTitle', 'Accueil')

@section('content')

    @include('layouts.messages')
    @include('layouts.errors')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        Bienvenue {{ Auth::user()->name }}, sur l'application du Club Saint Hubert
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-danger">
        <div class="panel-heading">Bailleurs à renouveller</div>
        <div class="panel-body" >
            <p><span class="glyphicon glyphicon-warning-sign"></span> Attention! Les baux suivants arrivent à expirations:</p>
            <ul>
                @foreach ($lessors as $lessor)
                    <li>N° {{ $lessor->id }} - {{ $lessor->firstName }}  {{ $lessor->lastName }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

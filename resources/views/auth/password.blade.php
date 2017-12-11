@extends('layouts.layout')

@section('pageTitle', 'Changer de mot de passe')

@section('content')

@include('layouts.errors')
@include('layouts.messages')

<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form id="form-change-password" role="form" method="POST" action="{{ route('password') }}" class="form-horizontal">

                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <label for="current-password" class="col-md-4 control-label">Ancien mot de passe</label>
                            <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" class="form-control" id="current-password" name="current-password" placeholder="Ancen mot de passe">
                            </div>
                            </div>
                            <label for="password" class="col-md-4 control-label">Nouveau mot de passe</label>
                            <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Nouveau mot de passe">
                            </div>
                            </div>
                            <label for="password_confirmation" class="col-md-4 control-label">Confirmer mot de passe</label>
                            <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirmer mot de passe">
                            </div>
                            </div>
                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-6">
                            <button type="submit" class="btn btn-primary">Modifier</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

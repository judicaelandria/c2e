@extends('base')

@section('title')
    Mot de passe
@endsection

@section('style')
    {{ Html::style('css/form.css') }}
@endsection

@section('contenu')
    @if(session()->has('error'))
        <div class="alert alert-error">{!! session('error') !!}</div>
    @endif

    <h3>Mot de passe</h3>
    <form class="form-auth" role="form" method="POST" action="{{ url('/user/password') }}">
        {{ csrf_field() }}

        <div class="form-group {{ $errors->has('old_password') ? 'has-error' : '' }}">
            <label for="old_password" class="col-md-4 control-label">Ancien mot de passe *</label>

            <div class="col-md-6">
                <input id="old_password" type="password" class="form-control" name="old_password">
                {!! $errors->first('old_password', '<small class="help-block">:message</small>') !!}
            </div>
        </div>
        <div class=" form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
            {!! Form::label('password','Mots de passe *') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
            {!! $errors->first('password', '<small class="help-block">:message</small>') !!}
        </div>

        <div class=" form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
            {!! Form::label('password','Confirmation *') !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
        </div>

        <div class="content-btn">
            <button type="submit" class="btn btn-primary pull-right"> Sauvegarder </button>
        </div>

    </form>
@endsection
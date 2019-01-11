@extends('base')

@section('title')
    Réinitialisation
@endsection

@section('style')
    <style>
        .btn-login{
            font-size:16pt;
            color: #00acc1;
            border: 1px solid #00acc1;
            padding: 20px 30px;
        }
        .btn-content{
            margin-top: 50px;
        }
    </style>
@endsection

@section('contenu')
            <h3>Mot de passe réinitialisé</h3>
            <p>Veuiller consulter votre mail pour savoir votre mot de passe.</p>

            <div class="btn-content">
                <a href="{{ url('/login') }}" class="btn-login">Se connecter</a>
            </div>
@stop

@section('javascript')
@endsection
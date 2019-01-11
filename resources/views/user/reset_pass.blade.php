@extends('base')

@section('style')
    {{ Html::style('css/form.css')}}
@stop

@section('title')
    Modifier profil
@endsection

@section('contenu')
    <h3>Indiquer votre email</h3>
    {!! Form::open(['url' => 'reset_pass', 'method' => 'post', 'class' => 'form-horizontal panel']) !!}
    <div>
        <div class="form-group-2 {!! $errors->has('email') ? 'has-error' : '' !!}">
            {!! Form::label('email','Email *') !!}
            {!! Form::text('email', null, ['class' => 'form', 'placeholder' => '']) !!}
            {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
        </div>
    </div>
    <div class="form-group-2">
        <div class="content-btn ">
            {!! Form::submit('Réinitialiser', ['class' => 'btn btn-primary btn-fixed pull-right']) !!}
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('javascript')
    <script>
        @include('tinyMCE.config_all_of_tinyMCE')
    </script>
@endsection
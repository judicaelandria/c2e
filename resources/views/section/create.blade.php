@extends('base')

@section('title')
	Modification d'une section
@endsection

@section('style')
	{{ Html::style('css/form.css') }}
@endsection

@section('contenu')
	<h3>Ajouter une section</h3>
	{!! Form::open(['url' => 'section', 'method' => 'post', 'class' => 'form-horizontal panel']) !!}
		<div class="form-group {!! $errors->has('titre') ? 'has-error' : '' !!}">
			{!! Form::label('Titre') !!}
			{!! Form::text('titre', null, ['class' => 'form-control', 'placeholder' => 'Titre du section']) !!}
			{!! $errors->first('titre', '<small class="help-block">:message</small>') !!}
		</div>
		<div class="form-group {!! $errors->has('contenu') ? 'has-error' : '' !!}">
			<div class="content-input">
				{!! Form::label('Contenu') !!}
				{!! Form::textarea('contenu', null, ['class' => 'form-control textarea', 'placeholder' => 'Contenu du section']) !!}
				{!! $errors->first('contenu', '<small class="help-block">:message</small>') !!}
			</div>
		</div>
		<div class="content-btn">
			{!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
		</div>
	{!! Form::close() !!}
@endsection

@section('javascript')
	<script>
		@include('tinyMCE.config_all_of_tinyMCE')
	</script>
@endsection
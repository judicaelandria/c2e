@extends('base')

@section('title')
	Créer un tutoriel
@endsection

@section('style')
	{{ Html::style('css/form.css')}}
@endsection

@section('contenu')
	<h3>Création du tutoriel</h3>

	{!! Form::open(['url' => 'tutoriel', 'method' => 'post','files' => true, 'class' => 'form-horizontal panel']) !!}
		<div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
			{!! Form::label('nom','Titre') !!}
			{!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => '']) !!}
			{!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
		</div>
		<div class="form-group {!! $errors->has('Types[]') ? 'has-error' : '' !!}">
			{!! Form::label('badget_id','Badge') !!}
			{!! Form::select('badget_id', $badges,null, ['class' => 'form-control', 'placeholder' => '']) !!}
			{!! $errors->first('Types[]', '<small class="help-block">:message</small>') !!}
		</div>
		<div class="form-group {!! $errors->has('niveau_id') ? 'has-error' : '' !!}">
			{!! Form::label('niveau_id','Niveau') !!}
			{!! Form::select('niveau_id',$niveaus,null, ['class' => 'form-control']) !!}
			{!! $errors->first('niveau_id', '<small class="help-block">:message</small>') !!}
		</div>
		<div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
			{!! Form::label('description','Description') !!}
			{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
			{!! $errors->first('description', '<small class="help-block">:message</small>') !!}
		</div>
		<div class="form-group {!! $errors->has('introduction') ? 'has-error' : '' !!}">
			<div class="content-input">
				{!! Form::label('introduction','Introduction') !!}
				{!! Form::textarea('introduction', null, ['class' => 'form-control textarea']) !!}
				{!! $errors->first('introduction', '<small class="help-block">:message</small>') !!}
			</div>
		</div>
		<div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
			{!! Form::label('tags','Tags') !!}
			{!! Form::text('tags', null, ['class' => 'form-control', 'placeholder' => 'language c, linux']) !!}
			{!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
		</div>

		<div class="content-btn">
				{!! Form::submit('Envoyer', ['class' => 'btn btn-primary btn-fixed pull-right']) !!}
		</div>
	{!! Form::close() !!}

	@section('javascript')
	<script>
		@include('tinyMCE.config_all_of_tinyMCE')
	</script>
	@endsection
@stop

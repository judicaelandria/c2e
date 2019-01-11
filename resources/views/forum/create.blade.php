@extends('base')

@section('contenu')
	<h3>Nouveau discussion</h3>
	{!! Form::open(['route' => 'forum.store', 'method' => 'post', 'class' => 'form-horizontal panel']) !!}
		<div class="form-group {!! $errors->has('sujet') ? 'has-error' : '' !!}">
			{!! Form::label('sujet','Sujet') !!}
			{!! Form::text('sujet', null, ['class' => 'form-control']) !!}
			{!! $errors->first('sujet', '<small class="help-block">:message</small>') !!}
		</div>
		{{--<div class="form-group {!! $errors->has('Type[]') ? 'has-error' : '' !!}">
			<div class="content-input">
				{!! Form::label('Types[]','Catégorie') !!}
				{!! Form::select('Types[]',App\Type::lists('nom','id'),null, ['style'=>'width: 100%;','class' => 'form-control', 'placeholder' => 'Déscription du Forum','multiple'=>true]) !!}
				{!! $errors->first('Types[]', '<small class="help-block">:message</small>') !!}
			</div>
		</div>--}}
		<div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
			<div class="content-input">
				{!! Form::label('description','Contenu') !!}
				{!! Form::textarea('description', null, ['style'=>'width: 100%;','class' => 'form-control textarea']) !!}
				{!! $errors->first('description', '<small class="help-block">:message</small>') !!}
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
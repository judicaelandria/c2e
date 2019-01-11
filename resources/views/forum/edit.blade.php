@extends('base')

@section('contenu')
	<h3>Editer la discussion</h3>
	{!! Form::Model($forum,['route' => ['forum.update',$forum->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
	<div class="form-group {!! $errors->has('sujet') ? 'has-error' : '' !!}">
		{!! Form::label('sujet','Sujet') !!}
		{!! Form::text('sujet', null, ['class' => 'form-control']) !!}
		{!! $errors->first('sujet', '<small class="help-block">:message</small>') !!}
	</div>
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
	@section('javascript')
		<script>
			@include('tinyMCE.config_all_of_tinyMCE')
		</script>
	@endsection

@stop
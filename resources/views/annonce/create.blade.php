@extends('base')

@section('contenu')
	<h3>Mettre une annonce</h3>
	<div class="panel-body">
		<div class="col-sm-12">
			{!! Form::open(['url' => 'annonce', 'method' => 'post', 'class' => 'form-horizontal panel']) !!}
			<div class="form-group {!! $errors->has('titre') ? 'has-error' : '' !!}">
				{!! Form::label('titre','Titre') !!}
				{!! Form::text('titre', null, ['class' => 'form-control']) !!}
				{!! $errors->first('titre', '<small class="help-block">:message</small>') !!}
			</div>
			<div class="form-group {!! $errors->has('text') ? 'has-error' : '' !!}">
				<div class="content-input">
				{!! Form::label('text',"Contenu") !!}
				{!! Form::textarea('text', null, ['style'=>'width: 100%;','class' => 'form-control textarea', 'placeholder' => '...........']) !!}
				{!! $errors->first('text', '<small class="help-block">:message</small>') !!}
				</div>
			</div>
			<div class="content-btn">
				{!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
	@section('javascript')
	<script>
		@include('tinyMCE.config_all_of_tinyMCE')
	</script>
	@endsection
@stop
@extends('base')

@section('title')
	Inscription
@endsection

@section('contenu')
	<h3>Inscription</h3>

	{!! Form::open(['url' => 'user', 'method' => 'post','files'=>true, 'class' => 'form-horizontal panel']) !!}
		<div class="{!! $errors->has('name') ? 'has-error' : '' !!}">
			<div class="form-group-2">
				{!! Form::label('name','Nom *') !!}
				{!! Form::text('name', null, ['class' => 'form', 'placeholder' => '']) !!}
			</div>
			<div class="form-group-2 {!! $errors->has('prenom') ? 'has-error' : '' !!}">
				{!! Form::label('prenom','Prénom(s) ') !!}
				{!! Form::text('prenom', null, ['class' => 'form', 'placeholder' => '']) !!}
			</div>
			{!! $errors->first('name', '<small class="help-block">:message</small>') !!}
		</div>
		<div class="form-group {!! $errors->has('login') ? 'has-error' : '' !!}">
			{!! Form::label('login','Pseudo *') !!}
			{!! Form::text('login', null, ['class' => 'form-control', 'placeholder' => '']) !!}
			{!! $errors->first('login', '<small class="help-block">:message</small>') !!}
		</div>
		<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
			{!! Form::label('email','Email *') !!}
			{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => '']) !!}
			{!! $errors->first('email', '<small class="help-block">:message</small>') !!}
		</div>
		<div class="form-group {!! $errors->has('age') ? 'has-error' : '' !!}">
			{!! Form::label('annee_nais','Année de naissance') !!}
			{!! Form::number('annee_nais', 1995, ['class' => 'form-control', 'placeholder' => '']) !!}
			{!! $errors->first('annee_nais', '<small class="help-block">:message</small>') !!}
		</div>
		<div class="form-group {!! $errors->has('telephone') ? 'has-error' : '' !!}">
			{!! Form::label('telephone','Numéro de téléphone') !!}
			{!! Form::text('telephone', null, ['class' => 'form-control', 'placeholder' => '+261']) !!}
			{!! $errors->first('telephone', '<small class="help-block">:message</small>') !!}
		</div>
		<div class="form-group {!! $errors->has('adresse') ? 'has-error' : '' !!}">
			{!! Form::label('adresse','Adresse') !!}
			{!! Form::text('adresse', null, ['class' => 'form-control']) !!}
			{!! $errors->first('adresse', '<small class="help-block">:message</small>') !!}
		</div>
		<hr/>

		<label>Fonction</label>
		<div class="form-group-checkbox">
			<div class="form-group-inline {!! $errors->has('domaine') ? 'has-error' : '' !!}">
				{!! Form::radio('etudiant', true, ['class' => 'form-control-inline']) !!}
				{!! Form::label('etudiant','Etudiant', ['class' => 'form-control-inline']) !!}
				{!! $errors->first('adresse', '<small class="help-block">:message</small>') !!}
			</div>
			<div class="form-group-inline {!! $errors->has('domaine') ? 'has-error' : '' !!}">
				{!! Form::radio('etudiant', false, false, ['class' => 'form-control']) !!}
				{!! Form::label('etudiant','Employé', ['class' => 'form-control-inline']) !!}
			</div>
		</div>
		<div class="form-group {!! $errors->has('domaine') ? 'has-error' : '' !!}">
			{!! Form::label('domaine','Domaine *') !!}
			{!! Form::text('domaine', null, ['class' => 'form-control', 'placeholder' => 'Génie logiciel et Base de donnée']) !!}
			{!! $errors->first('domaine', '<small class="help-block">:message</small>') !!}
		</div>
		<div class="form-group {!! $errors->has('lieu') ? 'has-error' : '' !!}">
			{!! Form::label('lieu','Lieu') !!}
			{!! Form::text('lieu', null, ['class' => 'form-control', 'placeholder' => 'Ecole Nationale d\'informatique']) !!}
			{!! $errors->first('lieu', '<small class="help-block">:message</small>') !!}
		</div>
		{{--<hr/>
		<div class=" form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
			<div class="form-group-2">
				{!! Form::label('password','Mots de passe *') !!}
				{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'mdp1234']) !!}
			</div>
			<div class="form-group-2">
				{!! Form::label('password','Confirmation *') !!}
				{!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'mdp1234']) !!}
			</div>
			{!! $errors->first('password', '<small class="help-block">:message</small>') !!}
		</div>--}}
		<div class="content-btn ">
			{!! Form::submit('Envoyer', ['class' => 'btn btn-primary btn-fixed pull-right']) !!}
		</div>
	{!! Form::close() !!}

@stop

@section('javascript')
	<script>
		@include('tinyMCE.config_all_of_tinyMCE')
	</script>
@endsection
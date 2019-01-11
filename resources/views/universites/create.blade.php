@extends('base')

@section('contenu')
<div class="row justify-content-md-center">
		    <div class="col-sm-4">
		    	<br>
				<div class="panel panel-primary">	
					<div class="panel-heading" style="text-align: center;border-bottom:1px solid #aaa;">Création d'un utilisateur</div>
					<div class="panel-body"> 
						<div class="col-sm-12">
							{!! Form::open(['url' => 'user', 'method' => 'post', 'class' => 'form-horizontal panel']) !!}	
							<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
								{!! Form::label('name','Nom et Prénom') !!}
							  	{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
							  	{!! $errors->first('name', '<small class="help-block">:message</small>') !!}
							</div>
							<div class="form-group {!! $errors->has('login') ? 'has-error' : '' !!}">
								{!! Form::label('login','Login') !!}
							  	{!! Form::text('login', null, ['class' => 'form-control', 'placeholder' => 'login']) !!}
							  	{!! $errors->first('login', '<small class="help-block">:message</small>') !!}
							</div>
							<div class="form-group {!! $errors->has('telephone') ? 'has-error' : '' !!}">
								{!! Form::label('telephone','Numéro de téléphone') !!}
							  	{!! Form::text('telephone', null, ['class' => 'form-control', 'placeholder' => '+261']) !!}
							  	{!! $errors->first('telephone', '<small class="help-block">:message</small>') !!}
							</div>
							<div class="form-group {!! $errors->has('adresse') ? 'has-error' : '' !!}">
								{!! Form::label('adresse','Adresse postale') !!}
							  	{!! Form::text('adresse', null, ['class' => 'form-control', 'placeholder' => 'Antananarivo 67ha Lot ....']) !!}
							  	{!! $errors->first('adresse', '<small class="help-block">:message</small>') !!}
							</div>
							<div class="form-group {!! $errors->has('Motif_insrciption') ? 'has-error' : '' !!}">
								{!! Form::label('Motif_insrciption','Quelle est votre motif d\'inscription ?') !!}
							  	{!! Form::textarea('Motif_insrciption', null, ['class' => 'form-control', 'placeholder' => 'Mon motif d\'inscription .......']) !!}
							  	{!! $errors->first('Motif_insrciption', '<small class="help-block">:message</small>') !!}
							</div>
							
							<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
								{!! Form::label('email','Adresse E-Mail') !!}
							  	{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'c2e@gmail.com']) !!}
							  	{!! $errors->first('name', '<small class="help-block">:message</small>') !!}
							</div>

							<div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
								{!! Form::label('password','Mots de passe') !!}
							  	{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Mot de passe']) !!}
							  	{!! $errors->first('password', '<small class="help-block">:message</small>') !!}
							</div>
							<div class="form-group">
							  	{!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirmation mot de passe']) !!}
							</div>
							<div class="form-group">
								<div class="checkbox">
									<label>
										{!! Form::checkbox('admin', 1, null) !!} Administrateur
									</label>
								</div>
							</div>
							{!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
							{!! Form::close() !!}
						</div>
					</div>
				</div>
				<a href="javascript:history.back()" class="btn btn-primary">
					<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
				</a>
			</div>
	</div>
@stop
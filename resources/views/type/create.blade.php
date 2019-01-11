@extends('base')

@section('contenu')
<div class="row justify-content-md-center">
		    <div class="col-sm-4">
		    	<br>
				<div class="panel panel-primary">	
					<div class="panel-heading" style="text-align: center;border-bottom:1px solid #aaa;">Création d'un Catégorie</div>
					<div class="panel-body"> 
						<div class="col-sm-12">
							{!! Form::open(['url' => 'type', 'method' => 'post', 'class' => 'form-horizontal panel']) !!}	
							<div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
								{!! Form::label('nom','Nom du catégorie') !!}
							  	{!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
							  	{!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
							</div>
							<div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
								{!! Form::label('description','Quelle est votre motif d\'inscription ?') !!}
							  	{!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Mon motif d\'inscription .......']) !!}
							  	{!! $errors->first('description', '<small class="help-block">:message</small>') !!}
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
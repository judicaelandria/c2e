@extends('base')

@section('contenu')
<div class="row">
		    <div class="col-sm-12">
		    	<br>
				<div class="panel panel-primary">	
					<div class="panel-heading" style="text-align: center;border-bottom:1px solid #aaa;">Création d'un utilisateur</div>
					<div class="panel-body"> 
						<div class="col-sm-12">
							{!! Form::Model($forum,['route' => ['forum.update',$forum->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}	

							<div class="form-group {!! $errors->has('sujet') ? 'has-error' : '' !!}">
								{!! Form::label('sujet','Sujet') !!}
							  	{!! Form::text('sujet', null, ['class' => 'form-control', 'placeholder' => 'Sujet du forum']) !!}
							  	{!! $errors->first('sujet', '<small class="help-block">:message</small>') !!}
							</div>
							<div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
								{!! Form::label('description','Déscription du forum') !!}
							  	{!! Form::textarea('description', null, ['style'=>'width: 100%;','class' => 'form-control', 'placeholder' => 'Déscription du Forum']) !!}
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
   @section('javascript')
		<script>
			@include('tinyMCE.config_all_of_tinyMCE')
		</script>
   @endsection

@stop
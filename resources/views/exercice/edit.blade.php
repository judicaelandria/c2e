@extends('base')

@section('contenu')
<div class="row justify-content-md-center">
		    <div class="col-sm-12">
		    	<br>
				<div class="panel panel-primary">	
					<div class="panel-heading" style="text-align: center;border-bottom:1px solid #aaa;">Création de l'exercice</div>
					<div class="panel-body"> 
						<div class="col-sm-12">	
							{!! Form::Model($exercice,['route' => ['exercice.update',$exercice->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
							<div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
								{!! Form::label('nom','nom') !!}
							  	{!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'nom de l\'exercice']) !!}
							  	{!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
							</div>

							<div class="form-group {!! $errors->has('type_d_exercice_id') ? 'has-error' : '' !!}">
								{!! Form::label('type_d_exercice_id','Type d\'exercice') !!}
							  	{!! Form::select('type_d_exercice_id',$Type_d_exercice,null, ['class' => 'form-control', 'placeholder' => '']) !!}
							  	{!! $errors->first('type_d_exercice_id', '<small class="help-block">:message</small>') !!}
							</div>

							<div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
								{!! Form::label('description','Déscription de l\'exercice') !!}
							  	{!! Form::textarea('description', null, ['style'=>'width: 100%;','class' => 'form-control', 'placeholder' => 'Déscription de l\'exercice']) !!}
							  	{!! $errors->first('description', '<small class="help-block">:message</small>') !!}
							</div>
							
							{!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
							{!! Form::close() !!}
						</div>
					</div>
				</div>
				<a class="row" href="javascript:history.back()" class="btn btn-primary">
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
@extends('base')

@section('contenu')
<div class="row">
		    <div class="col-sm-12">
		    	<br>
				<h3 class="panel panel-primary">
					<h3>Editer l'annonce</h3>
					<div class="panel-body"> 
						<div class="col-sm-12">
							{!! Form::Model($annonce,['route' => ['annonce.update',$annonce->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}

							<div class="form-group {!! $errors->has('sujet') ? 'has-error' : '' !!}">
								{!! Form::label('titre','Titre') !!}
							  	{!! Form::text('titre', null, ['class' => 'form-control', 'placeholder' => 'Sujet du forum']) !!}
							  	{!! $errors->first('titre', '<small class="help-block">:message</small>') !!}
							</div>
							<div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
								<div class="content-input">
									{!! Form::label('text','Contenu') !!}
									{!! Form::textarea('text', null, ['style'=>'width: 100%;','class' => 'form-control textarea', 'placeholder' => 'Déscription du Forum']) !!}
									{!! $errors->first('text', '<small class="help-block">:message</small>') !!}
								</div>
							</div>
							<div class="content-btn">
								{!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
							</div>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
	</div>
   @section('javascript')
		<script>
			@include('tinyMCE.config_all_of_tinyMCE')
		</script>
   @endsection

@stop
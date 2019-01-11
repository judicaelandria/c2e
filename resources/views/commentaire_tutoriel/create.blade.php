	{!! Form::open(['url' => 'Commentaire_tutoriel', 'method' => 'post', 'class' => 'form-horizontal panel']) !!}	
							
							<div class="form-group {!! $errors->has('phrase') ? 'has-error' : '' !!}">
							  	{!! Form::textarea('phrase', null, ['style'=>'width: 100%;','class' => 'form-control', 'placeholder' => 'Déscription du Forum']) !!}
							  	{!! $errors->first('phrase', '<small class="help-block">:message</small>') !!}
							</div>
							
							{!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
							{!! Form::close() !!}
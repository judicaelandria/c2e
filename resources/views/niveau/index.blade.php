@extends('base')
@section('title')
Niveau
@endsection
@section('contenu')
    <br>
    <div class="col-sm-offset-4 col-sm-4">
    	@if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
		@endif
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Niveau</h3>
			</div>
			
					@foreach ($niveaus as $niveau)
							
                            <div class="row">

                            	{!! $niveau->niveau !!}
                            </div>
							{!! link_to_route('niveau.show', 'Voir', [$niveau->id], ['class' => '']) !!}</td>
							{!! link_to_route('niveau.edit', 'Modifier', [$niveau->id], ['class' => '']) !!}</td>
								{!! Form::open(['method' => 'DELETE', 'route' => ['niveau.destroy', $niveau->id]]) !!}
									{!! Form::submit('Supprimer', ['class' => '', 'onclick' => 'return confirm(\'Vraiment supprimer cet utilisateur ?\')']) !!}
								{!! Form::close() !!}
					@endforeach
	  		
		</div>
		{!! link_to_route('niveau.create', 'Créer un nouveau niveau', [], ['class' => 'btn btn-info pull-right']) !!}
		{!! $links !!}
	</div>
@stop
@extends('base')
@section('title')
Exercice
@endsection
@section('contenu')
<div class="row">
    <div class="col-sm-12">
    	@if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
		@endif
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Exercice</h3>
			</div>
			
					@foreach ($exercices as $exercice)
							
                            <div class="row">

                            	{!! $exercice->sujet !!}
                            </div>
                            <div class="row">
                            	<div class="col-9">{!! $exercice->description !!}</div>
                            </div>
							{!! link_to_route('exercice.show', 'Voir', [$exercice->id], ['class' => '']) !!}</td>
							{!! link_to_route('exercice.edit', 'Modifier', [$exercice->id], ['class' => '']) !!}</td>
								{!! Form::open(['method' => 'DELETE', 'route' => ['exercice.destroy', $exercice->id]]) !!}
									{!! Form::submit('Supprimer', ['class' => '', 'onclick' => 'return confirm(\'Vraiment supprimer cet utilisateur ?\')']) !!}
								{!! Form::close() !!}
					@endforeach
	  		
		</div>
		{!! link_to_route('exercice.create', 'Créer un nouveau exercice', [], ['class' => 'btn btn-info pull-right']) !!}
		{!! $links !!}
	</div>
	</div>
@stop
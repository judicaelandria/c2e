@extends('base')
@section('title')
Forum
@endsection
@section('contenu')
<div class="row">
    <div class="col-sm-12">
    	@if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
		@endif
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Forum</h3>
			</div>
			
					@foreach ($forums as $forum)
							
                            <div class="row">

                            	{!! $forum->sujet !!}
                            </div>
                            <div class="row">
                            	<div class="col-9">{!! $forum->description !!}</div>
                            </div>
							{!! link_to_route('forum.show', 'Voir', [$forum->id], ['class' => '']) !!}</td>
							{!! link_to_route('forum.edit', 'Modifier', [$forum->id], ['class' => '']) !!}</td>
								{!! Form::open(['method' => 'DELETE', 'route' => ['forum.destroy', $forum->id]]) !!}
									{!! Form::submit('Supprimer', ['class' => '', 'onclick' => 'return confirm(\'Vraiment supprimer cet utilisateur ?\')']) !!}
								{!! Form::close() !!}
					@endforeach
	  		
		</div>
		{!! link_to_route('forum.create', 'Créer un nouveau Forum', [], ['class' => 'btn btn-info pull-right']) !!}
		{!! $links !!}
	</div>
	</div>
@stop
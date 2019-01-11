@extends('base')
@section('title')
Gestion Catégorie
@endsection
@section('contenu')
    <br>
    <div class="col-sm-offset-4 col-sm-4">
    	@if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
		@endif
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Liste des Catégories</h3>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Nom</th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($type_utilisateurs as $type_utilisateur)

						<tr>
							<td>{!! $type_utilisateur->id !!}</td>
							<td class="text-primary"><strong>{!! $type_utilisateur->terme !!}</strong></td>
							<td>{!! link_to_route('type_utilisateur.show', 'Voir', [$type_utilisateur->id], ['class' => 'btn btn-success btn-block']) !!}</td>
							<td>{!! link_to_route('type_utilisateur.edit', 'Modifier', [$type_utilisateur->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
							<td>
								{!! Form::open(['method' => 'DELETE', 'route' => ['type_utilisateur.destroy', $type_utilisateur->id]]) !!}
									{!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cet Catégorie ?\')']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
					@endforeach
	  			</tbody>
			</table>
		</div>
		{!! link_to_route('type_utilisateur.create', 'Ajouter une type d\'utilisateur', [], ['class' => 'btn btn-info pull-right']) !!}
		{!! $links !!}
	</div>
@stop
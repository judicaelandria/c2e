@extends('base')

@section('title')
	Ajouter un chapitre
@endsection

@section('style')
	{{Html::style("css/form.css")}}
@endsection

@section('contenu')
    	@if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
		@endif
		{{--<b>Nom</b>
	   <div class="row">{!! $tutoriel->nom !!}</div>
	   <b>Description</b>
	   <div class="row">{!! $tutoriel->description !!}</div>
		<b>Liste des chapitres</b>
		@php($numero_chapitre = 1)
		@foreach ($tutoriel->chapitres as $chapitre)
			<div class="row"><b>chapitre {{ $numero_chapitre }}</b> :<b>{!! $chapitre->nom!!}</b>
							{!! link_to_route('chapitre.edit_chapitre', 'Continuer l\'écriture du chapitre', [$chapitre->id], ['class' => '']) !!}
			</div>
			
			@php($numero_chapitre++) 
		@endforeach--}}
		<h3>Ajout d'un chapitre</h3>
		@include('chapitre.create')
		@section('javascript')
	<script>
		@include('tinyMCE.config_all_of_tinyMCE')
	</script>

@stop

@section('javascript')
	<script>
		@include('tinyMCE.config_all_of_tinyMCE')
	</script>
@endsection
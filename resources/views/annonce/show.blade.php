@extends('base')

@section('contenu')
    <div class="col-sm-12">
        <div class="row"><img class="img-responsive col-1 rounded-circle" src="../{!! $forum->user->image !!}" alt=""></div>
    	<div class="row">Sujet:{!! $forum->sujet !!}</div>
		<div class="row">Publier par:{!! $forum->user->name !!}</div>
		<div class="row">le {!! $forum->created_at!!}</div>
		<div class="row"><div class="col-12">{!! $forum->description !!}</div></div>		
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
	@foreach ($forum->commentaires as $commentaire)
		<div class="row">
		    <img class="col-1" src="../{{ $commentaire->user->image }}" alt="">
			{{ $commentaire->user->name }}<br/>
			{{ $commentaire->phrase }}
		</div>
	@endforeach
	@include('commentaire.create')
  @section('javascript')
	<script>
		@include('tinyMCE.config_all_of_tinyMCE')
	</script>
  @endsection

@endsection
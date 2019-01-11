@extends('base')

@section('title')
	{{$forum->sujet}}
@endsection

@section('style')
	{{Html::style('css/forum.css')}}
@endsection

@section('contenu')
	@if(session()->has('ok'))
		<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
	@endif
	<div class="disc-section bg-discussion">
		<h6>{!! link_to_route('forum.show', $forum->sujet, [$forum->id], ['class' => 'link']) !!}</h6>
		<div class="disc-auteur">
			<img class="disc-auteur-photo" src="../{!! $forum->user->image !!}" alt="">
			<span class="disc-auteur-nom">{{$forum->user->name." ".$forum->user->prenom}}, le {{ date_format($forum->created_at, 'd/m/y')}}</span>
		</div>
		<div class="disc-description">{!! $forum->description !!}</div>
		<div>
			@if(!Auth::guest() && (Auth::user()->id == $forum->user->id || Auth::user()->type_utilisateur->terme == "admin"))
				<a href="{{route('forum.edit', [$forum->id])}}"><img src="{{asset('icon/edit.svg')}}" class="btn-crud"/></a>
				{!! Form::open(['method' => 'DELETE', 'class'=>'form-inline', 'route' => ['forum.destroy', $forum->id]]) !!}
				<img src="{{asset('icon/del.svg')}}"
					 class="btn-crud"
					 onclick="if(confirm('Voulez-vous vraiment supprimé cette discussion?')) submit()"/>
				{!! Form::close() !!}
			@endif
		</div>
	</div>
	@foreach ($forum->commentaires as $commentaire)
			<div class="disc-section margin-comment">
				<div class="disc-auteur">
					<img class="disc-auteur-photo" src="../{!! $commentaire->user->image !!}" alt="">
					<span class="disc-auteur-nom">{!! $commentaire->user->name." ".$commentaire->user->prenom !!}, le {{ date_format($forum->created_at, 'd/m/y')}}</span>
				</div>
				<div  class="disc-description">
					{!! $commentaire->phrase !!}
				</div>
				@if(!Auth::guest() && (Auth::user()->id == $forum->user->id || Auth::user()->type_utilisateur->terme == "admin"))
					{!! Form::open(['method' => 'DELETE', 'route' => ['commentaire.destroy', $commentaire->id]]) !!}
					<img src="{{asset('icon/del.svg')}}"
						 class="btn-crud-sm"
						 onclick="if(confirm('Voulez-vous vraiment supprimé ce commentaire?')) submit()"/>
					{!! Form::close() !!}
				@endif
			</div>
	@endforeach

	<div class="disc-create-commentaire">
		@include('commentaire.create')
	</div>
@endsection

@section('javascript')
	<script>
		@include('tinyMCE.config_all_of_tinyMCE')
	</script>
@endsection
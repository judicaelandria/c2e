@extends('base')
@section('title')
Discussion
@endsection

@section('style')
	{{Html::style('css/forum.css')}}
@endsection

@section('banniere')
	<div class="container">
		<div class="tuto-banniere">
			<center>
				{!! link_to_route('forum.create', 'Lancer une discussion', [], ['class' => 'tuto-btn']) !!}
			</center>
		</div>
	</div>
@endsection

@section('contenu')
	@if(session()->has('ok'))
		<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
	@endif

	<h3 class="panel-title">Discussions</h3>

	@foreach ($forums as $forum)
		<div class="disc-section">
			<h6>{!! link_to_route('forum.show', $forum->sujet, [$forum->id], ['class' => 'link']) !!}</h6>
			<div class="disc-auteur">
				<img class="disc-auteur-photo" src="../{!! $forum->user->image !!}" alt="">
				<span class="disc-auteur-nom">{{$forum->user->name." ".$forum->user->prenom}}, le {{ date_format($forum->created_at, 'd/m/y')}}</span>
			</div>
			<div class="disc-description">{!! $forum->description !!}</div>
		</div>
	@endforeach

	{!! $forums->links() !!}
	@section('javascript')
		<script>
			@include('tinyMCE.config_all_of_tinyMCE')
		</script>
	@endsection
@stop

@section('navigation')
	<ul>
		<li>
			<a href="#aprecies">DISCUSSIONS</a>
			<ul>
				@foreach($forums as $forum)
					<li>{!! link_to_route('forum.show', $forum->sujet, [$forum->id]) !!}</li>
				@endforeach
			</ul>
		</li>
	</ul>
@endsection
@extends('base')
@section('title')
	Annonce
@endsection

@section('style')
	{{Html::style('css/annonce.css')}}
@endsection

@section('banniere')
	<div class="container annonce-banniere">
		<div class="tuto-banniere">
			<div class="">
				{!! link_to_route('annonce.create', 'Mettre une annonce', [], ['class' => 'tuto-btn']) !!}
			</div>
		</div>
	</div>
@endsection

@section('contenu')
	@if(session()->has('ok'))
		<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
	@endif

	<h3 class="panel-title">Annonces</h3>

	@foreach ($annonces as $annonce)
		<div class="annonce-section">
			<div class="annonce-auteur">
				<img id="<?= $annonce->id.'_'.str_replace(' ', '_', $annonce->titre)?>" class="annonce-auteur-photo" src="{!! asset($annonce->user->image) !!}" alt="">
				<span class="disc-auteur-nom">{{$annonce->user->name." ".$annonce->user->prenom}}, le {{ date_format($annonce->created_at, 'd/m/y')}}</span>
			</div>
			@if (!Auth::guest() && (Auth::user()->id == $annonce->user->id || Auth::user()->type_utilisateur->terme == "admin"))
				<div class="btn-group">
					<a href="{{route('annonce.edit', [$annonce->id])}}"><img src="{{asset('icon/edit.svg')}}" class="btn-crud"></a>
					{!! Form::open(['name'=>'formAnnonceDelete', 'method' => 'DELETE', 'class'=>'form-inline', 'route' => ['annonce.destroy', $annonce->id]]) !!}
						<img src="{{asset('icon/del.svg')}}"
							 class="btn-crud"
							 onclick="if(confirm('Voulez-vous vraiment supprimé cette annonce ?')) formAnnonceDelete.submit()"/>
					{!! Form::close() !!}
				</div>
			@endif
			<h6 class="annonce-titre"><?= strtoupper($annonce->titre)?></h6>
			<div class="disc-description">{!! $annonce->text !!}</div>
		</div>
	@endforeach

	{!! $annonces->links() !!}
@endsection

@section('navigation')
	<ul>
		<li>
			<a href="#aprecies">ANNONCES</a>
			<ul>
				@foreach($annonces as $annonce)
					<li><a href="#<?= $annonce->id.'_'.str_replace(' ', '_', $annonce->titre)?>">{{$annonce->titre}}</a></li>
				@endforeach
			</ul>
		</li>
	</ul>
@endsection

@section('javascript')
	<script>
		@include('tinyMCE.config_all_of_tinyMCE')
	</script>
@endsection
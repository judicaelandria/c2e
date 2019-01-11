@extends('base')

@section('title')
	{!! $tutoriel->nom !!}
@endsection

@section('style')
	{{ Html::style('css/modal.css') }}
	{{ Html::style('css/form.css') }}
	{{ Html::style('css/navigation.css') }}
	{{ Html::style('css/show_tutoriel.css') }}
@endsection

@section('contenu')
	@if(session()->has('ok'))
		<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
	@endif
	<h3> {!! $tutoriel->nom !!}
		@if (!Auth::guest() && ($tutoriel->validation == null) && (Auth::user()->id == $tutoriel->user->id || Auth::user()->type_utilisateur->terme == "admin"))
			<a href="{{route('chapitre.create', [$tutoriel->id])}}"><img src="{{asset('icon/add.svg')}}" class="btn-crud"/></a>
			<a href="{{route('tutoriel.edit', [$tutoriel->id])}}"><img src="{{asset('icon/edit.svg')}}" class="btn-crud"/></a>
			<img id="btn-del-tuto" src="{{asset('icon/del.svg')}}" class="btn-crud"/>
		@endif
	</h3>
	<div>
		@if (!Auth::guest() && Auth::user()->id != $tutoriel->user->id &&
         ($tutoriel->validation == null) && (Auth::user()->type_utilisateur->terme == "validateur" || Auth::user()->type_utilisateur->terme == "admin"))
			{!! Form::open(['method' => 'POST', 'style'=>'display:inline-block', 'route' => ['tutoriel.validation', $tutoriel->id]]) !!}
			{!! Form::submit('Valider', ['class' => 'btn btn-primary '])!!}
			{!! Form::close() !!}
		@endif
		@if(!Auth::guest() && (($tutoriel->validation !=null && Auth::user()->id == $tutoriel->validation->id) || Auth::user()->type_utilisateur == 'admin'))
			{!! Form::open(['method' => 'POST', 'style'=>'display:inline-block', 'route' => ['tutoriel.annulerValidation', $tutoriel->id]]) !!}
			{!! Form::submit('Annuler la validation', ['class' => 'btn btn-primary'])!!}
			{!! Form::close() !!}
		@endif
	</div>
	<div class="alert-default">
		<img class="img-auteur"  src="{!! asset($tutoriel->user->image) !!}" alt="">
		<span class="nom-auteur">
			Rédigé par
			{!! link_to_route('user.show', $tutoriel->user->name. ' ' .$tutoriel->user->prenom, ['id' => $tutoriel->user->id], ['style' => 'text-decoration: underline']) !!}
			, le {{ date_format($tutoriel->created_at, 'd M y') }}
		</span>
		<p class="tuto-desc">
			{{ $tutoriel->description }}<br/><br/>
			@if($tutoriel->validation != null)
				Validé par <code>{{ $tutoriel->validation->name }} {{$tutoriel->validation->prenom}}</code>
			@endif
		</p>
	</div>

	<h4><a id="intro" class="ancre">#</a> INTRODUCTION</h4>
	<div class="contenu">{!! $tutoriel->introduction !!}</div>

	<div class="content-tuto">
		@php($numero_section = 1)
		@php($numero_chapitre = 1)
		@foreach ($tutoriel->chapitres as $chapitre)
			<h4>
				<a id="<?= str_replace(' ', "_",$chapitre->nom)?>" class="ancre">#</a>
				{{ $chapitre->nom }}

				@if (!Auth::guest() && ($tutoriel->validation == null) && (Auth::user()->id == $tutoriel->user->id || Auth::user()->type_utilisateur->terme == "admin"))
					<a href="{{route('section.create', [$chapitre->id])}}"><img src="{{asset('icon/add.svg')}}" class="btn-crud-sm"/></a>
					<a href="{{route('chapitre.edit', [$chapitre->id])}}"><img src="{{asset('icon/edit.svg')}}" class="btn-crud-sm"/></a>
					{!! Form::open(['method' => 'DELETE', 'route' => ['chapitre.destroy', $chapitre->id], 'style'=> 'display: inline-block']) !!}
						<img id="btn-del-chap"
							 src="{{asset('icon/del.svg')}}"
							 class="btn-crud-sm"
							 onclick="if(confirm('Voulez-vous vraiment supprimé cette chapitre?')) submit()"/>
					{!! Form::close() !!}
				@endif
			</h4>
			<div class="contenu">
				{!!  $chapitre->description !!}
				@foreach ($chapitre->sections as $section)
					<br/>
					<h6>
						<a id="<?= str_replace(' ', "_",$section->titre)?>" class="ancre"></a>{{ $section->titre }}
						@if (!Auth::guest() && ($tutoriel->validation == null) && (Auth::user()->id == $tutoriel->user->id || Auth::user()->type_utilisateur->terme == "admin"))
							<a href="{{route('section.edit', [$section->id])}}"><img src="{{asset('icon/edit.svg')}}" class="btn-crud-sm"/></a>
							{!! Form::open(['method' => 'DELETE', 'style'=>'display:inline-block', 'route' => ['section.destroy', $section->id]]) !!}
								<img id="btn-del-chap"
									 src="{{asset('icon/del.svg')}}"
									 class="btn-crud-sm"
									 onclick="if(confirm('Voulez-vous vraiment supprimé cette section?')) submit()"/>
							{!! Form::close() !!}
						@endif
					</h6>
					{!! $section->contenu !!}
				@endforeach
			</div>

			@php($numero_chapitre++)
		@endforeach
	</div>

@endsection

@section('navigation')
	<ul>
		<li>
			<a href="#intro">INTRODUCTION</a>
		</li>
		@foreach($tutoriel->chapitres as $chapitre)
			<li>
				<a href="#<?= str_replace(' ', "_",$chapitre->nom)?>">{{ $chapitre->nom }}</a>
				<ul>
					@foreach($chapitre->sections as $section)
						<li><a href="#<?= str_replace(' ', "_",$section->titre)?>">{{ $section->titre }}</a> </li>
					@endforeach
				</ul>
			</li>
		@endforeach
	</ul>
@endsection

@section('modal')
	<div class="modal" id="modal-del-tuto">
		<div class="modal-panel">
			<div class="modal-header">Comfirmation</div>
			<div class="modal-content">Voulez-vous vraiment supprimés ce tutoriel?</div>
			<div class="modal-footer">
				{!! Form::open(['method' => 'DELETE', 'style'=>'display:inline-block', 'route' => ['tutoriel.destroy', $tutoriel->id]]) !!}
				<input class="modal-btn-primary" type="submit" value="Oui">
				<input class="modal-btn modal-close" type="button" value="Non"/>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection

@section('javascript')
	{{Html::script('js/modal.js')}}
	<script>
        $(function () {
            $('#btn-del-tuto').click(function () {
                $('#modal-del-tuto').toggle()
            });
            $('.modal-close').click(function () {
                $('#modal-del-tuto').hide()
            })
        })
	</script>
@endsection

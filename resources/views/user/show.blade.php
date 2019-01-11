@extends('base')

@section('style')
	{{ Html::style('css/modal.css') }}
	{{ Html::style('css/profil.css') }}
	@endsection

@section('title')
	Profil
@endsection

@section('contenu')
	@if(session()->has('ok'))
		<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
	@endif
	<h3>
		<a class="ancre" id="profil">#</a> Profil
		@if (!Auth::guest() && (Auth::user()->id == $user->id || Auth::user()->type_utilisateur->terme == "admin"))
			<img src="{{asset('icon/photo.svg')}}" id="btn-photo" class="btn-crud"/>
			<a href="{{route('user.password')}}"><img src="{{asset('icon/pwd.svg')}}" class="btn-crud"/></a>
			<a href="{{route('user.edit', [$user->id])}}"><img src="{{asset('icon/edit.svg')}}" class="btn-crud"/></a>
		@endif
		@if (!Auth::guest() && Auth::user()->type_utilisateur->terme == "admin")
			{!! Form::open(['name'=>'formDeleteUser', 'method' => 'DELETE', 'style'=>'display:inline-block', 'route' => ['user.destroy', $user->id]]) !!}
				<img src="{{asset('icon/del.svg')}}"
					 class="btn-crud"
					 onclick="if(confirm('Voulez-vous vraiment supprimé cet utilisateur?')) formDeleteUser.submit()"/>
			{!! Form::close() !!}
			<img src="{{asset('icon/role.svg')}}" class="btn-crud" id="btn-role"/>
		@endif
	</h3>
	<div class="user-form-role">
		{!! Form::Model($user,['route' => ['user.updateRole',$user->id], 'method' => 'put', 'files'=>true, 'class' => 'form-horizontal panel']) !!}
		<div class="form-group-checkbox">
			<br/>
			@foreach($roles as $role)
			<div class="form-group-inline {!! $errors->has('etudiant') ? 'has-error' : '' !!}">
				{!! Form::radio('type_utilisateur_id', $role->id, ['class' => 'form-control-inline']) !!}
				{!! Form::label('type_utilisateur_id', $role->terme, ['class' => 'form-control-inline']) !!}
				{!! $errors->first('adresse', '<small class="help-block">:message</small>') !!}
			</div><br/>
			@endforeach
			<div class="content-btn">
				<div class="pull-right">
					<input type="submit" value="Enroler" class="btn btn-primary">
					<input type="button" value="Annuler" id="btn-close-role" class="btn btn-default">
				</div>
			</div><br/>
		</div>
		{!! Form::close() !!}
	</div>

	<div class="profil-content">
		<img class="profil-photo" src=<?php 
                if(file_exists($user->image))
                echo asset($user->image);
                else echo asset('images_users/default.svg'); 
                ?> alt="" >
		@if($user->name != null || $user->prenom != null)
			<span class="profil-label">Nom :</span> {{ $user->name." ".$user->prenom }} <br/>
		@endif

		@if($user->annee_nais != null)
			<span class="profil-label">Age :</span> {!! 2017 - $user->annee_nais !!} ans <br/>
		@endif
		@if($user->email != null)
			<span class="profil-label">Email :</span> {{ $user->email }} <br/>
		@endif
		@if($user->adresse != null)
			<span class="profil-label">Domicile :</span> {{ $user->adresse }} <br/>
		@endif
		@if($user->domaine != null)
			@if($user->etudiant)
				<span class="profil-label">Etudiant à :</span>{{ $user->lieu }}<br/>
			@else
				<span class="profil-label">Travail à :</span>{{ $user->lieu }}<br/>
			@endif
			<span class="profil-label">Domaine  :</span>{{ $user->domaine }}
		@endif
		@if($user->type_utilisateur->terme != 'simple')
			<br/><span class="profil-label">Role :</span> <code>{{ $user->type_utilisateur->terme }}</code><br/>
		@endif
	</div>

	@if(!empty($tuto_valides))
		<h3><a class="ancre" id="tuto">#</a> Tutoriels rédigés</h3>
		@foreach ($tuto_valides as $tutoriel)
			<div class="panel-tuto">
				<img class="img-tuto" src='{!! asset($tutoriel->badget->image) !!}'/>
				<div class="container-tuto-info">
					<div class="tuto-description">
						<a href="{{ route('tutoriel.show', [$tutoriel->id])}}">
							<p  class="paragraphe"> {{$tutoriel->description}} </p>
						</a>
						{{-- {{ link_to_route('tutoriel.show', $tutoriel->description, [$tutoriel->id]) }} --}}
					</div>
					<div class="tuto-titre">
						{{ link_to_route('tutoriel.show', $tutoriel->nom, [$tutoriel->id], ['class' => 'link-voir-tuto']) }}<br/>
						<span class="nom-auteur"> Par {{ $tutoriel->user->name. ' ' .$tutoriel->user->prenom }},</span>
					</div>
				</div>
			</div>
		@endforeach
	@endif

	@if(!Auth::guest() && (Auth::user()->id == $user->id || Auth::user()->type_utilisateur->terme == "validteur" || Auth::user()->type_utilisateur->terme == "admin"))
		@if(!empty($tuto_nonValides))
			<h3><a class="ancre" id="tuto">#</a> Requêtes de validations</h3>
			@foreach ($tuto_nonValides as $tutoriel)
				<div class="panel-tuto">
					<img class="img-tuto" src='{!! asset($tutoriel->badget->image) !!}'/>
					<div class="container-tuto-info">
						<div class="tuto-description">
							<a href="{{ route('tutoriel.show', [$tutoriel->id])}}">
								<p  class="paragraphe"> {{$tutoriel->description}} </p>
							</a>
						</div>
						<div class="tuto-titre">
							{{ link_to_route('tutoriel.show', $tutoriel->nom, [$tutoriel->id], ['class' => 'link-voir-tuto']) }}<br/>
							<span class="nom-auteur"> Par {{ $tutoriel->user->name. ' ' .$tutoriel->user->prenom }},</span>
						</div>
					</div>
				</div>
			@endforeach
		@endif
	@endif
@stop

@section("navigation")
	<ul>
		<li>
			<a href="#profil">PROFIL</a>
		</li>
		@if(!empty($tuto_valides))
		<li>
			<a href="#tuto">TUTORIELS REDIGES</a>
			<ul>
				@foreach($tuto_valides as $tutoriel)
					<li>{{ link_to_route('tutoriel.show', $tutoriel->nom, [$tutoriel->id], ['class' => '']) }}</li>
				@endforeach
			</ul>
		</li>
		@endif
		@if(!Auth::guest() && (Auth::user()->id == $user->id || Auth::user()->type_utilisateur->terme == "validteur" || Auth::user()->type_utilisateur->terme == "admin"))
			@if(!empty($tuto_nonValides))
				<li>
					<a href="#tuto">REQUETES DE VALIDATIONS</a>
					<ul>
						@foreach($tuto_nonValides as $tutoriel)
							<li>{{ link_to_route('tutoriel.show', $tutoriel->nom, [$tutoriel->id], ['class' => '']) }}</li>
						@endforeach
					</ul>
				</li>
			@endif
		@endif
	</ul>
@endsection

@section('modal')
	<div class="modal" id="modal-photo">
		<div class="modal-panel">
			<div class="modal-header">Photo</div>
			{!! Form::Model($user,['route' => ['user.updatePhoto',$user->id], 'method' => 'put', 'files'=>true, 'class' => 'form-horizontal panel']) !!}
			<div class="form-group {!! $errors->has('image_fichier') ? 'has-error' : '' !!}">
				{!! Form::file('image_fichier', null, ['class' => 'form-control', 'placeholder' => 'image_fichier']) !!}
				{!! $errors->first('image_fichier', '<small class="help-block">:message</small>') !!}
			</div>
			<div class="modal-footer">
				{!! Form::submit('Enregistrer', ['class' => 'modal-btn-primary']) !!}
				<input class="modal-btn modal-close" type="button" value="Annuler"/>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection

@section('javascript')
	<script>
		$(function () {
			$('#btn-role').click(function () {
				$('.user-form-role').slideToggle(200);
            })
            $('#btn-close-role').click(function () {
                $('.user-form-role').slideUp(200);
            })

			$('#btn-photo').click(function () {
				$('#modal-photo').toggle()
            })

            $('.modal-close').click(function () {
                $('#modal-photo').toggle()
            })
        })
	</script>
@endsection
@extends('base')

@section('title')
    Accueil
@endsection

@section('style')
    {{ Html::style('css/banniere.css') }}
    {{ Html::style('css/annonce.css') }}
    {{ Html::style('css/membre.css') }}
    {{ Html::style('css/tutoriel.css') }}
    {{ Html::style('css/accueil.css') }}
    {{ Html::style('css/footer.css') }}
@endsection

@section('banniere')
    @include('accueil.banniere')
@endsection

@section('contenu')
    @if(!$annonces->isEmpty())
    <div class="section">
        <h3><a href="#annonce" class="ancre" id="annonce">#</a> Annonces récentes</h3>

        @foreach ($annonces as $annonce)
            <div class="annonce-section">
                <div class="annonce-auteur">
                    <img id="<?= $annonce->id.'_'.str_replace(' ', '_', $annonce->titre)?>" class="annonce-auteur-photo"  src="{!! asset($annonce->user->image) !!}" alt="">
                    <span class="disc-auteur-nom">{{$annonce->user->name." ".$annonce->user->prenom}}, le {{ date_format($annonce->created_at, 'd/m/y')}}</span>
                </div>
                <h6 class="annonce-titre"><?= strtoupper($annonce->titre)?></h6>
                <div class="disc-description">{!! $annonce->text !!}</div>
            </div>
        @endforeach

        <a href="{{ route('annonce.index') }}" class="link-tous">Tous les annonces</a>
    </div>
    @endif

    @if(!$tutoriels->isEmpty())
    <div class="section">

        <h3><a href="#tuto" class="ancre" id="tuto">#</a> Tutoriels récents</h3>
        @foreach ($tutoriels as $tutoriel)
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
        <a href="{{ route('tutoriel.index') }}" class="link-tous">Tous les tutoriels</a>
    </div>
    @endif

    @if(!$users->isEmpty())
    <div class="section">
        <h3><a href="#membre" class="ancre" id="membre">#</a> Membres actifs</h3>
        @foreach ($users as $user)
            <div class="panel-membre">
                <img class="img-membre" src=<?php 
                if(file_exists($user->image))
                echo asset( $user->image);
                else echo asset('images_users/default.svg'); 
                ?> alt="" >
                <div class="info-membre">
                    <div class="info">
                        {!! link_to_route('user.show',
                            (strlen($user->name." ". $user->prenom) > 33)
                                ?substr($user->name." ". $user->prenom, 0, 30). "..."
                                :$user->name." ". $user->prenom ,
                            [$user->id], ['class' => 'link'])
                        !!}<br/>
                        <span class="label-domaine">{{ $user->domaine }}</span><br/>
                        @foreach($user->tutoriels as $tutoriel)
                            @if($tutoriel->validation != null)
                                <img class="img-badge" src="{{asset( $tutoriel->badget->image) }}">
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
        <a href="{{ route('user.index') }}" class="link-tous">Tous les membres</a>
    </div>
    @endif

    <script>
        $(function () {
            var offsetPixels = 425;
            $(window).scroll(function () {
                if($(window).scrollTop() > offsetPixels){
                    $('.navigation').css({
                            'position': 'fixed',
                            'top': '45px',
                            'width': '18%'
                        }
                    )
                }else {
                    $('.navigation').css({
                        'position':'static',
                        'width':'24%'});
                }
            });
        })
    </script>
@endsection

@section("navigation")
    @include('accueil.navigation')
@endsection

{{--
@section('footer')
    @include('accueil.footer')
@endsection
--}}

{{-- extends('layouts.app')  --}}
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

@section('contenu')
    @if($annonces->isEmpty() && $tutoriels->isEmpty() && $users->isEmpty())
        <h3>Désolé, aucun résultat.<h3>
    @else
        <h3>Résultat</h3>
        @if(!$annonces->isEmpty())
            <div class="section">
                <h4><a href="#annonce" class="ancre" id="annonce">#</a> Annonces</h4>
                @foreach ($annonces as $annonce)
                    <div class="annonce-section">
                        <div class="annonce-auteur">
                            <img id="<?= $annonce->id.'_'.str_replace(' ', '_', $annonce->titre)?>" class="annonce-auteur-photo" src="../{!! $annonce->user->image !!}" alt="">
                            <span class="disc-auteur-nom">{{$annonce->user->name." ".$annonce->user->prenom}}, le {{ date_format($annonce->created_at, 'd/m/y')}}</span>
                        </div>
                        <h6 class="annonce-titre"><?= strtoupper($annonce->titre)?></h6>
                        <div class="disc-description">{!! $annonce->text !!}</div>
                    </div>
                @endforeach
                <a href="{{ route('tutoriel.index') }}" class="link-tous">Tous les annonces</a>
            </div>
        @endif

        @if(!$tutoriels->isEmpty())
            <div class="section">

                <h4><a href="#tuto" class="ancre" id="tuto">#</a> Tutoriels</h4>
                @foreach ($tutoriels as $tutoriel)
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
                <a href="{{ route('tutoriel.index') }}" class="link-tous">Tous les tutoriels</a>
            </div>
        @endif

        @if(!$users->isEmpty())
            <div class="section">
                <h4><a href="#membre" class="ancre" id="membre">#</a> Membres</h4>
                @foreach ($users as $user)
                    <div class="panel-membre">
                        <img class="img-membre" src="{{asset( $user->image) }}" alt="">
                        <div class="info-membre">
                            <div class="info">
                                {!! link_to_route('user.show', $user->name." ". $user->prenom , [$user->id], ['class' => 'link']) !!}<br/>
                                <span class="label-domaine">{{ $user->domaine }}</span><br/>
                                @foreach($user->tutoriels as $tutoriel)
                                    <img class="img-badge" src="{{asset( $tutoriel->badget->image) }}">
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
                                'top': '30px',
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
    @endif
@endsection

@section("navigation")
    @if(!$annonces->isEmpty() || $tutoriels->isEmpty() || $forums->isEmpty() || $users->isEmpty())
        @include('accueil.navigation')
    @endif
@endsection

@section('footer')
    @include('accueil.footer')
@endsection

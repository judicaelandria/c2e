@extends('base')

@section('title')
    Accueil
@endsection

@section('style')
    {{ Html::style('css/membre.css') }}
@endsection

@section('contenu')
        <div class="section">
            <h3><a class="ancre" id="auteur">#</a>Auteurs de ce site</h3>
            @foreach ($auteurs as $auteur)
                <div class="panel-membre">
                    <img class="img-membre" src="{{asset( $auteur->image) }}" alt="">
                    <div class="info-membre">
                        <div class="info">
                            {!! link_to_route('user.show', $auteur->name." ". $auteur->prenom , [$auteur->id], ['class' => 'link']) !!}<br/>
                            <span class="label-domaine">{{ $auteur->domaine }}</span><br/>
                            @foreach($auteur->tutoriels as $tutoriel)
                                @if($tutoriel->validation != null)
                                    <img class="img-badge" src="{{asset( $tutoriel->badget->image) }}">
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="section">
            <h3><a class="ancre" id="contributeur">#</a>Contributeurs</h3>
            @foreach ($contributeurs as $auteur)
                <div class="panel-membre">
                    <img class="img-membre" src="{{asset( $auteur->image) }}" alt="">
                    <div class="info-membre">
                        <div class="info">
                            {!! link_to_route('user.show', $auteur->name." ". $auteur->prenom , [$auteur->id], ['class' => 'link']) !!}<br/>
                            <span class="label-domaine">{{ $auteur->domaine }}</span><br/>
                            @foreach($auteur->tutoriels as $tutoriel)
                                @if($tutoriel->validation != null)
                                    <img class="img-badge" src="{{asset( $tutoriel->badget->image) }}">
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="section">
            <h3><a class="ancre" id="ancien">#</a>Anciens</h3>
            @foreach ($anciens as $auteur)
                <div class="panel-membre">
                    <img class="img-membre" src="{{asset( $auteur->image) }}" alt="">
                    <div class="info-membre">
                        <div class="info">
                            {!! link_to_route('user.show', $auteur->name." ". $auteur->prenom , [$auteur->id], ['class' => 'link']) !!}<br/>
                            <span class="label-domaine">{{ $auteur->domaine }}</span><br/>
                            @foreach($auteur->tutoriels as $tutoriel)
                                @if($tutoriel->validation != null)
                                    <img class="img-badge" src="{{asset( $tutoriel->badget->image) }}">
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

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

@section('navigation')
    <ul>
        <li>
            <a href="#auteur">AUTEURS</a>
            <ul>
                @foreach($auteurs as $user)
                    <li>{!! link_to_route('user.show', $user->name." ". $user->prenom , [$user->id], ['class' => '']) !!}<br/></li>
                @endforeach
            </ul>
        </li>
        <li>
            <a href="#contributeur">CONTRIBUTEURS</a>
            <ul>
                @foreach($contributeurs as $user)
                    <li>{!! link_to_route('user.show', $user->name." ". $user->prenom , [$user->id], ['class' => '']) !!}<br/></li>
                @endforeach
            </ul>
        </li>
        <li>
            <a href="#ancien">ANCIENS</a>
            <ul>
                @foreach($anciens as $user)
                    <li>{!! link_to_route('user.show', $user->name." ". $user->prenom , [$user->id], ['class' => '']) !!}<br/></li>
                @endforeach
            </ul>
        </li>
    </ul>
@endsection
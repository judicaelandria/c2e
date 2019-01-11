<div class="bar menu ">
    <div class="container">
        <img class="pull-left img-logo" src="{!! asset('image/entete/logo.png') !!}">
        <div class="pull-right">
            <ul class="menu-list menu-max">
                <li><a href="{{ route('home') }}">Accueil</a></li>
                {{--<li><a href="{{ route('annonce.index') }}">Annonce</a></li>--}}
                <li><a href="{{ route('tutoriel.index') }}">Tutoriel</a></li>
                <li><a href="{{ route('user.index') }}">Membre</a></li>
                <li><a href="{{ route('forum.index') }}">Discussion</a></li>
                <li><a href="{{ route('apropos') }}">A propos</a></li>
                @if (!Auth::guest() && Auth::user()->type_utilisateur->terme == "admin")
                    <li><a href="{{ route('badget.index') }}">Badge</a></li>
                @endif
                @if (!Auth::guest() && (Auth::user()->type_utilisateur->terme == "validateur" || Auth::user()->type_utilisateur->terme == "admin"))
                    <li><a href="{{ route('tutoriel.list_validation') }}">Validation</a></li>
                @endif
            </ul>
            <div class="menu-user">
                @if(Auth::guest())
                    <img class="img-user" src=" {!! asset('icon/login.svg') !!}">
                    <ul class="list-menu-guest">
                        <li><a href=" {{ url('/login') }}" class="link-dark"> Se connecter</a></li>
                        <li><a href=" {{ url('/registration') }}" class="link-dark"> S'inscrire</a></li>
                    </ul>
                @else
                    <img class="img-user" src=<?php 
                if(file_exists(Auth::user()->image))
                echo asset(Auth::user()->image);
                else echo asset('images_users/default.svg'); 
                ?> alt="" >
                    <ul class="list-menu-guest">
                        <li><a href="{{route('user.show', [Auth::user()->id])}}" class="link-dark">Profil</a></li>
                        <li><a href="{{ url('/logout') }}" class="link-dark"> Se déconnecter</a></li>
                    </ul>
                @endif
            </div>
            <div class="menu-min">
                <img class="menu-icon" src="{{asset('icon/menu.svg')}}"/>
                <ul class="list-menu-link">
                    <li></li>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li><a href="{{ route('annonce.index') }}">Annonce</a></li>
                    <li><a href="{{ route('tutoriel.index') }}">Tutoriel</a></li>
                    <li><a href="{{ route('user.index') }}">Membre</a></li>
                    <li><a href="{{ route('forum.index') }}">Discussion</a></li>
                    <li><a href="#">A propos</a></li>
                    @if (!Auth::guest() && Auth::user()->type_utilisateur->terme == "admin")
                        <li><a href="{{ route('badget.index') }}">Badge</a></li>
                    @endif
                    @if (!Auth::guest() && (Auth::user()->type_utilisateur->terme == "validateur" || Auth::user()->type_utilisateur->terme == "admin"))
                        <li><a href="{{ route('tutoriel.list_validation') }}">Validation</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="bar def">
    <div class="container">
        <span class="def-logo">Club d'Entraide des Etudiants</span>
    </div>
</div>
<div class="bar recherche">
    <div class="container">
        <div class="pull-left">
            <span class="def-logo-recherche">Club d'Entraide des Etudiants</span>
        </div>
        <div>
            {!! Form::open(['route' => ['home.search'], 'method' => 'get']) !!}
                <input class="input-search" type="text" id="test" name="data" value="{{Request::get('data')}}"/>
                <img class="img-loupe" src="{!! asset('image/entete/loupe.png') !!}" onclick="submit()"/>
            {!! Form::close() !!}
        </div>
    </div>

</div>
{{Html::script('js/jquery-3.1.1.min.js')}}
{{Html::script('js/animation.js')}}
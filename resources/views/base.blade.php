<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('favicon.svg') }}" />
    {{ Html::style('css/base.css')}}
    {{ Html::style('css/entete.css') }}
    {{ Html::style('css/form.css') }}
    {{ Html::style('css/membre.css') }}
    {{ Html::style('css/tutoriel.css') }}
    {{ Html::style('css/navigation.css') }}
    @yield('style')
</head>
<body>
    <header>
        @include('menu.top_menu')
        @yield("banniere")
    </header>
    <div class="container">
        <div class="article">
            @yield("contenu")
        </div>
        <div class="navigation">
            @yield("navigation")
        </div>
    </div>
    {{--<footer class="footer">
        @yield("footer")
    <footer>--}}
    @yield('modal')
</body>
	@include('jsBase.js')
	@yield('javascript')
</html>
@extends('base')
@section('title') Tutoriels @endsection

@section('style')
    {{ Html::style('css/tutoriel.css') }}
@endsection

@section('contenu')
    @if(session()->has('ok'))
        <div class="alert-success">{!! session('ok') !!}</div>
    @endif

    <h3>
        <a href="#aprecies" class="ancre" id="tuto"></a>Requêtes de validations
    </h3>
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
    {!! $links !!}
@stop

@section('navigation')
    <ul>
        <li>
            <a href="#aprecies">TUTORIELS</a>
            <ul>
                @foreach($tutoriels as $tutoriel)
                    <li>{{ link_to_route('tutoriel.show', $tutoriel->nom, [$tutoriel->id], ['class' => '']) }}</li>
                @endforeach
            </ul>
        </li>
    </ul>
@endsection
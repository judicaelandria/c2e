@extends('base')

@section('title') Membres @endsection

@section('style')
    {{ Html::style('css/membre.css') }}
@endsection

@section('contenu')
    @if(session()->has('ok'))
        <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
    @endif

    <div class="section">
        <h3>
            Membres
            {{--{!! link_to_route('user.create', 'Creer un utilisateur', [], ['class' => 'btn btn-primary pull-right']) !!}--}}
        </h3>
        @foreach ($users as $user)
            <div class="panel-membre">
                  <img class="img-membre" src=<?php 
                if(file_exists($user->image))
                echo asset($user->image);
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
                            @if($tutoriel->validation_id != null)
                                <img class="img-badge" src="{{asset( $tutoriel->badget->image) }}">
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $users->links() }}
@stop

@section('navigation')
    <ul>
        <li>
            <a href="#aprecies">MEMBRES</a>
            <ul>
                @foreach($users as $user)
                    <li>{!! link_to_route('user.show', $user->name." ". $user->prenom , [$user->id], ['class' => '']) !!}<br/></li>
                @endforeach
            </ul>
        </li>
    </ul>
@endsection
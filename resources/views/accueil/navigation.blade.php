<ul>
    @if(!$annonces->isEmpty())
        <li>
            <a href="#annonce">ANNONCES RECENTES</a>
            <ul>
                @foreach($annonces as $annonce)
                    <li><a href="#">{{$annonce->titre}}</a></li>
                @endforeach
            </ul>
        </li>
    @endif

    @if(!$tutoriels->isEmpty())
        <li>
            <a href="#tuto">TUTORIELS RECENTS</a>
            <ul>
                @foreach($tutoriels as $tutoriel)
                    <li>{{ link_to_route('tutoriel.show', $tutoriel->nom, [$tutoriel->id], ['class' => '']) }}</li>
                @endforeach
            </ul>
        </li>
    @endif

    @if(!$users->isEmpty())
        <li>
            <a href="#membre">MEMBRES ACTIFS</a>
            <ul>
                @foreach($users as $user)
                    <li>{!! link_to_route('user.show', $user->name." ". $user->prenom , [$user->id], ['class' => '']) !!}<br/></li>
                @endforeach
            </ul>
        </li>
    @endif
</ul>
@extends('base')
@section('title') Tutoriels @endsection

@section('style')
	{{ Html::style('css/tutoriel.css') }}
@endsection

@section('banniere')
	<div class="container">
		<div class="tuto-banniere">
		<pre class=" language-c"><code class="language-c hljs cpp"><span class="token function"><span class="hljs-built_in">printf</span></span><span class="token punctuation">(</span><span class="token string"><span class="hljs-string">"Hello world!"</span></span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token comment" spellcheck="true"><span class="hljs-comment">//La rédaction d'un tutoriel permet d'avoir un badge</span></span></code></pre>
			<center>
				{!! link_to_route('tutoriel.create', 'Rédiger un tutoriel', [], ['class' => 'tuto-btn ']) !!}
			</center>
		</div>
	</div>
@endsection

@section('contenu')
	@if(session()->has('ok'))
		<div class="alert-success">{!! session('ok') !!}</div>
	@endif

	<h3>
		<a href="#aprecies" class="ancre" id="tuto"></a>Tutoriels
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
	{!! $tutoriels->links() !!}
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
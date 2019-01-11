@extends('base')
@section('title')
	{!! $chapitre->nom !!}
@endsection
@section('contenu')
    <br>
    <div class="col-sm-12">
    	@if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
		@endif
	   <div style="text-align: center;color:orange;" class="row">{!! $chapitre->nom !!}</div>
	   <b>---------------------------------------------------------------------------------</b>
	   <div class="row">{!! $chapitre->description !!}</div>
	   <b>---------------------------------------------------------------------------------</b>
		@php($numero_section = 1)
		@foreach ($chapitre->sections as $section)
			<div class="row" style="color:green;"><br/><a href="#{{ $numero_section }}">{{ $numero_section }}:{!! $section->titre !!}</a>
							{{-- {!! link_to_route('tutoriel.show', 'Continuer l\'écriture du chapitre', [$tutoriel->id], ['class' => '']) !!} --}}
							@php($numero_section++)
			</div>
		@endforeach

		@php($numero_section = 1)
		@foreach ($chapitre->sections as $section)
			<div id="{{ $numero_section }}">
				<div style="color:green;">{!! $section->titre !!}</div>
					<div>
			 			{{ $section->contenu }}
					</div>
			</div>
		@php($numero_section++)
		@endforeach
	</div>
		@section('javascript')

		@endsection
@stop
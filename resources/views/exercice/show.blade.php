@extends('base')

@section('contenu')
<p>Nom:{{ $exercice->nom }}</p>
<p>Déscription:{!! $exercice->description !!}</p>
<p>Question:</p>
<?php $nbr = 0; ?>
 		@foreach ( $exercice->questions as $question)
 		 		<p>
 		 		<?php $nbr = $nbr +1; ?>
 		 		
 		 				   {{ $nbr }}{!! $question->phrase !!}
 		 				   {{--  {!! link_to_route('exercice.delete', 'Voir', [$exercice->id], ['class' => '']) !!} --}}
							{!! link_to_route('exercice.edit', 'Modifier', [$exercice->id], ['class' => '']) !!}
 		 		</p>
 		@endforeach
 		   @include('question.create')
 		   @section('javascript')
				<script>
					@include('tinyMCE.config_all_of_tinyMCE')
				</script>
		   @endsection
@endsection
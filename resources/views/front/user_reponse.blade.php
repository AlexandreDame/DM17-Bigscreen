@extends('layouts.master')

@section('content')

    <h3 class="text-white">Vous trouverez ci-dessous les réponses que vous avez apportées à <br> notre sondage le <strong class="text-primary"> {{ $date }} </strong></h3>
    <div class="row mt-4 text-white">        
        @forelse($questions as $question)
        <div class="col-md-12">
            <p class="indexQuestion">Question {{ $question->id }} / {{ count($questions) }}</p>
            <p class="StateQuestion">{{ $question->question }}</p>
            @forelse($reponses as $key => $value)
            @if($question->id == $key)
            <div class="col-md-12 question_block">
                <p class="response_block text-dark">{{ $value }}</p>
            </div>
            @endif
            @empty
            <p>Aucune réponses...</p>

            @endforelse
        </div>
        @empty
        <p>Aucune réponses...</p>

        @endforelse
    </div>

@endsection
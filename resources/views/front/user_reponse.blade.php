@extends('layouts.master')

@section('content')

    <h3>Vous trouverez ci-dessous les réponses que vous avez apportées à <br> notre sondage le ... </h3>
    <div class="row mt-4">        
        @forelse($questions as $question)
        <div class="col-md-12">
            <p class="indexQuestion">Question {{ $question->id }} / {{ count($questions) }}</p>
            <p class="StateQuestion">{{ $question->question }}</p>
            @forelse($reponses as $key => $value)
            @if($question->id == $key)
            <div class="col-md-12 question_block">
                <p class="response_block">{{ $value }}</p>
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
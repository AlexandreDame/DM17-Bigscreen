@extends('layouts.master')

@section('content')

    <h3 class="text-white">Merci de répondre à toutes les questions et de valider le formulaire en bas de page.</h3>

    @if(Session::has('success'))
    <div class="alert alert-success">
        {!! session()->get('success') !!}
    </div>
    @endif

    <form action="{{ route('reponse.store') }}" method="POST">
        {{ csrf_field() }}
        
        @forelse($questions as $question)
        <div class="form-group question_block text-white">
            <p class="indexQuestion">Question {{ $question->id }} / {{ count($questions) }}</p>
            <p class="StateQuestion">{{ $question->question }}</p>
            <div class="question_block">
                @if( $question->question_type === "B" )
                <input type="text" required="required" name="reponse_type{{ $question->question_type }}[{{ $question->id }}]" id="reponse_type{{ $question->id }}" class="form-control response_block" value={{old($question->question)}}>
                
                @else
                    <select required name="reponse_type{{ $question->question_type }}[{{ $question->id }}]" id="reponse_type{{$question->id}}" class="form-control response_block">
                        <option value="">Choisissez une réponse</option>
                        @forelse(explode(', ', $question->choix_reponse) as $reponse)
                        <option value="{{ $reponse }}">{{ $reponse }}</option>
                        @empty
                        @endforelse
                    </select>
                @endif
            </div>
        </div>

        @empty
        <p>Aucune question...</p>

        @endforelse

        <button type="submit" class="btn btn-primary btnStyle">Finaliser</button>
    </form>

@endsection
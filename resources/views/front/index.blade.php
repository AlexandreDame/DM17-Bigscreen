@extends('layouts.master')

@section('content')

    <h3>Merci de répondre à toutes les questions et de valider le formulaire en bas de page.</h3>

    @if(Session::has('success'))
    <div class="alert alert-success">
        {!! session()->get('success') !!}
    </div>
    @endif

    <form action="{{ route('reponse.store') }}" method="POST">
        {{ csrf_field() }}
        
        @forelse($questions as $question)
        <div class="form-group question_block">
            <p class="indexQuestion">Question {{ $question->id }} / {{ count($questions) }}</p>
            <p class="StateQuestion">{{ $question->question }}</p>
            <div class="">
                @if( $question->question_type === "B" )
                <input type="text" name="reponse_type{{ $question->question_type }}[{{ $question->id }}]" id="reponse_type{{ $question->id }}" class="form-control">
                @else
                    <select name="reponse_type{{ $question->question_type }}[{{ $question->id }}]" id="reponse_type{{$question->id}}" class="form-control response_block">
                        
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

        <button type="submit" class="btn btn-primary">Finaliser</button>
    </form>

@endsection
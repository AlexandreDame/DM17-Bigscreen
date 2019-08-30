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
               
               @switch($question->question_type)
                
                @case("A")
                    <select name="reponse_typeA[{{ $question->id }}]" id="reponse{{$question->id}}" class="form-control response_block">
                        <option value="">Choisissez une réponse</option>
                        @forelse(explode(', ', $question->choix_reponse) as $reponse)
                        <option value="{{ $reponse }}">{{ $reponse }}</option>
                        @empty
                        @endforelse
                    </select>
                    @if($errors->has('question_typeA'.$question->id)) <span class="alert-danger">{{$errors->first('question_typeA'.$question->id)}}</span>@endif
                    @break

                @case("B")
                    <input type="text" name="reponse_typeB[{{ $question->id }}]" id="reponse{{ $question->id }}" class="form-control response_block" value={{old($question->question)}}>
                    @if($errors->has('question_typeB'.$question->id)) <span class="alert-danger">{{$errors->first('question_typeB'.$question->id)}}</span>@endif
                    @break

                @case("C")
                    <select name="reponse_typeC[{{ $question->id }}]" id="reponse{{$question->id}}" class="form-control response_block">
                        <option value="">Choisissez une réponse</option>
                        @forelse(explode(', ', $question->choix_reponse) as $reponse)
                        <option value="{{ $reponse }}">{{ $reponse }}</option>
                        @empty
                        @endforelse
                    </select>
                    @if($errors->has('question_typeC'.$question->id)) <span class="alert-danger">{{$errors->first('question_typeC'.$question->id)}}</span>@endif
                    @break
                @default
               @endswitch
            </div>
        </div>

        @empty
        <p>Aucune question...</p>

        @endforelse

        <button type="submit" class="btn btn-primary btnStyle">Finaliser</button>
    </form>

@endsection
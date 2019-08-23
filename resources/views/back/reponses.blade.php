@extends('layouts.master')

@section('content')

    @forelse($reponse as $reponse)
    <table class="table table-hover table-bordered mt-4 mb-4">
        <tbody>
            <th>N°</th>
            <th>Intitulé de la question</th>
            <th>Réponse</th>
            @forelse($questions as $question)
            <tr>
                <td>{{ $question->id }}</td>
                <td>{{ $question->question }}</td>
                @forelse($reponse as $key => $value)
                @if($question->id == $key)
                <td>{{ $value }}</td>
                @endif
                @empty
                @endforelse
            </tr>
            @empty
            <tr>Aucune réponse...</tr>
            @endforelse
        </tbody>
    </table>
    @empty
    <p>Non...</p>
    @endforelse
@endsection
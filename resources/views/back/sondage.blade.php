@extends('layouts.master')

@section('content')
    {{ csrf_field() }}

    <table class="table table-hover table-bordered mt-4 mb-4">
        <tbody>
            <th class="text-center">N°</th>
            <th>Intitulé de la question</th>
            <th>Type</th>
            @forelse($questions as $question)
            <tr>

                <td class="text-center">{{ $question->id }}</td>
                <td>{{ $question->question }}</td>
                <td class="text-center">{{ $question->question_type }}</td>
            </tr>
            @empty
            <tr>
                <td colspan=3>Aucune questions...</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection
@extends('layouts.master')

@section('content')
    {{ csrf_field() }}

 <h3 class="text-white text-center mt-4">Statistiques</h3>
    <div class="row pageStat">
        @forelse($charts as $datas)
        <div class="col-md-6 mt-6">
            <p class="question">{{ $datas['question'] }}</p>
            <canvas id="question{{$datas['question_id']}}" height="360"></canvas>
        </div>
        @empty
        @endforelse

        <div class="col-md-6 mt-6">
            <p class="question"></p>
            <canvas id="Radar" height="360"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

@forelse($charts as $datas)
<script>
var ctx = document.getElementById("question" + <?= $datas['question_id'] ?>).getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: @json($datas['labels']),
        datasets: [{
            
            data: @json($datas['data']),
            backgroundColor: @json($datas['colors'])
        }]
    }
});
</script>
@empty
@endforelse

<script>
        var ctx = document.getElementById("Radar").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'radar',
            data: {
                /**
                 * labels = ID de la Question
                 * data = Moyenne obtenue par la question
                 */
                labels: @json($radar['labels']),
                datasets: [
                    {
                        label: "Moyenne",
                        data: @json($radar['data']),
                        backgroundColor: "rgba(52,144,220,0.4)",
                        borderColor: "rgba(52,144,220,1)",
                        pointBackgroundColor: "rgba(0,0,0,1)",
                        pointBorderColor: "#fff",
                        pointHoverBackgroundColor: "#fff",
                        pointHoverBorderColor: "rgba(0,0,0,1)",
                    }
                ]
            },
            options: {
                scale: {
                    ticks: {
                        beginAtZero: true,
                        max: 5,
                        stepSize: 1
                    }
                }
            }
        });
    </script>

   
    
@endsection
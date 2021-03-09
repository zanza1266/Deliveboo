@extends('layouts.app')

@section('chart-css')
<link rel="stylesheet" type="text/css" href="path/to/chartjs/dist/Chart.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
@endsection

@section('content')

{{-- @foreach ($years as $year)
  <button type="button" name="button">{{$year}}</button>
@endforeach --}}
<canvas id="myChart" width="400" height="400"></canvas>
@foreach ($orders_for_years as $orders_for_year)
  <?php $index = 0; ?>
  <h1>Nell'anno {{$orders_for_year[13]}} il tuo ristorante ha ricevuto un totale di {{$orders_for_year[12]}} ordini</h1>
  <h3>Ordini per mese:</h3>
  @foreach ($orders_for_year[14] as $month_name)
    <ul>
      <li>{{$month_name}}: {{$orders_for_year[$index]}}</li>
    </ul>
    <?php $index += 1; ?>
  @endforeach

@endforeach


@endsection

@section('scripts')
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['gennaio', 'febbraio', 'marzo', 'aprile', 'maggio', 'giugno'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    }
});
</script>
@endsection

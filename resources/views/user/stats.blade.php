@extends('layouts.app')

@section('chart-css')
  <link href="{{ asset('css/chart.css') }}" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
@endsection

@section('content')
<charts orders_json='{!!json_encode($orders_for_years)!!}'></charts>

    

@endsection

@section('scripts')

@endsection
@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-center background align-items-center">

        <div class="d-flex flex-column align-items-center my-card">

            <h1>
                Il tuo ordine è stato ricevuto!
            </h1>

            <h3>L' ID del tuo ordine è: {{$transactionId->id}}</h3>

            <a href="/" class="homepage">Torna alla Homepage</a>

        </div>

    </div>

@endsection

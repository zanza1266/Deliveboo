@extends('layouts.app')

@section('content')
    <div class="">
        <div class="container">
            <div class="row pt-4">
                <div class="col d-flex justify-content-center">
                    <h1>
                        Il tuo ordine è stato ricevuto!
                    </h1>

                </div>
            </div>
        </div>

        <div class="row pt-4">
            <div class="col d-flex justify-content-center">

                <div class="d-flex flex-column align-items-center">

                    <h3>L' ID del tuo ordine è: hfds743</h3>
                    {{-- <h3>L' ID del tuo ordine è: {{$transactionId->id}}</h3> --}}

                    <a href="/" class="homepage">Torna alla Homepage</a>

                </div>

            </div>
        </div>
    </div>
    </div>
@endsection

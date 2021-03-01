@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">

            <h1>
                nome: {{$dish->name}}
            </h1>

            <p>
                ingredienti: {{$dish->ingredients}}
            </p>

            <p>
                descrizione: {{$dish->description}}
            </p>


            <p>
                menu: {{$dish->dishToType->name}}
            </p>

            <p>
                prezzo: {{$dish->price}}
            </p>

        </div>
    </div>

</div>
@endsection

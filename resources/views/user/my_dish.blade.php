@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">

          <img src="{{asset($dish->img)}}" alt="">


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

        <div class="row">
            <div class="col">
                <form action="{{ route('my-dishes.destroy', $dish->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit">Elimina questo piatto</button>
                </form>
                <a href="{{ route('my-dishes.edit', $dish->id) }}">Modifica il piatto</a>
            </div>
        </div>
    </div>

</div>
@endsection

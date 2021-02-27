@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <h1>
                    nome: {{$restaurant->name}}
                </h1>

                <p>
                    indirizzo: {{$restaurant->address}}
                </p>

                <p>
                    telefono: {{$restaurant->phone}}
                </p>

                <div>
                    <p>categorie:</p>
                    @foreach ($restaurant->restaurantToCategory as $category)
                        <p>{{$category->name}}</p>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a class="btn btn-info" href="{{route('my-restaurants.edit', $restaurant->id) }}">Modifica il ristorante</a>
                <form action="{{ route('my-restaurants.destroy', $restaurant->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit">Elimina questo ristorante</button>
                </form>

            </div>
        </div>

    </div>
@endsection

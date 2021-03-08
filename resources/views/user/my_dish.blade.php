@extends('layouts.app')

@section('content')
<show-id>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card card-container">
                    <img class="card-img-top" src="{{asset($dish->img)}}" alt="dish image">
                    <div class="card-body">
                        <h2 class="card-title"><strong>Nome:</strong> {{$dish->name}}</h2>
                        <p class="card-text"><strong>Ingredienti:</strong> {{$dish->ingredients}}</p>
                        <p class="card-text"><strong>Descrizione:</strong> {{$dish->description}}</p>
                        <p class="card-text"><strong>Menu:</strong> {{$dish->dishToType->name}}</p>
                        <p class="card-text"><strong>Prezzo:</strong> {{$dish->price}}€</p>
                        <div class="row">
                            <div class="col d-flex">
                                    {{-- <a href="{{ route('my-dishes.destroy', $dish->id) }}">Elimina il piatto</a> --}}
                                    <a class="btn btn-outline-info my-2" href="{{ route('my-dishes.edit', $dish->id) }}">Modifica il piatto</a>


                                    <form action="{{ route('my-dishes.destroy', $dish->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="my-2 mx-2 btn btn-outline-danger"  type="submit">Elimina</button>
                                    </form>
                            
                            </div>
                        </div>

                    </div>
                </div>
            <img  alt="">


                <h1>
                    
                </h1>

                <p>
                    
                </p>

                <p>
                    
                </p>


                <p>
                    
                </p>

                <p>
                    
                </p>

            </div>

            
        </div>

    </div>
</show-id>
@endsection

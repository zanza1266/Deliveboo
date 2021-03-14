@extends('layouts.app')

@section('content')

<show-elements>

    <div class="container">

        @if ($dishes->count() == 0)

            <div class="row">
                <div class="col text-center no-rest">

                    <a href="/my-dishes/create?id_restaurant={{$restaurant_index}}">Aggiungi piatto</a>

                    <h1 class="pt-4">Non hai ancora aggiunto nessun piatto al tuo menù!</h1>
                </div>
            </div>

        @else

            <div class="row">
                <div class="col my-5 text-center">
                    <a href="/my-dishes/create?id_restaurant={{$restaurant_index}}">Aggiungi piatto</a>
                    <h1 class="pt-4">I tuoi piatti</h1>
                </div>
            </div>

            <div class="row">
                <div class="col d-flex justify-content-center flex-wrap">

                    @foreach($dishes as $dish)

                        <div class="card d-inline-block m-4 @if($dish->available == 0) not-available @endif">

                            <div class="img-cont d-flex @if($dish->available == 0) opac @endif"> 
                                <img src="{{$dish->img}}" alt="restaurant-logo">
                            </div>
                            

                            <div class="card-body @if($dish->available == 0) opac @endif">
                                <a href="{{route('my-dishes.show', $dish->id)}}" class="stretched-link">{{$dish->name}}</a>
                            </div>

                            @if ($dish->available == 0)
                                
                                <small>Non disponibile</small>

                            @endif
                        </div>

                    @endforeach

                </div>
            </div>

        @endif


        
    </div>
    

</show-elements>
@endsection

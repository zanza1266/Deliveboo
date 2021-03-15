@extends('layouts.app')

@section('content')

    <show-elements>

        <div class="container">

            @if ($restaurants->count() == 0)

                <div class="row">
                    <div class="col text-center no-rest">

                        <a href="{{route('my-restaurants.create')}}">Aggiungi ristorante</a>

                        <h1 class="pt-4">Non hai ancora aggiunto nessun ristorante!</h1>
                    </div>
                </div>

            @else

                <div class="row">
                    <div class="col my-5 text-center">
                        <a href="{{route('my-restaurants.create')}}">Aggiungi ristorante</a>
                        <h1 class="pt-4">I tuoi ristoranti</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col d-flex justify-content-center flex-wrap">

                        @foreach($restaurants as $restaurant)

                            <div class="card d-inline-block m-4">

                                <div class="img-cont"> 
                                    <img src="{{$restaurant->logo}}" class="" alt="restaurant-logo">
                                </div>
                                

                                <div class="card-body">
                                    <a href="{{route('my-restaurants.show', $restaurant->id)}}" class="stretched-link">{{$restaurant->name}}</a>
                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>

            @endif


            
        </div>

    </show-elements>

@endsection
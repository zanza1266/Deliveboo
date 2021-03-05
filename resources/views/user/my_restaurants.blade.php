@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col text-center my-4">
               <button> <a href="{{route('my-restaurants.create')}}">Aggiungi ristorante</a></button>
            </div>
        </div>
    
        
        <div class="text-center my-4">
                <h1 style="color:#00ccbc">I tuoi ristoranti</h1>
               @foreach($restaurants as $restaurant)
                <div class="card d-inline-block my-4" style="width: 18rem;">
              
                    <img src="{{$restaurant->logo}}" class="card-img-top" alt="restaurant-logo">
                        <div class="card-body">
                        
                        <a href="{{route('my-restaurants.show', $restaurant->id)}}">{{$restaurant->name}}</a>
                        
                        </div>
                </div>
                @endforeach
               
           
        </div>
           
        </div>
    </div>


@endsection
@extends('layouts.app')

@section('content')
<show-elements>
    <div class="container">
        <div class="row">
            <div class="col text-center my-4">
                <a href="{{route('my-restaurants.create')}}">Aggiungi ristorante</a>
            </div>
        </div>
    
        
        <div class="text-center my-4">
                <h1>I tuoi ristoranti</h1>
               @foreach($restaurants as $restaurant)
                <div class="card d-inline-block my-4">
              
                    <img src="{{$restaurant->logo}}" class="card-img-top" alt="restaurant-logo">
                        <div class="card-body">
                        
                        <a href="{{route('my-restaurants.show', $restaurant->id)}}" class="stretched-link">{{$restaurant->name}}</a>
                        
                        </div>
                </div>
                @endforeach
               
           
        </div>
           
        </div>
    
</show-elements>

@endsection
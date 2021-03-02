@extends('layouts.app')

@section('content')

    <div class="container">
    
        <div class="row">
            <div class="col">
                @foreach ($restaurants as $restaurant)
                    <a href="{{route('restaurants.show', $restaurant->id)}}">{{$restaurant->name}}</a>
                @endforeach
            </div>
        </div>
    </div>


@endsection
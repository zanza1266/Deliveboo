@extends('layouts.app')

@section('content')

    {{-- @dd($restaurant_index) --}}
<show-elements>
    <div class="container">
        <div class="row">
            <div class="col text-center my-4">
                <a href="/my-dishes/create?id_restaurant={{$restaurant_index}}">Aggiungi piatto</a>
            </div>
        </div>
        <div class="text-center my-4">
                <h1>I tuoi piatti</h1>
       
                @foreach ($dishes as $dish)
                <div class="card d-inline-block my-4">
                <img src="{{$dish->img}}" class="card-img-top" alt="dish-img">
                    <div class="card-body">
                        <a href="{{route('my-dishes.show', $dish->id)}}">{{$dish->name}}</a>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
    

</show-elements>
@endsection

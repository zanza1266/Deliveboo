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
                <ul>
                @foreach ($dishes as $dish)
                
                    <li>
                        <div class="card d-inline-block my-4">
                            <div class="sub-img">
                            <img src="{{$dish->img}}" class="card-img-top" alt="dish-img">
                            </div>
                                <div class="card-body">
                                    <a href="{{route('my-dishes.show', $dish->id)}}" class="stretched-link">{{$dish->name}}</a>
                                </div>
                        </div>
                    </li>
                
                @endforeach
                </ul>
        </div>
    </div>
    

</show-elements>
@endsection

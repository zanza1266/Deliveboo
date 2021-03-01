@extends('layouts.app')

@section('content')

    {{-- @dd($restaurant_index) --}}

    <div class="container">
        <div class="row">
            <div class="col">
                <a href="/my-dishes/create?id_restaurant={{$restaurant_index}}">Aggiungi piatto</a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                @foreach ($dishes as $dish)
                    <a href="{{route('my-dishes.show', $dish->id)}}">{{$dish->name}}</a>
                @endforeach
            </div>
        </div>
    </div>


@endsection

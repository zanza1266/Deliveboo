@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{route('my-dishes.create')}}">Aggiungi piatto</a>
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

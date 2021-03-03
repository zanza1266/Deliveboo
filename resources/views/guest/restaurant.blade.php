@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <h1>
                    {{$restaurant->name}}
                </h1>
                <div>
                    @foreach ($dishes as $dish)
                        <p>
                            {{$dish->name}}
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

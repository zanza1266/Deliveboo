@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <h1>
                    {{$restaurant->name}}
                </h1>

                <img src="{{asset($restaurant->logo)}}" alt="logo" style="width: 200px">
            </div>
        </div>

        <div class="row">
            <div class="col">

                <dishes-cart dishes_json='{!!json_encode($dishes)!!}'></dishes-cart>

            </div>
        </div>


    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row pb-4">
            <div class="col d-flex flex-column align-items-center">
                <h1 class="pt-5 pb-4">
                    {{$restaurant->name}}
                </h1>

                <h5>
                    <span>Categorie</span>
                    @foreach ($restaurant->restaurantToCategory as $category)
                        <span>
                            - {{$category->name}}
                        </span>
                    @endforeach
                </h5>

                <p>Indirizzo: {{$restaurant->address}}</p>
                <p>Telefono: {{$restaurant->phone}}</p>

                <div class="logo-container">
                    <img src="{{asset($restaurant->logo)}}" alt="logo" style="width: 200px">
                </div>
                
            </div>
        </div>

        <div class="row">
            <div class="col">

                <dishes-cart dishes_json='{!!json_encode($dishes)!!}' restaurant_json='{!!json_encode($restaurant)!!}' types_json='{!!json_encode($types)!!}'></dishes-cart>

            </div>
        </div>


    </div>
@endsection

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


            </div>
        </div>

        @foreach ($dishes as $dish)

            <div class="row">
                
                <div class="col-4">
                    <img src="{{asset($dish->img)}}" alt=""  style="width: 100px">
                </div>

                <div class="col-4">

                    <div>
                        <h2>
                            {{$dish->name}}
                        </h2>

                        <p>
                            Ingredienti: {{$dish->ingredients}}
                        </p>

                        <p>
                            Descrizione: {{$dish->description}}
                        </p>

                        <small>
                            Prezzo: {{$dish->price}} euro
                        </small>

                    </div>
                </div>

                <div class="col-4">
                    <add-button TmpDish='add({!!json_encode($dish)!!})'></add-button>
                </div>
            </div>
            
        @endforeach


    </div>
@endsection

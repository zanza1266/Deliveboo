
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <img src="{{asset($restaurant->logo)}}" alt="">
                <h1>
                    nome: {{$restaurant->name}}
                </h1>

                <p>
                    indirizzo: {{$restaurant->address}}
                </p>

                <p>
                    telefono: {{$restaurant->phone}}
                </p>

                <div>
                    <p>categorie:</p>
                    @foreach ($restaurant->restaurantToCategory as $category)
                        <p>{{$category->name}}</p>
                    @endforeach
                </div>

                <p>sei aperto?
                  @if($restaurant->open == 0)
                    no
                  @else
                    sì
                  @endif
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a class="btn btn-info" href="{{route('my-restaurants.edit', $restaurant->id) }}">Modifica il ristorante</a>



                <div class="banner-container" v-show="isBannerRestaurant">

                    <div class="banner">
                        <form action="{{ route('my-restaurants.destroy', $restaurant->id) }}" method="post">
                            @csrf
                            @method('delete')

                            <h3>Sei sicuro di voler eliminare questo ristorante?</h3>
                            <button type="submit" @click="activeBannerRestaurant">Elimina questo ristorante</button>
                        </form>

                        <a href="#" @click="activeBannerRestaurant">Annulla</a>
                    </div>

                </div>

                <a href="#" @click="activeBannerRestaurant">Elimina Ristorante</a>

                <a href="{{route('my-dishes.index', ['id_restaurant' => $restaurant->id])}}">Vedi i tuoi piatti</a>

            </div>
        </div>

    </div>
@endsection

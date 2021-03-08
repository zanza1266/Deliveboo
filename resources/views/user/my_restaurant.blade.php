@extends('layouts.app')

@section('content')
<show-id>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card card-container ">
                    <img class="card-img-top"  src="{{asset($restaurant->logo)}}" alt="logo-restaurant">
                    <div class="card-body">
                        <h2 class="card-title">Nome: {{$restaurant->name}}</h2>
                        <p class="card-text">Indirizzo: {{$restaurant->address}}</p>
                        <p class="card-text">Telefono: {{$restaurant->phone}}</p>
                        <label for="categories">Categorie:</label>
                        <select name="categories" id="categories">
                            @foreach ($restaurant->restaurantToCategory as $category)
                            <option>{{$category->name}}</option>
                            @endforeach
                        </select>
                        <p class="card-text">Sei aperto?
                          @if($restaurant->open == 0)
                            No
                          @else
                            Sì
                          @endif
                        </p>
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-outline-info my-2" href="{{route('my-restaurants.edit', $restaurant->id) }}">Modifica il ristorante</a>
                                <form action="{{ route('my-restaurants.destroy', $restaurant->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="my-2 btn btn-outline-danger" type="submit">Elimina questo ristorante</button>
                                </form>
                
                                <a class="my-2 btn btn-outline-success" href="{{route('my-dishes.index', ['id_restaurant' => $restaurant->id])}}">Vedi i tuoi piatti</a>
                
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>


    </div>
</show-id>

@endsection


@extends('layouts.app')

@section('content')
<show-id>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card card-container ">
                    <img class="card-img-top"  src="{{asset($restaurant->logo)}}" alt="logo-restaurant">
                    <div class="card-body text-center my-4">
                        <h2 class="card-title"><strong>Nome:</strong> {{$restaurant->name}}</h2>
                        <p class="card-text"><strong>Indirizzo:</strong> {{$restaurant->address}}</p>
                        <p class="card-text"><strong>Telefono:</strong> {{$restaurant->phone}}</p>
                        <label><strong>Categorie:</strong></label>
                        
                            
                                @foreach ($restaurant->restaurantToCategory as $category)
                                    <p><i class="bi bi-check"></i>{{$category->name}}</p>

                                @endforeach
                            
                      
                        <p class="card-text"><strong>Sei aperto?</strong>
                          @if($restaurant->open == 0)
                            No
                          @else
                            Sì
                          @endif
                        </p>
                        </div>
                <div class="row">
                    <div class="col-6">
                        <a class="btn btn-outline-info float-right" href="{{route('my-restaurants.edit', $restaurant->id) }}">Modifica il ristorante</a>
                    </div>
                
                    <div class="banner-container" v-show="isBannerRestaurant">
                                    
                                    <div class="banner">

                                        <h3>Sei sicuro di voler eliminare questo ristorante?</h3>

                                        <form action="{{ route('my-restaurants.destroy', $restaurant->id) }}" method="post">
                                            @csrf
                                            @method('delete')

                                            <div class="button-wrapper">

                                                <button class="btn btn-outline-danger" type="submit" @click="activeBannerRestaurant">Elimina questo ristorante</button>

                                                <a class="btn btn-outline-success" @click="activeBannerRestaurant">Annulla</a>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                    
                    
                    
                    <div class="col-6">
                    <a class="btn btn-outline-danger float-left" @click="activeBannerRestaurant">Elimina Ristorante</a>
                    </div>
                
                <div class="col-6">
                    <a class="my-2 btn btn-outline-success float-right" href="{{route('my-dishes.index', ['id_restaurant' => $restaurant->id])}}">Vedi i tuoi piatti</a>
                </div>
                <div class="col-6">
                    <a class="btn btn-outline-info my-2 stats float-left" href="{{route('stats', $restaurant->id) }}">Vedi statistiche ristorante</a>
                </div>
                            
                </div>
            </div>
        </div>

                
    
</div>
</div>
</show-id>

@endsection

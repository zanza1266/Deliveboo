@extends('layouts.app')

@section('content')
<show-id>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">

                <div class="card card-container">

                    <img class="card-img-top" src="{{asset($dish->img)}}" alt="dish image">

                    <div class="card-body text-center my-4">
                        <h2 class="card-title"><strong>Nome:</strong> {{$dish->name}}</h2>
                        <p class="card-text"><strong>Ingredienti:</strong> {{$dish->ingredients}}</p>
                        <p class="card-text"><strong>Descrizione:</strong> {{$dish->description}}</p>
                        <p class="card-text"><strong>Menu:</strong> {{$dish->dishToType->name}}</p>
                        <p class="card-text"><strong>Prezzo:</strong> {{$dish->price}}€</p>
                    </div>


                        <div class="buttons-container d-flex flex-column align-items-center">

                            <a class="bottom edit" href="{{ route('my-dishes.edit', $dish->id) }}">Modifica il piatto</a>
                            <a class="bottom delete"  @click="activeBannerDish">Elimina Piatto</a>

                        </div>


                    {{-- banner per autorizzare aliminazione piatto --}}
                    <div class="banner-container" v-show="isBannerDish">
                        <div class="banner">
                            <form action="{{ route('my-dishes.destroy', $dish->id) }}" method="post">
                                @csrf
                                @method('delete')
        
                                <h3>Sei sicuro di voler eliminare questo piatto?</h3>
                                <button class="btn btn-outline-danger" @click="activeBannerDish">Elimina</button>
                                <a class="btn btn-outline-success mx-2" @click="activeBannerDish">Annulla</a>
                            </form>

                            
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</show-id>
@endsection

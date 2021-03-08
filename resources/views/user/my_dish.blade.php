@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">

          <img src="{{asset($dish->img)}}" alt="">


            <h1>
                nome: {{$dish->name}}
            </h1>

            <p>
                ingredienti: {{$dish->ingredients}}
            </p>

            <p>
                descrizione: {{$dish->description}}
            </p>


            <p>
                menu: {{$dish->dishToType->name}}
            </p>

            <p>
                prezzo: {{$dish->price}}
            </p>

        </div>

        <div class="row">
            <div class="col">
                {{-- <a href="{{ route('my-dishes.destroy', $dish->id) }}">Elimina il piatto</a> --}}
                <a href="{{ route('my-dishes.edit', $dish->id) }}">Modifica il piatto</a>


                {{-- banner per autorizzare aliminazione piatto --}}

                <div class="banner-container" v-show="isBannerDish">

                    <div class="banner">
                        <form action="{{ route('my-dishes.destroy', $dish->id) }}" method="post">
                            @csrf
                            @method('delete')
    
                            <h3>Sei sicuro di voler eliminare questo piatto?</h3>
                            <button type="submit" @click="activeBannerDish">Elimina</button>
                        </form>

                        <a href="#" @click="activeBannerDish">Annulla</a>
                    </div>

                </div>

                <a href="#" @click="activeBannerDish">Elimina Piatto</a>
        
            </div>
        </div>
    </div>

</div>
@endsection

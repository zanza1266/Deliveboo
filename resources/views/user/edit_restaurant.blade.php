@extends('layouts.app')

@section('content')
<form-view>

  <section class="background">
    <div class="card-contact">
      <div class="sub-card-contact">

        <form class="" action="{{ route('my-restaurants.update' , $restaurant->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="top">
          <div class="my-4">
              <label for="name">Nome Ristorante:</label><br>
              <input class="form-control
              " autocomplete="off" id="name" type="text" name="name" value="{{$restaurant->name}}">
              @error('name')
                  <p>{{ $message }}</p>
              @enderror
          </div>

          <div class="my-4">
              <label for="address">Indirizzo:</label><br>
              <input class="form-control
              " autocomplete="off" id="address" type="text" name="address" value="{{$restaurant->address}}">
              @error('address')
                  <p>{{ $message }}</p>
              @enderror
          </div>

          <div class="my-4">
              <label for="phone">Numero di Telefono:</label><br>
              <input class="form-control
              " autocomplete="off" id="phone" type="text" name="phone" value="{{$restaurant->phone}}">
              @error('phone')
                  <p>{{ $message }}</p>
              @enderror
          </div>
        </div>

        <div class="logo my-4">
            <label for="logo">Logo:</label><br>
            <input type="file" class="form-control" id="logo" name="logo">
            @error('logo')
            <p>{{ $message }}</p>
            @enderror
        </div>


        <div class="checkbox-item my-4">
            <h4 class="mt-4">Seleziona le categorie del tuo ristorante:</h4>
            <div class="sub-check-items">
              @foreach ($categories as $category)
              <span>
                <label for="{{ 'category_'.$category->name }}">
                    {{ $category->name }}
                    <input id="{{ 'category_'.$category->name }}" type="checkbox" name="categories[]" value="{{ $category->id }}" {{ $restaurant->restaurantToCategory->contains($category) ? 'checked' : '' }}>
                </label>
              </span>
              @endforeach
              @error('categories')
              <p>{{ $message }}</p>
              @enderror
            </div>
        </div>

        <div class="radio">
          <p>Sei aperto?</p>
          <label for="si">S??</label>
          <input id="si" type="radio" name="open" value="1" {{ $restaurant->open == 1 ? 'checked' : '' }}>
          <label for="no">No</label>
          <input id="no" type="radio" name="open" value="0" {{ $restaurant->open == 0 ? 'checked' : '' }}>
        </div>

        <div class="my-4">
            <button type="submit">Modifica</button>
        </div>

        </form>

      </div>
    </div>
  </section>
<form-view>
@endsection

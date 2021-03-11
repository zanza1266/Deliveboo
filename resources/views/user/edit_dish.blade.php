@extends('layouts.app')

@section('content')
<form-view>
  <!-- <div class="d-flex justify-content-center">
    <img src="{{asset($dish->img)}}" alt="">
  </div> -->

  <section class="background">
    <div class="card-contact">
      <div class="sub-card-contact">

        <form class="" action="{{route('my-dishes.update', $dish->id)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="top">
          <div class="my-4">
              <label for="name">Nome Piatto:</label><br>
              <input class="" autocomplete="off" id="name" type="text" name="name" value="{{$dish->name}}">
              @error('name')
                  <p>{{ $message }}</p>
              @enderror
          </div>

          <div class="my-4">
              <label for="ingredients">Ingredienti Piatto:</label><br>
              <input class="" autocomplete="off" id="ingredients" type="text" name="ingredients" value="{{$dish->ingredients}}">
              @error('ingredients')
                  <p>{{ $message }}</p>
              @enderror
          </div>

          <div class="my-4">
              <label for="description">Descrizione Piatto:</label><br>
              <input class="" autocomplete="off" id="description" type="text" name="description" value="{{$dish->description}}">
              @error('description')
                  <p>{{ $message }}</p>
              @enderror
          </div>

          <div class="my-4">
              <label for="price">Prezzo Piatto:</label><br>
              <input class="" autocomplete="off" id="price" type="number" step=".01" name="price" value="{{$dish->price}}">
              @error('price')
                  <p>{{ $message }}</p>
              @enderror
          </div>
        </div>

        <div class="logo my-4">
            <label for="dish_image">Immagine piatto:</label><br>
            <input type="file" class="form-control" id="dish_image" name="dish_image">
            @error('dish_image')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="checkbox-item my-4">
          <h4 class="mt-4">A che menu appartiene?</h4>
          <div class="sub-check-items">
            @foreach($types as $type)
            <span>
              <label for="{{$type->name}}">{{$type->name}}
                  <input id="{{$type->name}}" type="radio" name="type_id" value="{{$type->id}}" {{ $type->id == $dish->type_id ? 'checked' : '' }}>
              </label>
            </span>
            @endforeach
          </div>
        </div>


        <div class="radio">
          <p>Piatto disponibile?</p>
          <label for="si">Sì</label>
          <input id="si" type="radio" name="available" value="1" {{ $dish->available == 1 ? 'checked' : '' }}>
          <label for="no">No</label>
          <input id="no" type="radio" name="available" value="0" {{ $dish->available == 0 ? 'checked' : '' }}>
        </div>

        <div class="my-4">
            <button type="submit">Modifica</button>
        </div>

        </form>

      </div>
    </div>
  </section>
</form-view>
@endsection

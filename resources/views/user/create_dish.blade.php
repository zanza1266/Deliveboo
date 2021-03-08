@extends('layouts.app')

@section('content')
<form-dish-create>
<div class="card-contact">
    <form class="" action="{{route('my-dishes.store', ['id_restaurant' => $restaurant_index])}}" method="post" enctype="multipart/form-data">
    @method('post')
    @csrf

    <div class="my-4">
        <label for="name">Nome Piatto:</label><br>
        <input class="" autocomplete="off" id="name" type="text" name="name" value="{{old('name')}}">
        @error('name')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div class="my-4">
        <label for="ingredients">Ingredienti Piatto:</label><br>
        <input class="" autocomplete="off" id="ingredients" type="text" name="ingredients" value="{{old('ingredients')}}">
        @error('ingredients')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div class="my-4">
        <label for="description">Descrizione Piatto:</label><br>
        <input class="" autocomplete="off" id="description" type="text" name="description" value="{{old('description')}}">
        @error('description')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div class="my-5">
        <label for="price">Prezzo Piatto:</label><br>
        <input class="" autocomplete="off" id="price" type="number" step=".01" name="price" value="{{old('price')}}">
        @error('price')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div class="checkbox-item my-5">
      <h4>A che menu appartiene?</h4>
      @foreach($types as $type)
      <span>
        <label for="{{$type->name}}">{{$type->name}}</label>
        <input id="{{$type->name}}" type="radio" name="type" value="{{$type->id}}">
      </span>
      @endforeach
      @error('type')
      <p>{{ $message }}</p>
      @enderror
    </div>

    <div class="my-5">
        <label for="create_dish_image">Immagine piatto:</label>
        <input type="file" id="create_dish_image" name="create_dish_image">
        @error('create_dish_image')
        <p>{{ $message }}</p>
        @enderror
    </div>

    <div class="radio-available">
      <p>Piatto disponibile?</p>
      <label for="si">Sì</label>
      <input id="si" type="radio" name="available" value="1" checked>
      <label for="no">No</label>
      <input id="no" type="radio" name="available" value="0">
    </div>

    <div class="">
        <button type="submit">Aggiungi</button>
    </div>

    </form>
</div>
</form-dish-create>
@endsection

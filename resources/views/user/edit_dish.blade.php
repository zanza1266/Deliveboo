@extends('layouts.app')

@section('content')

<h3>imagine attuale</h3>

<img src="{{asset($dish->img)}}" alt="">

<div class="">
    <form class="" action="{{route('my-dishes.update', $dish->id)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf

    <div class="">
        <label for="name">Nome Piatto:</label>
        <input class="" autocomplete="off" id="name" type="text" name="name" value="{{$dish->name}}">
        @error('name')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div class="">
        <label for="ingredients">Ingredienti Piatto:</label>
        <input class="" autocomplete="off" id="ingredients" type="text" name="ingredients" value="{{$dish->ingredients}}">
        @error('ingredients')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div class="">
        <label for="description">Descrizione Piatto:</label>
        <input class="" autocomplete="off" id="description" type="text" name="description" value="{{$dish->description}}">
        @error('description')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div class="">
        <label for="price">Prezzo Piatto:</label>
        <input class="" autocomplete="off" id="price" type="number" step=".01" name="price" value="{{$dish->price}}">
        @error('price')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div class="">
      <p>A che menu appartiene?</p>
      @foreach($types as $type)
      <label for="{{$types->name}}">{{$types->name}}</label>
      <input id="{{$types->name}}" type="radio" name="type_id" value="{{$type->id}}" {{ $type->id == $dish->type_id ? 'checked' : '' }}>
      @endforeach
    </div>

    <div class="">
        <label for="dish_image">Immagine piatto:</label>
        <input type="file" id="dish_image" name="dish_image">
        @error('dish_image')
        <p>{{ $message }}</p>
        @enderror
    </div>

    <div class="">
      <p>Piatto disponibile?</p>
      <label for="si">Sì</label>
      <input id="si" type="radio" name="available" value="1" {{ $dish->available == 1 ? 'checked' : '' }}>
      <label for="no">No</label>
      <input id="no" type="radio" name="available" value="0" {{ $dish->available == 0 ? 'checked' : '' }}>
    </div>

    <div class="">
        <button type="submit">Modifica</button>
    </div>

    </form>
</div>
@endsection

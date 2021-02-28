@extends('layouts.app')

@section('content')
<div class="">
    <form class="" action="{{ route('my-dishes.store') }}" method="post" enctype="multipart/form-data">
    @method('post')
    @csrf

    <div class="">
        <label for="name">Nome Piatto:</label>
        <input class="" autocomplete="off" id="name" type="text" name="name" value="{{old('name')}}">
        @error('name')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div class="">
        <label for="ingredients">Ingredienti Piatto:</label>
        <input class="" autocomplete="off" id="ingredients" type="text" name="ingredients" value="{{old('ingredients')}}">
        @error('ingredients')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div class="">
        <label for="description">Descrizione Piatto:</label>
        <input class="" autocomplete="off" id="description" type="text" name="description" value="{{old('description')}}">
        @error('description')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div class="">
        <label for="price">Prezzo Piatto:</label>
        <input class="" autocomplete="off" id="price" type="number" step=".01" name="price" value="{{old('price')}}">
        @error('price')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div class="">
      <p>A che menu appartiene?</p>
      @foreach($types as $type)
      <label for="{{$type->name}}">{{$type->name}}</label>
      <input id="{{$type->name}}" type="radio" name="type" value="{{$type->id}}">
      @endforeach
    </div>

    <div class="">
        <label for="create_dish_image">Logo:</label>
        <input type="file" id="create_dish_image" name="create_dish_image">
        @error('create_dish_image')
        <p>{{ $message }}</p>
        @enderror
    </div>

    <div class="">
        <button type="submit">Aggiungi</button>
    </div>

    </form>
</div>
@endsection

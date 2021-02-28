@extends('layouts.app')

@section('content')

    <h3>logo attuale</h3>

    <img src="{{asset($restaurant->logo)}}" alt="">

    <div class="">
        <form class="" action="{{ route('my-restaurants.update' , $restaurant->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="">
            <label for="name">Nome Ristorante:</label>
            <input class="" autocomplete="off" id="name" type="text" name="name" value="{{$restaurant->name}}">
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="">
            <label for="address">Indirizzo:</label>
            <input class="" autocomplete="off" id="address" type="text" name="address" value="{{$restaurant->address}}">
            @error('address')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="">
            <label for="phone">Numero di Telefono:</label>
            <input class="" autocomplete="off" id="phone" type="text" name="phone" value="{{$restaurant->phone}}">
            @error('phone')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="">
            <label for="logo">Logo:</label>
            <input type="file" id="logo" name="logo">
            @error('logo')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="">
          <p>Sei in ferie?</p>
          <label for="si">Sì</label>
          <input id="si" type="radio" name="open" value="1" {{ $restaurant->open == 1 ? 'checked' : '' }}>
          <label for="no">No</label>
          <input id="no" type="radio" name="open" value="0" {{ $restaurant->open == 0 ? 'checked' : '' }}>
        </div>

        <div class="">
            @foreach ($categories as $category)
                <input id="{{ 'category_'.$category->name }}" type="checkbox" name="categories[]" value="{{ $category->id }}" {{ $restaurant->restaurantToCategory->contains($category) ? 'checked' : '' }}>
                <label for="{{ 'category_'.$category->name }}">{{ $category->name }}</label>
            @endforeach
        </div>

        <div class="">
            <button type="submit">Modifica</button>
        </div>

        </form>
    </div>

@endsection

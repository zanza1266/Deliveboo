@extends('layouts.app')

@section('content')
    
    <div class="">
        <form class="" action="{{ route('my-restaurants.store') }}" method="post" enctype="multipart/form-data">
        @method('post')
        @csrf

        <div class="">
            <label for="name">Nome Ristorante:</label>
            <input class="" autocomplete="off" id="name" type="text" name="name" value="{{old('name')}}">
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="">
            <label for="address">Indirizzo:</label>
            <input class="" autocomplete="off" id="address" type="text" name="address" value="{{old('address')}}">
            @error('address')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="">
            <label for="phone">Numero di Telefono:</label>
            <input class="" autocomplete="off" id="phone" type="text" name="phone" value="{{old('phone')}}">
            @error('phone')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="">
            <label for="create_logo">Logo:</label>
            <input type="file" id="create_logo" name="create_logo">
            @error('create_logo')
            <p>{{ $message }}</p>
            @enderror
        </div>



        <div class="">
            @foreach ($categories as $category)
                <input id="{{ 'category_'.$category->name }}" type="checkbox" name="categories[]" value="{{ $category->id }}">
                <label for="{{ 'category_'.$category->name }}">{{ $category->name }}</label>
            @endforeach

            @error('categories')
            <p>{{ $message }}</p>
            @enderror
        </div>
        




        <div class="">
            <button type="submit">Aggiungi</button>
        </div>

        </form>
    </div>

@endsection
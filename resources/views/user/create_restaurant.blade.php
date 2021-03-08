@extends('layouts.app')

@section('content')
<form-view>
    <div class="card-contact">
        <form class="" action="{{ route('my-restaurants.store') }}" method="post" enctype="multipart/form-data">
        @method('post')
        @csrf

        <div class="my-4">
            <label for="name">Nome Ristorante</label><br>
            <input class="form-control" autocomplete="off" id="name" type="text" name="name" value="{{old('name')}}" placeholder="Inserisci il nome">
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="my-4">
            <label for="address">Indirizzo</label><br>
            <input class="form-control" autocomplete="off" id="address" type="text" name="address" value="{{old('address')}}" placeholder="Inserisci l'indirizzo">
            @error('address')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="my-4">
            <label for="phone">Numero di Telefono</label><br>
            <input class="form-control" autocomplete="off" id="phone" type="text" name="phone" value="{{old('phone')}}" placeholder="Inserisci il numero di telefono">
            @error('phone')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="my-5">
            <label for="create_logo">Logo:</label>
            <input type="file" id="create_logo" name="create_logo">
            @error('create_logo')
            <p>{{ $message }}</p>
            @enderror
        </div>
        
        <div class="checkbox-item my-5">
            <h4 class="mt-4">Seleziona la categoria del tuo ristorante:</h4>
            @foreach ($categories as $category)
            <span>
                <label for="{{ 'category_'.$category->name }}">{{ $category->name }}
                    <input id="{{ 'category_'.$category->name }}" type="checkbox" name="categories[]" value="{{ $category->id }}">
                </label>

            </span>
            @endforeach

            @error('categories')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="radio">
          <p>Sei aperto?</p>
          <label for="si">Sì</label>
          <input id="si" type="radio" name="open" value="1" checked>
          <label for="no">No</label>
          <input id="no" type="radio" name="open" value="0">
        </div>

        <div class="my-4">
            <button type="submit">Aggiungi</button>
        </div>

        </form>
    </div>
</form-view>
@endsection

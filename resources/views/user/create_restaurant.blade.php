@extends('layouts.app')

@section('content')
<form-view>
    <section class="background">
      <div class="card-contact">
          <div class="sub-card-contact">

            <form class="" action="{{ route('my-restaurants.store') }}" method="post" enctype="multipart/form-data">
            @method('post')
            @csrf

            <div class="top">
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
            </div>

            <div class="logo my-4">
                <label for="create_logo">Logo:</label><br>
                <input type="file" class="form-control" id="create_logo" name="create_logo">
                @error('create_logo')
                <p>{{ $message }}</p>
                @enderror
            </div>

            <div class="checkbox-item my-4">
                <h4 class="mt-4">Seleziona le categorie del tuo ristorante:</h4>
                <div class="sub-check-items">
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
      </div>
    </section>
</form-view>
@endsection

@extends('layouts.app')

@section('content')

    <div>
        <div class="container">
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <h1>Riepilogo ordine</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-6 d-flex justify-content-center">

                    <div class="checkout">
                        @foreach ($cart as $item)

                            <div>
                                <h3>
                                    {{$item->name}}
                                </h3>

                                <p>
                                    Prezzo unitario: {{$item->price}} euro
                                </p>

                                <p>
                                    Quantità: {{$item->quantity}}
                                </p>


                            </div>
                            
                        @endforeach
                    </div>

                </div>

                <div class="col-6">
                    <p>Prezzo totale ordine: {{$total}} euro</p>

                    <form action="{{route('my-dishes.store', ['' => ])}}" method="post">
                        @method('post')
                        @csrf

                        <div class="form-group">
                            <label for="name">Nome:</label>
                            <input class="" autocomplete="off" id="name" type="text" name="name" value="{{old('name')}}">
                            @error('name')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="surname">Cognome:</label>
                            <input class="" autocomplete="off" id="surname" type="text" name="surname" value="{{old('surname')}}">
                            @error('surname')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="phone">Telefono:</label>
                            <input class="" autocomplete="off" id="phone" type="text" name="phone" value="{{old('phone')}}">
                            @error('phone')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="address">Indirizzo:</label>
                            <input class="" autocomplete="off" id="address" type="text" name="address" value="{{old('address')}}">
                            @error('address')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="information">Informazioni aggiuntive:</label>
                            <textarea class="form-control" autocomplete="off" id="information" rows="3" type="text" name="information" value="{{old('information')}}"></textarea>
                            @error('information')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="label-control">Datetime Picker</label>
                            <input type="text" class="form-control datetimepicker" value="10/05/2016">
                        </div>


                        <div class="">
                            <button type="submit">Aggiungi</button>
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
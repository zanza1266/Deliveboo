
@extends('layouts.app')


@section('datetime-scripts')

@endsection

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
                        <p>Prezzo totale ordine: {{$total}} euro</p>
                    </div>

                </div>

                <div class="col-6">

                    <form id="payment-form" action="{{route('checkout')}}" method="post">
                        @method('POST')
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
                            <label for="phone">Email:</label>
                            <input class="" autocomplete="off" id="email" type="text" name="email" value="{{old('email')}}">
                            @error('email')
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


                        {{-- braintree --}}

                        <div class="form-group">
                            <div id="dropin-container"></div>
                            <input type="hidden" id="nonce" name="payment_method_nonce"/>
                            <button type="submit" name="button">Conferma Ordine</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')

<script src="https://js.braintreegateway.com/web/dropin/1.26.1/js/dropin.min.js"></script>

<script type="text/javascript">

    var form = document.getElementById('payment-form');

    braintree.dropin.create({

        container: document.getElementById('dropin-container'),
        authorization: "{{$token}}",
        container: '#dropin-container'

    }, function (error, instance) {

        if (error) console.error(error);

        form.addEventListener('submit', function (event) {

            event.preventDefault();

            instance.requestPaymentMethod(function (error, payload) {

                if (error) console.error(error);

                document.getElementById('nonce').value = payload.nonce;

            });
        });
    });

</script>

@endsection

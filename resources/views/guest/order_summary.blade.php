
@extends('layouts.app')



@section('content')


    <section class="summary">

        <div class="container">

            <div class="row pt-4 pb-4">
                <div class="col d-flex justify-content-center head">
                    <h1>Riepilogo ordine</h1>
                </div>
            </div>

            <div class="row pt-4">
                <div class="col-12 col-lg-6 cart-summary d-flex flex-column align-items-center">


                    <div class="cart-items">

                        <h2 class="head">Il tuo ordine da {{$restaurant->name}}:</h2>

                        @foreach ($cart as $item)

                            <div class="d-flex align-items-center cart-item">

                                <div>
                                    <img src="{{asset($item->img)}}" alt="">
                                </div>

                                <div class="info-item">
                                    <h5 class="ciao">{{$item->name}}</h5>
                                    <p>Prezzo: {{$item->price}} &euro;</p>
                                    <small>Quantità: x{{$item->quantity}}</small>
                                </div>

                            </div>

                        @endforeach

                        <p class="total">Prezzo totale ordine: 
                            <span>{{$total}} &euro;</span>
                        </p>

                    </div>

                </div>

                <div class="col-12 col-lg-6 payment-form">

                    <form id="payment-form" action="{{route('checkout')}}" method="post" class="pr-5">
                        @method('POST')
                        @csrf

                        <div class="form-group">
                            <label for="name">Nome:</label>
                            <input class="form-control" autocomplete="off" id="name" type="text" name="name" value="{{old('name')}}">
                            @error('name')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="surname">Cognome:</label>
                            <input class="form-control" autocomplete="off" id="surname" type="text" name="surname" value="{{old('surname')}}">
                            @error('surname')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address">Indirizzo:</label>
                            <input class="form-control" autocomplete="off" id="address" type="text" name="address" value="{{old('address')}}">
                            @error('address')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Telefono:</label>
                            <input class="form-control" autocomplete="off" id="phone" type="text" name="phone" value="{{old('phone')}}">
                            @error('phone')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Email:</label>
                            <input class="form-control" autocomplete="off" id="email" type="text" name="email" value="{{old('email')}}">
                            @error('email')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="information">Informazioni aggiuntive:</label>
                            <textarea class="form-control" autocomplete="off" id="information" rows="3" type="text" name="information" value="{{old('information')}}" placeholder="comunicaci eventuali intolleranze o preferenze riguardo i piatti ordinati!"></textarea>
                            @error('information')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- braintree --}}

                        <div class="form-group">
                            <div id="dropin-container"></div>
                            <input type="hidden" id="nonce" name="payment_method_nonce"/>
                            <button @click='clearSessionCart' class="confirm" type="submit" name="button" onclick="var el = document.getElementById('my-loader'); el.classList.add('activate');" >Conferma Ordine</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- LOADING COMPONENT --}}

    <div class="loader-container" id="my-loader">
        <b-spinner variant="primary" type="grow" label="Spinning"></b-spinner>
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

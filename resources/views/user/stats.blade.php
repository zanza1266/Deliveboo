<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/stats_style.css') }}" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
</head>
<body>

    <div id="app">

        <section-navbar-white>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto d-flex flex-row ">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </section-navbar-white>

    </div>

    <section class="stats">
        <div class="container">
            <div class="row pt-5">
                <div class="col">
                    <h3>Numero totale di ordini per anno:</h3>
                </div>
            </div>
            @foreach ($orders_for_years as $orders_for_year)
                <div class="row graph">

                    <div class="col">
                        <h1>{{$orders_for_year[13]}}</h1>
                        <h5>Totale degli ordini: {{$orders_for_year[12]}}</h5>

                        <div class="" style="width: 800px; height: 400px;">
                            <canvas id="myChart{{$orders_for_year[13]}}"></canvas>
                        </div>
                    </div>

                </div>
            @endforeach

            <div class="row dishes-data">
                <div class="col">

                    <h3>Numero totale di ordini per singolo piatto:</h3>
                    <ul class="">
                        @foreach ($orderPerDishData as $dish)
                            <li>
                                <span class="name">{{$dish['name']}}: </span>
                                <span class="times">{{$dish['timesOrdered']}}</span>
                            </li>

                        @endforeach
                    </ul>

                </div>
            </div>

        </div>
    </section>



    @foreach ($orders_for_years as $orders_for_year)

        <?php
        $clean_orders_for_year = [];
        for ($i = 0; $i < 12 ; $i++) {
            array_push($clean_orders_for_year, $orders_for_year[$i]);
        }
        $json = json_encode($clean_orders_for_year);
        ?>

        <script>
            var ctx = document.getElementById('myChart{{$orders_for_year[13]}}');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['gennaio', 'febbraio', 'marzo', 'aprile', 'maggio', 'giugno', 'luglio', 'agosto', 'settembre', 'ottobre', 'novembre', 'dicembre'],
                    datasets: [{
                        label: 'numero di ordini',
                        data: JSON.parse('{{$json}}'),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>

    @endforeach

</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        />


    </head>
    <body>
        <div id="app">
            <div id="loader" class="center"></div>

            <section-navbar>
                <div class="navbar-nav">
                
                <ul class="hamburger-menu"  >
                    <li class="nav-item" onclick="dropDown()" >
                        <span href="/order-summary" class="d-flex align-items-center nav-link cart-button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                        </span>
                    </li>
                </ul>
                <div class="dropdown-burger " id="menu-burger-dropdwon" style="right:1rem">
                    {{-- <li class="nav-item mt-3">
                        <a href="/order-summary" class="d-flex nav-link cart-button">
                            <p class="mb-0 mr-3">{{$total}}€</p>
                            <svg class="mb-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket-fill" viewBox="0 0 16 16">
                                <path d="M5.071 1.243a.5.5 0 0 1 .858.514L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 6h1.717L5.07 1.243zM3.5 10.5a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3z"/>
                            </svg> 
                        </a>
                    </li> --}}
                    @guest
                        <li class="nav-item mt-3">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Accedi') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item mt-3">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle mt-3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a> --}}
    
                            <div class="" aria-labelledby="navbarDropdown">
    
                                <a class="dropdown-item my-2 " href="{{ route('home') }}">
                                    {{ __('Home') }}
                                </a>
    
                                <a class="dropdown-item my-2" href="{{ route('my-restaurants.index') }}">
                                    {{ __('I tuoi ristoranti') }}
                                </a>
    
    
                                @if(Route::is('my-restaurants.show'))
                                    <a class="dropdown-item my-2" href="{{route('my-dishes.index', ['id_restaurant' => $restaurant->id])}}">
                                        {{ __('I tuoi piatti') }}
                                    </a>
                                @endif
    
                                @if(Route::is('my-dishes.create') || Route::is('my-dishes.show') || Route::is('my-dishes.edit'))
                                    <a class="dropdown-item my-2" href="{{route('my-dishes.index', ['id_restaurant' => $restaurant_index])}}">
                                        {{ __('I tuoi piatti') }}
                                    </a>
                                @endif
    
                                <a class="dropdown-item my-3" href="{{ route('logout') }}"
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
                </div>
            </div>

                <ul class="navbar-nav ml-auto navbar_visible ">
                <!-- Authentication Links -->
                {{-- <li class="nav-item">
                    <a href="/order-summary" class="d-flex  nav-link cart-button">
                        <p class="mb-0 mr-3">{{$total}}€</p>
                        <svg class="mb-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket-fill" viewBox="0 0 16 16">
                            <path d="M5.071 1.243a.5.5 0 0 1 .858.514L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 6h1.717L5.07 1.243zM3.5 10.5a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3z"/>
                        </svg> 
                    </a>
                </li> --}}
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Accedi') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item my-2" href="{{ route('home') }}">
                                {{ __('Home') }}
                            </a>

                            <a class="dropdown-item my-2" href="{{ route('my-restaurants.index') }}">
                                {{ __('I tuoi ristoranti') }}
                            </a>


                            @if(Route::is('my-restaurants.show'))
                                <a class="dropdown-item my-2" href="{{route('my-dishes.index', ['id_restaurant' => $restaurant->id])}}">
                                    {{ __('I tuoi piatti') }}
                                </a>
                            @endif

                            @if(Route::is('my-dishes.create') || Route::is('my-dishes.show') || Route::is('my-dishes.edit'))
                                <a class="dropdown-item my-2" href="{{route('my-dishes.index', ['id_restaurant' => $restaurant_index])}}">
                                    {{ __('I tuoi piatti') }}
                                </a>
                            @endif

                            <a class="dropdown-item my-2" href="{{ route('logout') }}"
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
            </section-navbar>
            <jumbotron></jumbotron>

            <div class="category-cards">

                <card-list  categories= {{json_encode($categories)}}></card-list>

            </div>
            <section-footer></section-footer>
            
            
        </div>
        <script>
            function dropDown(){
                document.getElementById("menu-burger-dropdwon").classList.toggle("active");
                document.getElementById("menu-burger-dropdwon").classList.toggle("animate__animated");
                document.getElementById("menu-burger-dropdwon").classList.toggle("animate__slideInRight");
            }
            document.onreadystatechange = function() { 
                if (document.readyState !== "complete") { 
                    document.querySelector("body").style.visibility = "hidden"; 
                    document.querySelector("#loader").style.visibility = "visible"; 
                } else { 
                    document.querySelector("#loader").style.display = "none"; 
                    document.querySelector("body").style.visibility = "visible"; 
                } 
            };
        </script>
    </body>
</html>

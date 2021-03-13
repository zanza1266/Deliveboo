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

                <div class="flex-center position-ref full-height">
                    @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                                <a href="{{ url('/home') }}">Home</a>
                            @else
                                <a href="{{ route('login') }}">Login</a>
        
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </section-navbar>
            <jumbotron></jumbotron>

            <div class="category-cards">

                <card-list  categories= {{json_encode($categories)}}></card-list>

            </div>
            <section-footer></section-footer>
            
            
        </div>
        <script>
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

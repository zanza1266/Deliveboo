@extends('layouts.app')

@section('content')
<section-welcome>
    <div class="container">   
        <div class="row">
            <div class="col">
                <a class="list-restaurant animate__animated animate__zoomIn animate__delay-1s " href="{{route('my-restaurants.index')}}">Vai ai tuoi ristoranti</a>
            </div>
        </div>
    </div>

</section-welcome>
@endsection

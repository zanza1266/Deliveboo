@extends('layouts.app')

@section('content')
    <div class="container-fluid center-space  ">
        <div class="row ">
            <div class="col-9 ml-4 my-5">
                <span class="d-flex align-items-center details-restaurant">
                    <div class="square-logo">
                        <img src="{{asset($restaurant->logo)}}" alt="logo" >
                    </div>
                    <div class="d-flex flex-column mt-3 ml-3 ">
                        <h1 style="text-transform:capitalize">
                            {{$restaurant->name}}
                        </h1>
    
                        <div class="d-flex align-items-baseline mt-1 ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                            </svg>
                            <span>{{$restaurant->address}}</span>
        
                        </div>
                        <div class="d-flex align-items-baseline">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
                                <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
                                <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                            </svg>
                            <span>{{$restaurant->phone}}</span>
                        </div>

                    </div>
                </span>
                
            </div>
        </div>

        <div class="row">
            <div class="col">

                <dishes-cart dishes_json='{!!json_encode($dishes)!!}' restaurant_json='{!!json_encode($restaurant)!!}' types_json='{!!json_encode($types)!!}'></dishes-cart>

            </div>
        </div>


    </div>
@endsection

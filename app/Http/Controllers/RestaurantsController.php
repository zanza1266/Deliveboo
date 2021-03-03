<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Resources\RestaurantsResource;
use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantsController extends Controller
{

    // public function index(Request $request)
    // {

    //     $category = Category::find($request->all()['category']);
    //     $restaurants = $category->categoryToRestaurant;

    //   return view('guest.restaurants', compact('restaurants'));
    // }



    public function show(Restaurant $restaurant)
    {

      $dishes = $restaurant->restaurantToDish;

      return view('guest.restaurant', compact('restaurant', 'dishes'));
    }



    // RISORSE API

    public function restaurantsAPI($id) {

      $category = Category::find($id);
      $restaurants = $category->categoryToRestaurant;

      return RestaurantsResource::collection($restaurants);
    }
}

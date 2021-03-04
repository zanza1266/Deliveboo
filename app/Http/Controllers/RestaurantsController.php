<?php

namespace App\Http\Controllers;

use App\Category;
use App\Restaurant;
use App\Http\Resources\RestaurantsResource;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

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



    public function restaurantsFiltered(Request $request) {

      $resp = $request->all()['categories'];
      $arrCategories = explode(",", $resp);

      $restaurants = Restaurant::all();

      $output = [];

      foreach ($restaurants as $restaurant) {

        $restCateg = [];
        $categories = $restaurant->restaurantToCategory;


        foreach($categories as $category) {

          array_push($restCateg, $category->id);
        }

        // dd(array_diff($arrCategories, $restCateg));

        if (array_diff($arrCategories, $restCateg) === []) {

          array_push($output, $restaurant);
        }
      }

      $collection = collect($output);


      return RestaurantsResource::collection($collection);
    }
}

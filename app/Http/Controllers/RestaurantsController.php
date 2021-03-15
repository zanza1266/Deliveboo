<?php

namespace App\Http\Controllers;

use App\Category;
use App\Restaurant;
use App\Http\Resources\RestaurantsResource;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class RestaurantsController extends Controller
{

    public function show(Restaurant $restaurant)
    {

      $dishes = $restaurant->restaurantToDish->where("available", "=", 1);
      $types = Type::all();

      return view('guest.restaurant', compact('restaurant', 'dishes', 'types'));
    }



    // RISORSE API

    public function restaurantsAPI($id) {

      $category = Category::find($id);
      $restaurants = $category->categoryToRestaurant->where("open", "=", 1);

      return RestaurantsResource::collection($restaurants);
    }



    public function restaurantsFiltered(Request $request) {

      $resp = $request->all()['categories'];
      $arrCategories = explode(",", $resp);

      $restaurants = Restaurant::where("open", "=", 1)->get();

      // dd($restaurants);

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

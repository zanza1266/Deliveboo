<?php

namespace App\Http\Controllers;

use App\Category;
use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantsController extends Controller
{

    public function index(Request $request)
    {

        $category = Category::find($request->all()['category']);
        $restaurants = $category->categoryToRestaurant;
        User::find(1)->roles;
      return view('guest.restaurants', compact('restaurants'));
    }



    public function show($id)
    {


      return response()->json(['restaurants'=>$restaurants]);
    }
}

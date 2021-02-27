<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Category;
use Illuminate\Support\Facades\Auth;


class MyRestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::where('user_id', '=', Auth::id())->get();

        return view('user.my_restaurants', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();

        return view('user.create_restaurant', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $data = $request->all();

        $newRestaurant = new Restaurant();
        $newRestaurant->name = $data['name'];
        $newRestaurant->address = $data['address'];
        $newRestaurant->phone = $data['phone'];
        //   aggiunta logo da implementare
        $newRestaurant->user_id = Auth::id();

        $newRestaurant->save();
        $newRestaurant->restaurantToCategory()->attach($data['categories']);

      return redirect()->route('my-restaurants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurant = Restaurant::find($id);

        return view('user.my_restaurant', compact('restaurant'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $categories = Category::all();
        $restaurant = Restaurant::find($id);
        return view('user.edit_restaurant', compact('restaurant','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $editRestaurant =  Restaurant::find($id);
        $editRestaurant->name = $data['name'];
        $editRestaurant->address = $data['address'];
        $editRestaurant->phone = $data['phone'];
        //   aggiunta logo da implementare
        $editRestaurant->user_id = Auth::id();

        $editRestaurant->save();
        $editRestaurant->restaurantToCategory()->sync($data["categories"]);

      return redirect()->route('my-restaurants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $restaurant = Restaurant::find($id);
        $restaurant->restaurantToCategory()->detach();
        $restaurant->delete();

        return redirect()->route('my-restaurants.index');

    }
}

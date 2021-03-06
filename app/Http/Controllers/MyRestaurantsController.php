<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Dish;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RestaurantFormRequest;
use App\Restaurant;

use App\Http\Requests\UpdateRestaurantFormRequest;
use App\Order;
use App\OrderedDish;
use Illuminate\Support\Facades\Storage;

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
    public function store(RestaurantFormRequest $request)
    {

        $validated = $request->validated();

        $newRestaurant = new Restaurant();
        $newRestaurant->name = $validated['name'];
        $newRestaurant->address = $validated['address'];
        $newRestaurant->phone = $validated['phone'];
        $newRestaurant->open = $validated['open'];

        $newRestaurant->logo = $request->file('create_logo')->storePublicly('logos');
        $newRestaurant->user_id = Auth::id();

        $newRestaurant->save();
        $newRestaurant->restaurantToCategory()->attach($validated['categories']);

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
    public function update(UpdateRestaurantFormRequest $request, $id)
    {
      $editRestaurant = Restaurant::find($id);
      $validated = $request->validated();
      $editRestaurant->update($validated);
      $editRestaurant->restaurantToCategory()->sync($validated["categories"]);

      if(array_key_exists('logo', $validated)) {
        Storage::delete($editRestaurant->logo);
        $editRestaurant->logo = $request->file('logo')->storePublicly('logos');
        $editRestaurant->save();
      }

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


        $dishes = Dish::where('restaurant_id', '=', $restaurant->id)->get();

        foreach ($dishes as $dish) {

            $orderedDishes = OrderedDish::where('dish_id', '=', $dish->id)->get();

            foreach ($orderedDishes as $orderedDish) {


                $orderedDish->delete();
            }
        }

        $orders = Order::where('restaurant_id', '=', $restaurant->id)->get();

        foreach ($orders as $order) {

            $order->delete();
        }

        foreach ($dishes as $dish) {

            Storage::delete($dish->img);
            $dish->delete();
        }

        Storage::delete($restaurant->logo);
        $restaurant->restaurantToCategory()->detach();
        $restaurant->delete();

        return redirect()->route('my-restaurants.index');
    }
}

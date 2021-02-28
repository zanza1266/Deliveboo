<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RestaurantFormRequest;

use App\Http\Requests\UpdateRestaurantFormRequest;
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
        // dd($request);


        $validated = $request->validated();


        // $data = $request->all();

        $newRestaurant = new Restaurant();
        $newRestaurant->name = $validated['name'];
        $newRestaurant->address = $validated['address'];
        $newRestaurant->phone = $validated['phone'];

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

        // dd($request);
        $validated = $request->validated();

        $editRestaurant =  Restaurant::find($id);
        $editRestaurant->name = $validated['name'];
        $editRestaurant->address = $validated['address'];
        $editRestaurant->phone = $validated['phone'];


        $editLogo = $request->file('logo');

        if($editLogo !== null) {

            Storage::delete($editRestaurant->logo);

            $editRestaurant->logo = $request->file('logo')->storePublicly('logos');
        }

        $editRestaurant->user_id = Auth::id();

        $editRestaurant->save();
        $editRestaurant->restaurantToCategory()->sync($validated["categories"]);

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
        Storage::delete($restaurant->logo);
        $restaurant->restaurantToCategory()->detach();
        $restaurant->delete();

        return redirect()->route('my-restaurants.index');

    }
}

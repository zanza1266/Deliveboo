<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Restaurant;
use App\Type;
use Illuminate\Http\Request;

class MyDishesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      $restaurant_index = $request->all()['id_restaurant'];
      $dishes = Dish::where('restaurant_id', '=', $restaurant_index)->get();

      return view('user.my_dishes', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $types = Type::all();

      return view('user.create_dish', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $restaurant = Restaurant::where('id', '=', );
      dd($restaurant);
      $data = $request->all();
      dd($data);

      $newDish = new Dish();
      $newDish->name = $data['name'];
      $newDish->ingredients = $data['ingredients'];
      $newDish->description = $data['description'];
      $newDish->price = $data['price'];
      $newDish->type_id = $data['type'];
      // $newDish->restaurant_id = ;


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $dish = Dish::find($id);

      return view('user.my_dish', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Restaurant;
use App\Type;
use Illuminate\Http\Request;
use App\Http\Requests\DishesFormRequest;
use App\Http\Requests\UpdateDishesFormRequest;
use Illuminate\Support\Facades\Storage;


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

      return view('user.my_dishes', compact('dishes', 'restaurant_index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $restaurant_index = $request->all()['id_restaurant'];

      $types = Type::all();

      return view('user.create_dish', compact('types', 'restaurant_index'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DishesFormRequest $request)
    {
      $data = $request->all();
      $validated = $request->validated();

      $newDish = new Dish();

      $newDish->name = $validated['name'];
      $newDish->ingredients = $validated['ingredients'];
      $newDish->description = $validated['description'];
      $newDish->price = $validated['price'];
      $newDish->type_id = $validated['type'];

      $newDish->img = $request->file('create_dish_image')->storePublicly('dish_images');

      $newDish->restaurant_id = $data['id_restaurant'];
      $newDish->save();

      return redirect()->route('my-dishes.index', ['id_restaurant' => $data['id_restaurant']]);
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
      $types = Type::all();
      $dish = Dish::find($id);
      return view('user.edit_dish', compact('dish','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDishesFormRequest $request, $id)
    {
      $editDish = Dish::find($id);
      $validated = $request->validated();
      $editDish->update($validated);

      if(array_key_exists('dish_image', $validated)) {
        Storage::delete($editDish->img);
        $editDish->img = $request->file('dish_image')->storePublicly('dish_images');
        $editDish->save();
      }

      return redirect()->route('my-dishes.index', ['id_restaurant' => $editDish->restaurant_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $dish = Dish::find($id);
      Storage::delete($dish->img);
      $dish->delete();

      return redirect()->route('my-dishes.index', ['id_restaurant' => $dish->restaurant_id]);
    }
}

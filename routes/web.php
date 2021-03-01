<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Restaurant;
use App\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $restaurants = Restaurant::all();
    $restaurants = $restaurants->toJson();
    $categories = Category::all();

    return view('welcome', compact('restaurants', 'categories'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/my-restaurants', 'MyRestaurantsController')->middleware('auth');

Route::resource('/my-dishes', 'MyDishesController')->middleware('auth');

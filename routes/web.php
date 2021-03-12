<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Restaurant;
use App\Category;
use App\Order;
use App\OrderedDish;
use App\Http\Requests\OrderFormRequest;
use App\Mail\OrderReceived;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

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
    $categories = Category::all();

    return view('welcome', compact('restaurants', 'categories'));
});

Route::get('/restaurant/{restaurant}', 'RestaurantsController@show')->name('restaurants.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/my-restaurants', 'MyRestaurantsController')->middleware('auth');

Route::resource('/my-dishes', 'MyDishesController')->middleware('auth');

Route::post('/send-cart-data', function(Request $request) {

    $cart = json_decode($request->cart);
    $request->session()->put('cart', $cart);
    $restaurant = $cart[0]->restaurant_id;
    $request->session()->put('restaurant_id', $restaurant);

});

Route::get('order-summary', function (Request $request) {

    $gateway = new Braintree\Gateway([
        'environment' => 'sandbox',
        'merchantId' => '78rb6wd4qwjzhq8j',
        'publicKey' => 'qpyf7g338z7k862m',
        'privateKey' => 'd9a03f66933afa31343acd753c302269'
    ]);

    $token = $gateway->ClientToken()->generate();

    $cart = $request->session()->get('cart');

    $total = 0;

    $restaurant= Restaurant::find($request->session()->get('restaurant_id'));

    foreach ($cart as $item) {

        $subTotal = $item->price * $item->quantity;
        $total += $subTotal;
    }

    $request->session()->put('total', $total);

    return view('guest.order_summary', compact('cart', 'total', 'token', 'restaurant'));

})->name('summary');;

Route::post('/checkout', function(OrderFormRequest $request) {

    $validated = $request->validated();

    $totalDishes = 0;
    foreach($request->session()->get('cart') as $el) {

        $totalDishes += $el->quantity;
    }


    $gateway = new Braintree\Gateway([
        'environment' => 'sandbox',
        'merchantId' => '78rb6wd4qwjzhq8j',
        'publicKey' => 'qpyf7g338z7k862m',
        'privateKey' => 'd9a03f66933afa31343acd753c302269'
    ]);


    $result = $gateway->transaction()->sale([
        'amount' => $request->session()->get('total'),
        'paymentMethodNonce' => 'fake-valid-nonce',
        'options' => [
        'submitForSettlement' => True
        ]
    ]);


    if ($result->success) {

        $transactionId = $result->transaction;

        $newOrder = new Order;
        $newOrder->name = $validated['name'];
        $newOrder->surname = $validated['surname'];
        $newOrder->address = $validated['address'];
        $newOrder->phone = $validated['phone'];
        $newOrder->email = $validated['email'];
        $newOrder->information = $validated['information'];
        $newOrder->total_price = $request->session()->get('total');
        $newOrder->total_dishes = $totalDishes;
        $newOrder->date_order = Carbon::now()->format('Y-m-d h:i:s');
        $newOrder->payment = 1;
        $newOrder->restaurant_id = $request->session()->get('cart')[0]->restaurant_id;
        $newOrder->save();

        Mail::to($newOrder->email)->send(new OrderReceived());

        foreach($request->session()->get('cart') as $element) {

            $newOrderedDish = new OrderedDish;
            $newOrderedDish->unitary_price = $element->price;
            $newOrderedDish->dish_quantity = $element->quantity;
            $newOrderedDish->order_id = $newOrder->id;
            $newOrderedDish->dish_id = $element->id;
            $newOrderedDish->save();
        }

        return view('guest.transaction_success', compact('transactionId'));
    }

})->name('checkout');

Route::get('/stats/{restaurant}', function (Restaurant $restaurant, Request $request) {
    $years = [];
    foreach ($restaurant->restaurantToOrder as $order) {
      $date = $order->date_order;
      $year = substr($date, 0, 4);
      if (count($years) == 0) {
        array_push($years, $year);
      } elseif (!in_array($year, $years)) {
        array_push($years, $year);
      }
    }

    $years = [];
    foreach ($restaurant->restaurantToOrder as $order) {
      $date = $order->date_order;
      $year = substr($date, 0, 4);
      if (!in_array($year, $years)) {
        array_push($years, $year);
      }
    }

    $months = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
    $months_names = ['gennaio', 'febbraio', 'marzo', 'aprile', 'maggio', 'giugno', 'luglio', 'agosto', 'settembre', 'ottobre', 'novembre', 'dicembre'];
    $orders_for_years = [];

    foreach ($years as $year) {
      $i = 0;
      $count = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''];
      foreach ($restaurant->restaurantToOrder as $order) {
        $date = $order->date_order;
        $order_year = substr($date, 0, 4);
        if ($order_year == $year) {
          $count[12] += 1;
          $count[13] = $year;
        }
      }
      foreach ($months as $month) {
        $i += 1;
        foreach ($restaurant->restaurantToOrder as $order) {
          $date = $order->date_order;
          $order_year = substr($date, 0, 4);
          $order_month = substr($date, 5, 2);
          if (($order_year == $year) && ($order_month == $month)) {
            $count[$i - 1] += 1;
          }
        }
      }
      array_push($count, $months_names);
      array_push($orders_for_years, $count);
    }

    $allDishes = $restaurant->restaurantToDish;
    $orderPerDishData = [];

    foreach ($allDishes as $dish) {

        $allOrdered = $dish->dishToOrderedDish;
        $totalOrdered = 0;

        foreach ($allOrdered as $el) {

            $totalOrdered += $el->dish_quantity;
        }

        array_push($orderPerDishData, ['name' => $dish->name, 'timesOrdered' => $totalOrdered]);

    }


    return view('user.stats', compact('orders_for_years', 'years', 'orderPerDishData'));

})->middleware('auth')->name('stats');
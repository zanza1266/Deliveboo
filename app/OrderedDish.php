<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderedDish extends Model
{
    protected $table = 'ordered_dishes';

    public function orderedDishToDish () {

        return $this->belongsTo('App\Dish', 'dish_id', 'id');

    }

    public function orderedDishToOrder () {

        return $this->belongsTo('App\Order', 'order_id', 'id');

    }
}

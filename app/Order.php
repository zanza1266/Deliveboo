<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public function orderToOrderedDish () {

        return $this->hasMany('App\OrderedDish', 'order_id', 'id');

    }
}

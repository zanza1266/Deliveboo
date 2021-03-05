<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $table = 'dishes';

    public function dishToOrderedDish () {

        return $this->hasMany('App\OrderedDish', 'dish_id', 'id');

    }

    public function dishToType () {

        return $this->belongsTo('App\Type', 'type_id', 'id');

    }

    public function dishToRestaurant () {

        return $this->belongsTo('App\Restaurant', 'restaurant_id', 'id');

    }

    protected $fillable = [
        'name', 'ingredients', 'description', 'price', 'type_id', 'available'
    ];
}

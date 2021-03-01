<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $table = 'restaurants';

    public function restaurantToUser () {

        return $this->belongsTo('App\User', 'user_id', 'id');

    }

    public function restaurantToCategory () {

        return $this->belongsToMany('App\Category', 'restaurants_to_categories', 'restaurant_id', 'category_id');

    }


    public function restaurantToSchedule () {

        return $this->hasMany('App\Schedule', 'restaurant_id', 'id');

    }


    public function restaurantToDish () {

        return $this->hasMany('App\Dish', 'restaurant_id', 'id');

    }

    protected $fillable = [
        'name', 'address', 'phone', 'open'
    ];
}

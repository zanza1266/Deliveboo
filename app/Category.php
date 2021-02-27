<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function categoryToRestaurant () {

        return $this->belongsToMany('App\Restaurant', 'restaurants_to_categories', 'category_id', 'restaurant_id');

    }
}

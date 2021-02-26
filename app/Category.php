<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catetegory extends Model
{
    protected $table = 'categories';

    public function categoryToRestaurant () {

        return $this->belongsToMany('App\Restaurant', 'restaurants_to_categories', 'category_id', 'restaurant_id');

    }
}

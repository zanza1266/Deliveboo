<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';


    public function typeToDish () {

        return $this->hasMany('App\Dish', 'type_id', 'id');

    }
}

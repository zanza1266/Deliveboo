<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';

    public function scheduleToDayWeek () {

        return $this->belongsTo('App\DayWeek', 'day_week_id', 'id');

    }

    public function scheduleToRestaurant () {

        return $this->belongsTo('App\Restaurant', 'restaurant_id', 'id');

    }
}

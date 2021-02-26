<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DayWeek extends Model
{
    protected $table = 'days_week';

    public function dayWeekToSchedule () {

        return $this->hasMany('App\Schedule', 'day_week_id', 'id');

    }
}

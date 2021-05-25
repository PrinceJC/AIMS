<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilityCalendar extends Model
{
    protected $table = 'facilitycalendar';
    protected $fillable = ['facilityname','color','date_start','date_end'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZoomCalendar extends Model
{
    protected $table = 'zoomcalendar';
    protected $fillable = ['name','color','date_start','date_end'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleEvent extends Model
{
    protected $table = 'vehicleevents';
    protected $fillable = ['title','color','details','start_date','end_date'];

}

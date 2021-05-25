<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avrs extends Model
{
    protected $table = 'vehicle_requisitions';
    protected $fillable = ['vehicle_name'.'driver','date_from','date_to','time_from'.'time_to','destination_route','passenger','purpose','charge_to','requested_by','recommended_by','status'];
}

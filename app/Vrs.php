<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vrs extends Model
{
    protected $table = 'vehicle_requisitions';
    protected $fillable = ['vehicle_name','reserved_by','driver','date_from','date_to','time_from'.'time_to','destination_route','passenger','purpose',
    'charge_to','requested_by','recommended_by','status',
    'timedepartureoffice','timearrival','timedeparturelocation','approxdistance','tankbalance','officestock','purchased','used',
    'balance','gearoilissued','luboilissued','greaseissued','odometerbeg','odometerend','distance','remarks','files','image'];
}

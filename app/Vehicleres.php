<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicleres extends Model
{
   protected $table = 'vehiclereservations';
   protected $fillable = ['driver','vehiclename'.'passenger','destination','purpose','date'.'timedepartureoffice','timearrival','timedeparturelocation','approxdistance','tankbalance','officestock','purchased','used','balance','gearoilissued','luboilissued','greaseissued','odometerbeg','odometerend','distance','remarks','status','files'];
}

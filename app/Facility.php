<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $table = 'facility_reservations';
    protected $fillable =['name','color','reserver'.'date_start'.'date_end','time_start','time_end','status'];
}

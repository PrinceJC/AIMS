<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Afacilities extends Model
{
    protected $table = 'facility_reservations';
    protected $fillable =['name','reserver'.'date_start'.'date_end','time_start','time_end','status'];
}

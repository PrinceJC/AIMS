<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilityStatus extends Model
{
    protected $table = 'Status_Facility';
    protected $fillable = ['name'];
}

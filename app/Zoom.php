<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zoom extends Model
{
    protected $table = 'zoom';
    protected $fillable =['reserver','email'.'topic'.'date','time_start','time_end','type','setup','remarks'];
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FacilityCalendar;
class UserCalendarfacController extends Controller
{
    public function index(){

        $events = FacilityCalendar::all();
        $event = [];
        foreach  ($events as $row){
        $enddate = $row->date_end. "24:00:00";
        $event[] = \Calendar::event(
            $row->title,
            false,
            new \DateTime($row->date_start),
            new \DateTime($row->date_end),
            $row->id,
            [
                'color' => $row->color,
            ]

            );
        }
        $calendar = \Calendar::addEvents($event);
        return view('usercalendarfac', compact('events','calendar'));
    }
    public function show(){
        $events = FacilityCalendar::all();
        return view('userdisplayfac')->with('events', $events);
    }
}

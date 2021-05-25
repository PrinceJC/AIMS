<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VehicleEvent;
class UserCalendar2Controller extends Controller
{
    public function index(){

        $events = VehicleEvent::all();
        $event = [];
        foreach  ($events as $row){
        $enddate = $row->end_date. "24:00:00";
        $event[] = \Calendar::event(
            $row->title,
            false,
            new \DateTime($row->start_date),
            new \DateTime($row->end_date),
            $row->id,
            [
                'color' => $row->color,
            ]

            );
        }
        $calendar = \Calendar::addEvents($event);
        return view('usercalendar2', compact('events','calendar'));
    }
    public function show()
    {
        $events = VehicleEvent::all();
        return view('userdisplay2')->with('events', $events);
    }
}

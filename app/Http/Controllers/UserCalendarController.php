<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VehicleEvent;
class UserCalendarController extends Controller
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
        return view('usercalendar', compact('events','calendar'));
    }
    public function show()
    {
        $events = VehicleEvent::all();
        return view('userdisplay')->with('events', $events);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ZoomCalendar;
class UserZoomCalendarController extends Controller
{
    public function index(){

        $events = ZoomCalendar::all();
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
        return view('userzoomcalendar', compact('events','calendar'));
    }
    public function show(){
        $events = ZoomCalendar::all();
        return view('userzoomdisplay')->with('events', $events);
    }
}

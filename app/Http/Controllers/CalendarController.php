<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VehicleEvent;
use MaddHatter\LaravelFullcalendar\Calendar;

class CalendarController extends Controller
{
    /**
     *
    *@return \Illuminate\Http\Response
    */
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
        return view('calendar', compact('events','calendar'));
    }
    public function show(){
        $events = VehicleEvent::all();
        return view('display')->with('events', $events);
    }

    public function display(){
        return view ('addevent');
    }

    public function store(Request $request){

        $this->validate($request,[
            'title' => 'required',
            'color' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);
            $events = new VehicleEvent;

            $events->title = $request->input('title');
            $events->color = $request->input('color');
            $events->start_date = $request->input('start_date');
            $events->end_date = $request->input('end_date');

            $events->save();

            return redirect('calendar')->with('success', 'Events Added!');
    }
    public function edit($id)
    {
        $events = VehicleEvent::Find ($id);
        return view ('editform' , compact('events', 'id'));
    }
    public function update(Request $request, $id){

        $this->validate($request,[
            'title' => 'required',
            'color' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
            $events =  VehicleEvent::find($id);

            $events->title = $request->input('title');
            $events->color = $request->input('color');
            $events->start_date = $request->input('start_date');
            $events->end_date = $request->input('end_date');
            $events->save();

        return redirect('calendar')->with('success', 'Vehicle Reservation Updated!');

    }
}

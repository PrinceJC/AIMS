<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FacilityCalendar;
class FacilityCalendarController extends Controller
{
    public function index(){

        $events = FacilityCalendar::all();
        $event = [];
        foreach  ($events as $row){
        $enddate = $row->date_end. "24:00:00";
        $event[] = \Calendar::event(
            $row->facilityname,
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
        return view('calendarfac', compact('events','calendar'));
    }
    public function show(){
        $events = FacilityCalendar::all();
        return view('displayfac')->with('events', $events);
    }

    public function display(){
        return view ('addeventfac');
    }

    public function store(Request $request){

        $this->validate($request,[
            'facilityname' => 'required',
            'color' => 'required',
            'date_start' => 'required',
            'date_end' => 'required'
        ]);
            $events = new FacilityCalendar;

            $events->facilityname = $request->input('facilityname');
            $events->color = $request->input('color');
            $events->date_start = $request->input('date_start');
            $events->date_end = $request->input('date_end');

            $events->save();

            return redirect('calendarfac')->with('success', 'Events Added!');
    }
    public function edit($id)
    {
        $events = FacilityCalendar::Find ($id);
        return view ('editformfac' , compact('events', 'id'));
    }
    public function update(Request $request, $id){

        $this->validate($request,[
            'facilityname' => 'required',
            'color' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
        ]);
            $events =  FacilityCalendar::find($id);

            $events->facilityname = $request->input('facilityname');
            $events->color = $request->input('color');
            $events->date_start = $request->input('date_start');
            $events->date_end = $request->input('date_end');
            $events->save();

        return redirect('calendarfac')->with('success', 'Vehicle Reservation Updated!');

    }
}

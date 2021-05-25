<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zoom;
use App\FacilityStatus;
use App\Platform;
use DB;
use App\ZoomCalendar;
class AdminZoomController extends Controller
{
    public function index()
    {
        $events = ZoomCalendar::all();
        $event = [];
        foreach  ($events as $row){
        $enddate = $row->date_end. "24:00:00";
        $event[] = \Calendar::event(
            $row->name,
            false,
            new \DateTime($row->date_start),
            new \DateTime($row->date_end),
            $row->id,
            [
                'color' => $row->color,
                'date_start' => $row->date_start,
                'date_end' => $row->date_end,
            ]

            );
        }
        $calendar = \Calendar::addEvents($event);
        $zoom= DB::table('zoom')
        ->join('users','zoom.reserver','users.id')
        ->select('zoom.reserver','users.id', 'users.name','zoom.id','topic','zoom.email','date','time_start','time_end','type','platform','setup','remarks')
        //->where('facility_reservations.reserver',Auth::user()->id)
        ->get();
        return view('adminzoom.dashboard', compact('zoom','events','calendar'));
    }


    public function edit($id)
    {
        $zoom = Zoom::findOrfail($id);
        $remarks =  FacilityStatus::all();
        $platform = Platform::all();
        return view('adminzoom.edit', compact('zoom','remarks','platform'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'remarks'  => 'required',

        ]);

        $zoom = array (

        'remarks' => $request->remarks,
        'platform' => $request->platform,

        );
        Zoom::where('id',$id)->update($zoom);
        return redirect()->route('adminzoom.index')->with('success','Reservation Successfully Updated!');
    }
    public function store(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'color' => 'required',
            'date_start' => 'required',
            'date_end' => 'required'
        ]);
            $events = new ZoomCalendar;

            $events->name = $request->input('name');
            $events->color = $request->input('color');
            $events->date_start = $request->input('date_start');
            $events->date_end = $request->input('date_end');

            $events->save();

            return redirect('adminzoom')->with('success', 'Events Added!');
    }
    public function show($id){
        $zoom = Zoom::findOrfail($id);
        $events = ZoomCalendar::all();
        return view('adminzoom.show',compact('zoom'))->with('events', $events);
    }
}

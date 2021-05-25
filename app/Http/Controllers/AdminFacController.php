<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Afacilities;
use App\FacilityStatus;
use PDF;
use App\Facilityname;
use DB;
use App\FacilityCalendar;
use Illuminate\Support\Facades\Auth;
class AdminFacController extends Controller
{
    public function index()
    {

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
        $facilities= DB::table('facility_reservations')
        ->join('users','facility_reservations.reserver','users.id')
        ->select('facility_reservations.reserver','users.id', 'users.name','facility_reservations.id','facilityname','date_start','date_end','time_start','time_end','status')
        //->where('facility_reservations.reserver',Auth::user()->id)
        ->get();
        return view('adminfac.dashboard', compact('facilities','calendar','events'));
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

            return redirect('adminfac')->with('success', 'Events Added!');
    }

    public function printadminfac($id)
    {
        $facilities = Afacilities::findOrfail($id);
        $data = [
            'facilities' => $facilities
        ];
        $pdf = PDF::loadView('adminfac.printadminfac', $data);
        return $pdf ->download('FacilityReserve.pdf');

    }


    public function edit($id)
    {
        $fac = Facilityname::all();
        $facilities = Afacilities::findOrfail($id);
        $status =  FacilityStatus::all();
        return view('adminfac.edit', compact('facilities','status','fac'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'status'  => 'required',

        ]);

        $facilities = array (

        'status' => $request->status,

        );

        Afacilities::where('id',$id)->update($facilities);
        return redirect()->route('adminfac.index')->with('success','Reservation Successfully Updated!');
    }
    public function show($id){
        $events = FacilityCalendar::all();
        $facilities = Afacilities::findOrfail($id);
        return view('adminfac.show',compact('facilities'))->with('events', $events);
    }

}

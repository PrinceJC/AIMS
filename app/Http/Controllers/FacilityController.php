<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facility;
use App\Facilityname;
use PDF;
use DB;
use App\FacilityCalendar;
use Illuminate\Support\Facades\Auth;
class FacilityController extends Controller
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

        $facilities = Facilityname::all();
        $name = DB::table('users')
        ->select('users.*','users.name')
        ->get();

        $facility = DB::table('facility_reservations')
            ->join('users','facility_reservations.reserver','users.id')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->select('facility_reservations.reserver','users.id','facility_reservations.id','facilityname','date_start','date_end','time_start','time_end','status')
            ->where('facility_reservations.reserver',Auth::user()->id)
            ->get();

            return view('facilities.create', compact('facilities','name','facility','events','calendar'));
    }
    public function printfacility($id)
    {
        $facilities = Facility::findOrfail($id);
        $data = [
            'facilities' => $facilities
        ];
        $pdf = PDF::loadView('facilities.printfacility', $data);
        return $pdf ->download('FacilityReserve.pdf');

    }



    public function store(Request $request)
    {
        $this->validate($request,[

        'facilityname'  => 'required',


        ]);

        $facilities = new  Facility;

        $facilities->facilityname = $request->input('facilityname');
        $facilities->reserver = $request->input('reserver');
        $facilities->date_start = $request->input('date_start');
        $facilities->date_end = $request->input('date_end');
        $facilities->time_start = $request->input('time_start');
        $facilities->time_end = $request->input('time_end');
        $facilities->status = $request->input('status');


        $facilities->save();
        return redirect('facilities')->with('success','Facility Reservation Added!');

    }
    public function create()
    {
        $facilities = Facilityname::all();
        $name = DB::table('users')
        ->select('users.*','users.name')
        ->get();
        return view('facilities.create', compact('facilities','name'));
    }
    public function show($id)
    {
        $facility = DB::table('facility_reservations')
            ->join('users','facility_reservations.reserver','users.id')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->select('facility_reservations.reserver','users.id','facility_reservations.id','facilityname','date_start','date_end','time_start','time_end','status')
            ->where('facility_reservations.reserver',Auth::user()->id)
            ->get();
        return view('facilities.show', compact('facility'));

    }
    public function edit($id)
    {
        $facilities = Facility::findOrfail($id);
        $fac = Facilityname::all();
        return view('facilities.edit', compact('facilities','fac'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'facilityname'  => 'required',

            'date_start'  => 'required',
            'date_end'  => 'required',
            'time_start'  => 'required',
            'time_end'  => 'required',

        ]);

        $facilities = array (

        'facilityname' => $request->facilityname,
        'reserver' => $request->reserver,

        'date_start' => $request->date_start,
        'date_end' => $request->date_end,
        'time_start' => $request->time_start,
        'time_end' => $request->time_end,

        );

        Facility::where('id',$id)->update($facilities);
        return redirect()->route('facilities.index')->with('success','Reservation Successfully Updated!');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vrs;
use PDF;
use App\Vehicle;
use App\RoleUser;
use DB;
use App\Charges;
use App\Users;
use App\Head;
use App\VehicleEvent;
use Illuminate\Support\Facades\Auth;
class VrsController extends Controller
{
    public function index()
    {
        $charge = Charges::all();
        $vehicles =Vehicle::all();
        $role = RoleUser::all();
        $veh = DB::table('users')
                ->join('role_user', 'users.id', '=', 'role_user.user_id')
               ->join('roles', 'roles.id', '=', 'role_user.role_id')
                ->select('users.*', 'roles.name', 'role_user.id','users.name')
                ->where('role_user.role_id',4)
                ->get();
        $name = DB::table('users')
         ->select('users.*','users.name')
         ->get();

        $head =  DB::table('users')
        ->join('heads','users.head_id','heads.id')
        // ->join('role_user', 'users.id', '=', 'role_user.user_id')
        // ->join('roles', 'roles.id', '=', 'role_user.role_id')
        ->select('users.head_id','heads.id', 'heads.name', 'users.id')
       ->where ('users.id', Auth::user()->id)
        ->get();

        $vehicle = DB::table('vehicle_requisitions')
        ->join('users','vehicle_requisitions.reserved_by','users.id')
        // ->join('role_user', 'users.id', '=', 'role_user.user_id')
        // ->join('roles', 'roles.id', '=', 'role_user.role_id')
        ->select('vehicle_requisitions.reserved_by','users.id', 'users.name as reserve_name', 'vehicle_requisitions.id','driver','vehicle_name','date_from','date_to','destination_route','purpose','status',
        DB::raw('(SELECT name FROM users u WHERE u.id=vehicle_requisitions.driver) as driver_name')
        )
        ->where('vehicle_requisitions.reserved_by',Auth::user()->id)
        ->get();

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

        return view('vrs.create', compact('vehicles','role','veh','name','head','vehicle','charge','calendar','events'));
    }
    public function printvrs($id)
    {
        $vehicles = DB::table('vehicle_requisitions')
        ->join('users','vehicle_requisitions.reserved_by','users.id')
        // ->join('role_user', 'users.id', '=', 'role_user.user_id')
        // ->join('roles', 'roles.id', '=', 'role_user.role_id')
        ->select('vehicle_requisitions.reserved_by','users.id', 'users.name as reserve_name', 'vehicle_requisitions.id','driver','vehicle_name','date_from','date_to','time_from','time_to','destination_route','passenger','purpose','status','charge_to','recommended_by',
        DB::raw('(SELECT name FROM users u WHERE u.id=vehicle_requisitions.driver) as driver_name')
        )
        ->where('vehicle_requisitions.reserved_by',Auth::user()->id)
        ->where('vehicle_requisitions.id',$id)
        ->get();

        $veh = DB::table ('users')
        ->join('role_user', 'users.id', '=', 'role_user.user_id')
        ->join('roles', 'roles.id', '=', 'role_user.role_id')
        ->select('users.*', 'roles.name', 'role_user.id')
        ->where('roles.id',4)
        ->get();

        $data = [
            'vehicles' => $vehicles,
            'veh' => $veh
        ];
        $pdf = PDF::loadView('vrs.printvrs', $data);
        return $pdf ->download('VRS.pdf');
    }
    public function show($id)
    {

        $vehicle   = DB::table('vehicle_requisitions')
        ->join('users','vehicle_requisitions.reserved_by','users.id')
        // ->join('role_user', 'users.id', '=', 'role_user.user_id')
        // ->join('roles', 'roles.id', '=', 'role_user.role_id')
        ->select('vehicle_requisitions.reserved_by','users.id', 'users.name as reserve_name', 'vehicle_requisitions.id','driver','vehicle_name','passenger','date_from','date_to','destination_route','purpose','status',
        DB::raw('(SELECT name FROM users u WHERE u.id=vehicle_requisitions.driver) as driver_name')
        )
        ->where('vehicle_requisitions.reserved_by',Auth::user()->id)

        ->get();



        return view('vrs.show', compact('vehicle'));
    }
    public function edit($id)
    {

        $vehicles = Vrs::findOrfail($id);
        $vehicle   = DB::table('vehicle_requisitions')
        ->join('users','vehicle_requisitions.reserved_by','users.id')
        // ->join('role_user', 'users.id', '=', 'role_user.user_id')
        // ->join('roles', 'roles.id', '=', 'role_user.role_id')
        ->select('vehicle_requisitions.reserved_by','users.id', 'users.name as reserve_name', 'vehicle_requisitions.id','driver','vehicle_name','passenger','date_from','date_to','destination_route','purpose','status',
        DB::raw('(SELECT name FROM users u WHERE u.id=vehicle_requisitions.driver) as driver_name')
        )
        ->where('vehicle_requisitions.reserved_by',Auth::user()->id)
        ->where('vehicle_requisitions.id',$id)
        ->get();

        $veh = DB::table('users')
                ->join('role_user', 'users.id', '=', 'role_user.user_id')
                ->join('roles', 'roles.id', '=', 'role_user.role_id')
                ->select('users.*', 'roles.name', 'role_user.id','users.name')
                ->where('role_user.role_id',4)
                ->get();
        $vehic = Vehicle::all();

        return view('vrs.edit', compact('vehicles','veh','vehicle','vehic'));
    }
    public function create()
    {
        $vehicles =Vehicle::all();
        $role = RoleUser::all();
        $veh = DB::table('users')
                ->join('role_user', 'users.id', '=', 'role_user.user_id')
                ->join('roles', 'roles.id', '=', 'role_user.role_id')
                ->select('users.*', 'roles.name', 'role_user.id','users.name')
                ->where('role_user.role_id',4)
                ->get();
        $name = DB::table('users')
         ->select('users.*','users.name')
         ->get();

        $head = Head::all();


     return view('vrs.create', compact('vehicles','role','veh','name','head'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[

        'vehicle_name'  => 'required',
        'driver'  => 'required',
        'date_from'  => 'required',
        'date_to'  => 'required',
        'time_from'  => 'required',
        'time_to'  => 'required',
        'destination_route'  => 'required',
        'passenger'  => 'required',
        'purpose'  => 'required',
        'charge_to'  => 'required',
        'recommended_by'  => 'required',
        'status'  => 'required',


        ]);

        $veh = new  Vrs;

        $veh->vehicle_name = $request->input('vehicle_name');
        $veh->driver = $request-> input('driver');
        $veh->date_from = $request->input('date_from');
        $veh->date_to = $request->input('date_to');
        $veh->time_from = $request->input('time_from');
        $veh->time_to = $request->input('time_to');
        $veh->destination_route = $request->input('destination_route');
        $veh->passenger = $request->input('passenger');
        $veh->purpose = $request->input('purpose');
        $veh->charge_to = $request->input('charge_to');
        $veh->recommended_by = $request->input('recommended_by');
        $veh->status = $request->input('status');
        $veh->reserved_by = $request->input('reserved_by');
        $veh->save();
        return redirect('vrs')->with('success','Vehicle Reservation Added!');

    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'vehicle_name'  => 'required',
            'driver'  => 'required',
            'date_from'  => 'required',
            'date_to'  => 'required',
            'time_from'  => 'required',
            'time_to'  => 'required',

        ]);

        $vehicle = array (

        'vehicle_name' => $request->vehicle_name,
        'driver' => $request->driver,
        'date_from' => $request->date_from,
        'date_to' => $request->date_to,
        'time_from' => $request->time_from,
        'time_to' => $request->time_to,
        'destination_route' => $request->destination_route,
        'passenger' => $request->passenger,
        'purpose' => $request->purpose,
        'charge_to' => $request->charge_to,
        'requested_by' => $request->requested_by,
        'recommended_by' => $request->recommended_by,
        'file' => $request->file,
        );

        Vrs::where('id',$id)->update($vehicle);
        return redirect()->route('vrs.index')->with('success','Requisition Successfully Updated!');
    }
}

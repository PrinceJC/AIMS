<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use App\Vrs;
use DB;
use PDF;
use App\VehicleEvent;
use App\Vehicle;
use Illuminate\Support\Facades\Auth;
class AdminVehController extends Controller
{
    public function index()
    {
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

        $vehicles = DB::table('vehicle_requisitions')
        ->join('users','vehicle_requisitions.reserved_by','users.id')
        // ->join('role_user', 'users.id', '=', 'role_user.user_id')
        // ->join('roles', 'roles.id', '=', 'role_user.role_id')
        ->select('vehicle_requisitions.reserved_by','users.id', 'users.name as reserve_name', 'vehicle_requisitions.id','driver','vehicle_name','passenger','date_from','date_to','time_from','destination_route','purpose','status',
        DB::raw('(SELECT name FROM users u WHERE u.id=vehicle_requisitions.driver) as driver_name')
        )
        ->get();
        return view('adminveh.dashboard', compact('vehicles','events','calendar'));
    }

    public function edit($id)
    {
        $vehiclee  = DB::table('vehicle_requisitions')
        ->join('users','vehicle_requisitions.reserved_by','users.id')
        // ->join('role_user', 'users.id', '=', 'role_user.user_id')
        // ->join('roles', 'roles.id', '=', 'role_user.role_id')
        ->select('vehicle_requisitions.reserved_by','users.id', 'users.name as reserve_name', 'vehicle_requisitions.id','driver','vehicle_name','passenger','date_from','date_to','destination_route','purpose','status',
        DB::raw('(SELECT name FROM users u WHERE u.id=vehicle_requisitions.driver) as driver_name')
        )

        ->where('vehicle_requisitions.id',$id)
        ->get();
        $vehicles = Vehicle::all();
        $veh = DB::table('users')
        ->join('role_user', 'users.id', '=', 'role_user.user_id')
        ->join('roles', 'roles.id', '=', 'role_user.role_id')
        ->select('users.*', 'roles.name', 'role_user.id','users.name')
        ->where('role_user.role_id',4)
        ->get();
        $vehicle = Vrs::findOrfail($id);
        $status =  Status::all();
        return view('adminveh.edit', compact('vehicle','veh','status','vehicles','vehiclee'));
    }
    public function show($id)
    {
        $vehicles = DB::table('vehicle_requisitions')
        ->join('users','vehicle_requisitions.reserved_by','users.id')
        // ->join('role_user', 'users.id', '=', 'role_user.user_id')
        // ->join('roles', 'roles.id', '=', 'role_user.role_id')
        ->select('vehicle_requisitions.reserved_by','users.id', 'users.name as reserve_name', 'vehicle_requisitions.id','driver','vehicle_name','date_from','date_to','time_from','time_to','destination_route','passenger','purpose',
        'charge_to','requested_by','recommended_by','status',
        'timedeparturelocation','approxdistance','tankbalance','officestock','purchased','used','total',
        'balance','gearoilissued','luboilissued','greaseissued','odometerbeg','odometerend','distance','remarks','file',
        DB::raw('(SELECT name FROM users u WHERE u.id=vehicle_requisitions.driver) as driver_name')
        )
        ->where('vehicle_requisitions.id',$id)
        ->get();
        $vehicle = $this->get_vehicle();
        return view('adminveh.show', compact('vehicles','vehicle'));

    }

     public function get_vehicle()
    {
        $vehicle = DB::table('vehiclereservations')
            ->limit(10)
            ->get();
            return $vehicle;
    }
    public function printadminvehicle($id)
    {
        $vehicle = DB::table('vehicle_requisitions')
        ->join('users','vehicle_requisitions.reserved_by','users.id')
        // ->join('role_user', 'users.id', '=', 'role_user.user_id')
        // ->join('roles', 'roles.id', '=', 'role_user.role_id')
        ->select('vehicle_requisitions.reserved_by','users.id', 'users.name as reserve_name', 'vehicle_requisitions.id','driver','vehicle_name','date_from','date_to','time_from','time_to','destination_route','passenger','purpose',
        'charge_to','requested_by','recommended_by','status',
        'timedeparturelocation','approxdistance','tankbalance','officestock','purchased','used','total',
        'balance','gearoilissued','luboilissued','greaseissued','odometerbeg','odometerend','distance','remarks','file',
        DB::raw('(SELECT name FROM users u WHERE u.id=vehicle_requisitions.driver) as driver_name')
        )
        ->where('vehicle_requisitions.id',$id)
        ->get();

            $vehicles = Vrs::findOrfail($id);
            $data = [
                'vehicles' => $vehicles,
                'vehicle' => $vehicle
            ];
            $pdf = PDF::loadView('adminveh.printadminvehicle', $data);
            return $pdf ->download('TripTicket.pdf');

    }
    public function update(Request $request, $id)
    {
        $data = new Vrs;
        $filename = $request->file('file');
        $file = $request->file('file');
        if ($file != '')
        {
            $file = $request->file('file');
            $filename=time(). '.'.$file->getClientOriginalExtension();
            $request->file->move('storage/', $filename);

            $data->file= $filename;
        }
        else{
            $data = array (

                'status' => 'reserve',
                'remarks' => 'remarks'
                );

        }

        $data = array(
            'status' => $request->status,
            'remarks' =>$request->remarks,
            'file' => $filename

        );

        Vrs::where('id',$id)->update($data);
        return redirect('adminveh')->with('success','Requisition Successfully Updated!');

    }
    public function store(Request $request){

        $this->validate($request,[
            'title' => 'required',
            'details' => 'required',
            'color' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);
            $events = new VehicleEvent;

            $events->title = $request->input('title');
            $events->details = $request->input('details');
            $events->color = $request->input('color');
            $events->start_date = $request->input('start_date');
            $events->end_date = $request->input('end_date');

            $events->save();

            return redirect('adminveh')->with('success', 'Events Added!');
    }
}

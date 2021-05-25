<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicleres;
use App\Vehicle;
use DB;
use PDF;
use App\Vrs;
use App\RoleUser;
use App\VehicleEvent;
use Illuminate\Support\Facades\Auth;
class VehicleController extends Controller
{
    public function index()
    {
        $veh = Vehicle::all();


        $vehicles = DB::table('vehicle_requisitions')
        ->join('users','vehicle_requisitions.reserved_by','users.id')
        ->join('role_user', 'users.id', '=', 'role_user.user_id')
        ->join('roles', 'roles.id', '=', 'role_user.role_id')
        ->select('vehicle_requisitions.reserved_by','users.id', 'users.name as reserve_name', 'vehicle_requisitions.id','driver','vehicle_name','passenger','date_from','date_to','time_from','destination_route','purpose','status',
         DB::raw('(SELECT name FROM users u WHERE u.id=vehicle_requisitions.driver) as driver_name'))
         ->where('vehicle_requisitions.driver',Auth::user()->id        )
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
        return view('vehicles.create',compact('veh','vehicles','calendar','events'));
    }
    public function vehiclemain()
    {
        return view('vehiclemain');
    }

    public function printvehicle($id)
    {
            $vehicles = Vrs::findOrfail($id);
            $data = [
                'vehicles' => $vehicles
            ];
            $pdf = PDF::loadView('vehicles.printvehicle', $data);
            return $pdf ->download('TripTicket.pdf');

    }


    public function store(Request $request)
    {
        $this->validate($request,[

        'vehiclename'  => 'required',
        'passenger'  => 'required',
        'destination'  => 'required',
        'purpose'  => 'required',



        ]);

        $veh = new  Vehicleres;

        $veh->driver = $request->input('driver');
        $veh->vehiclename = $request-> input('vehiclename');
        $veh->passenger = $request->input('passenger');
        $veh->destination = $request->input('destination');
        $veh->purpose = $request->input('purpose');
        $veh->date = $request->input('date');
        $veh->timedeparturelocation = $request->input('timedeparturelocation');
        $veh->timearrival = $request->input('timearrival');
        $veh->timedeparturelocation = $request->input('timedeparturelocation');
        $veh->approxdistance = $request->input('approxdistance');
        $veh->tankbalance = $request->input('tankbalance');
        $veh->officestock = $request->input('officestock');
        $veh->purchased = $request->input('purchased');
        $veh->used = $request->input('used');
        $veh->balance = $request->input('balance');
        $veh->gearoilissued = $request->input('gearoilissued');
        $veh->luboilissued = $request->input('luboilissued');
        $veh->greaseissued = $request->input('greaseissued');
        $veh->odometerbeg = $request->input('odometerbeg');
        $veh->odometerend = $request->input('odometerend');
        $veh->distance = $request->input('distance');
        $veh->remarks = $request->input('remarks');
        $veh->status = $request->input('status');

        $veh->save();
        return redirect('vehicles')->with('success','Vehicle Reservation Added!');

    }

    public function create()
    {
        $veh = Vehicle::all();
        return view('vehicles.create',compact('veh'));

    }


    public function show($id)
    {
        $vehicles = Vrs::findOrfail($id);
        $vehicle = $this->get_vehicle();
        $veh = DB::table('vehicle_requisitions')
        ->join('users','vehicle_requisitions.reserved_by','users.id')
        ->join('role_user', 'users.id', '=', 'role_user.user_id')
        ->join('roles', 'roles.id', '=', 'role_user.role_id')
        ->select('vehicle_requisitions.reserved_by','users.id','vehicle_requisitions.id','driver','vehicle_name','passenger','date_from','date_to','destination_route','purpose','status')

        ->get();
        return view('vehicles.show', compact('vehicles','vehicle','veh'));

    }
    public function get_vehicle()
    {
        $vehicle = DB::table('vehiclereservations')
            ->limit(10)
            ->get();
            return $vehicle;
    }
    public function edit($id)
    {
        $vehicles = Vrs::findOrfail($id);
        $vehicle =  Vehicle::all();
        $role = RoleUser::all();

        return view('vehicles.edit', compact('vehicles','vehicle'));
    }
    public function update(Request $request, $id)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('files');
        if ($image != '')
        {
            $request->validate([
                'vehicle_name'  => 'required',
                'passenger'  => 'required',
                'destination_route'  => 'required',
                'purpose'  => 'required',
                'date_from'  => 'required',
                'time_from'  => 'required',
                'files' => 'image|max:2048'
            ]);
            $image_name = rand() . '.' . $image->
                        getClientOriginalExtension();
                    $image->move(public_path('images'), $image_name);
        }
        else{
            $request->validate([
            'vehicle_name'  => 'required',
            'passenger'  => 'required',
            'destination_route'  => 'required',
            'purpose'  => 'required',
            'date_from'  => 'required',
            'time_from'  => 'required',

            ]);
        }

        $form_data = array(
        'vehicle_name' => $request->vehicle_name,
        'passenger' => $request->passenger,
        'destination_route' => $request->destination_route,
        'purpose' => $request->purpose,
        'date_from' => $request->date_from,
        'time_from' => $request->time_from,
        'time_to' => $request->time_to,
        'timedeparturelocation' => $request->timedeparturelocation,
        'approxdistance' => $request->approxdistance,
        'tankbalance' => $request->tankbalance,
        'officestock' => $request->officestock,
        'purchased' => $request->purchased,
        'used' => $request->used,
        'balance' => $request->balance,
        'total' => $request->total,
        'gearoilissued' => $request->gearoilissued,
        'luboilissued' => $request->luboilissued,
        'greaseissued' => $request->greaseissued,
        'odometerbeg' => $request->odometerbeg,
        'odometerend' => $request->odometerend,
        'distance' => $request->distance,
        'remarks' => $request->remarks,
        'files' => $image_name
        );


        Vrs::where('id',$id)->update($form_data);
        return redirect()->route('vehicles.index')->with('success','Reservation Successfully Updated!');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zoom;
use App\Type;
use DB;
use App\ZoomCalendar;
use App\Setup;

use App\MaddHatter\LaravelFullcalendar\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\PaginationServiceProvider;
class ZoomController extends Controller
{
    public function index()
    {

        $data = DB::table('zoom')
        ->join('users','zoom.reserver','users.id')
        ->join('role_user', 'users.id', '=', 'role_user.user_id')
        ->join('roles', 'roles.id', '=', 'role_user.role_id')
        ->select('zoom.reserver','users.id','zoom.id','topic','zoom.email','date','type','platform','time_start','time_end','setup','remarks')
        ->where('zoom.reserver',Auth::user()->id)

        ->get();


        $zoom = Type::all();
        $name = DB::table('users')
        ->select('users.*','users.name')
        ->get();
        $setup = Setup::all();

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

        return view('zooms.create', compact('zoom','name','setup','events','data','calendar'));
    }



    public function store(Request $request)
    {
        $this->validate($request,[

        'type'  => 'required',


        ]);

        $zoom = new  Zoom;
        $zoom->reserver = $request->input('reserver');
        $zoom->topic = $request->input('topic');
        $zoom->email = $request->input('email');
        $zoom->date = $request->input('date');
        $zoom->type = $request->input('type');
        $zoom->setup = $request->input('setup');
        $zoom->time_start = $request->input('time_start');
        $zoom->time_end = $request->input('time_end');
        $zoom->platform = $request->input('platform');
        $zoom->remarks = $request->input('remarks');
        $zoom->others = $request->input('others');

        $arrayTostring = implode(',' , $request->input('setup'));
        $zoom['setup'] = $arrayTostring;

        $zoom->save();
        return redirect('zooms')->with('success','Zoom Reservation Added!');

    }

    public function create()
    {
        $zoom = Type::all();
        $name = DB::table('users')
        ->select('users.*','users.name')
        ->get();

        return view('zooms.create', compact('zoom','name'));
    }

    public function show($id)
    {

        $data = DB::table('zoom')
        ->join('users','zoom.reserver','users.id')
        ->join('role_user', 'users.id', '=', 'role_user.user_id')
        ->join('roles', 'roles.id', '=', 'role_user.role_id')
        ->select('zoom.reserver','users.id','zoom.id','topic','zoom.email','date','type','platform','time_start','time_end','setup','remarks')
        ->where('zoom.reserver',Auth::user()->id)

        ->get();
        $zoom = Zoom::findOrfail($id);
        return view('zooms.show', compact('zoom', 'data'));

    }

    public function edit($id)
    {
        $zoom = Zoom::findOrfail($id);
        $zooms = Type::all();
        return view('zooms.edit', compact('zoom','zooms'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type'  => 'required',

            'date'  => 'required',
            'time_start'  => 'required',
            'time_end'  => 'required',

        ]);

        $zoom = array (

        'topic' => $request->topic,
        'email' => $request->email,
        'date' => $request->date,
        'type' => $request->type,
        'time_start' => $request->time_start,
        'time_end' => $request->time_end,
        'setup' => $request->setup,
        'platform' => $request->platform,
        'remarks' => $request->remarks,

        );

        Zoom::where('id',$id)->update($zoom);
        return redirect()->route('zooms.index')->with('success','Zoom Reservation Successfully Updated!');
    }
}

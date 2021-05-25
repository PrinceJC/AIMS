<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Facilityname;
use App\Vehicle;
class SampleController extends Controller
{
    public function index()
    {


        $data = Users::latest()->paginate(5);
        return view('superadmin2.dashboard', compact('data'))
                ->with('i', (request()->input('page',1) - 1) * 5);
    }
    public function create()
    {
        return view('superadmin2.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'image' =>   'required|image|max:2048'
        ]);

        $image = $request->file('image');
        $new_name = rand() . '.' . $image->
            getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
                'name' => $request->name,
                'email' => $request->email,
                'image' => $new_name
        );

            Users::create($form_data);

            return redirect('superadmin2')->with('success', 'Data Added Successfully.');
    }

    public function show($id)
    {
        $data = Users::findOrFail($id);
        return view('superadmin2.view', compact('data'));
    }
    public function edit($id)
    {
        $data = Users::findOrFail($id);
        return view('superadmin2.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if ($image != '')
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'image' => 'image|max:2048'
            ]);
            $image_name = rand() . '.' . $image->
                        getClientOriginalExtension();
                    $image->move(public_path('images'), $image_name);
        }
        else{
            $request->validate([
                'name' => 'required',
                'email' => 'required',

            ]);
        }

        $form_data = array(
            'name' => $request->name,
            'email' => $request->email,
            'image' => $image_name
        );

        Users::where('id',$id)->update($form_data);

        return redirect('superadmin2.dashboard')->with('success','Usert Successfully Updated!');

    }
    public function facilitycat()
    {
        return view('facilitycat');
    }
    public function vehiclecat()
    {
        return view('vehiclecat');
    }
    public function equipmentcat()
    {
        return view('equipmentcat');
    }
    public function addfacilitycat(Request $request)
    {
        $this->validate($request,[

        'name'  => 'required',


        ]);

        $facilities = new  Facilityname();

        $facilities->name = $request->input('name');



        $facilities->save();
        return redirect('facilitycat')->with('success','Facility Reservation Added!');

    }
    public function addvehiclecat(Request $request)
    {
        $this->validate($request,[

        'name'  => 'required',


        ]);

        $vehicle = new  Vehicle();

        $vehicle->name = $request->input('name');



        $vehicle->save();
        return redirect('vehiclecat')->with('success','Vehicle Reservation Added!');

    }


}

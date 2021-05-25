<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vrs;
use App\Status;

class AdminVrsController extends Controller
{
    public function index()
    {

        $vehicles = Vrs::paginate(5);
        return view('adminvrs.dashboard', compact('vehicles'));
    }


    public function edit($id)
    {
        $vehicles = Vrs::findOrfail($id);
        $status =  Status::all();
        return view('adminvrs.edit', compact('vehicles','status'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([

            'status'  => 'required',

        ]);

        $vehicles = array (

        'status' => $request->status,

        );

        Vrs::where('id',$id)->update($vehicles);
        return redirect()->route('adminvrs.index')->with('success','Requisition Successfully Updated!');
    }
}

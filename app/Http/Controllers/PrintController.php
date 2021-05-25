<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicleres;
class PrintController extends Controller
{
    public function index()
    {
        $veh = Vehicleres::all();
        return view('printvehicleres')->with('vehi', $veh);
    }

    public function printview()
    {
        $veh = Vehicleres::all();
        return view('vehicleres')->with('vehi',$veh);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SuperAdminController extends Controller
{
    public function index()
    {
        $data = User::latest()->paginate(5);
        return view('superadmin.dashboard', compact('data'))
                ->with('i', (request()->input('page',1) - 1) * 5);
    }
    public function edit()
    {

    }
    public function update()
    {

    }
}

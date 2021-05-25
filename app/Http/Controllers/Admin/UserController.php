<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('superadmin.users.index')->with('users', User::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        if(Auth::user()->id == $id){
            return redirect()->route('superadmin.users.index')->with('warning', 'You are not allowed to edit yourself!');
        }
        $user_roles = User::find($id);
        return view('superadmin.users.edit')->with('user_roles', $user_roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::user()->id== $id){
            return  redirect()->route('superadmin.users.index')->with('warning', 'You are not allowed to edit yourself!');
        }
        $user = User::find($id);
        $user->roles()->sync($request->roles);

        return redirect()->route('superadmin.users.index')->with('success', 'User has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->id== $id){
            return  redirect()->route('superadmin.users.index')->with('warning', 'You are not allowed to Delete yourself!');
        }
        $user = User::find($id);
        if($user){
            $user->roles()->detach();
            $user->delete;
            return redirect()->route('superadmin.users.index')->with('warning', 'This User cannot be Deleted!');

        }

        return redirect()->route('superadmin.users.index')->with('success', 'User has been Deleted!');


    }
    public function register(){
        $users = User:: paginate(5);
       return view('superadmin.users.index')->with('users', $users);
     }
}

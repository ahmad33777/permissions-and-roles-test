<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users =  User::withCount('permissions')->get();
        return view('users.index')->with('users', $users);
    }


    public function create()
    {
        $this->authorize('create', User::class);
        return view('users.create');
    }


    public function store(Request $request)
    {

        $user =  new User();
        $user->name =  $request->get('name');
        $user->email =  $request->get('email');
        $user->password =  Hash::make($request->password);
        $user->assignRole('admin');
        $status =  $user->save();
        return redirect()->back()->with('status', 'تمت الاضافة بنجاح');
    }

    public function edit($id)
    {
        $user   =  User::find($id);
        return  view('users.edit')->with('user', $user);
    }


    public function update(Request $request,  $id)
    {
        $user =  User::find($id);
        $user->name =  $request->get('name');
        $user->email =  $request->get('email');
        $status =  $user->update();
        return  redirect()->back()->with('status', $status);
    }
    public function destroy($id)
    {
        $res = User::where('id', $id)->delete();
        return redirect()->back()->with('status', $res);
    }
}
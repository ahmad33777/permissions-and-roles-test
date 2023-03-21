<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


use Spatie\Permission\Models\Role;

class RoleContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::withCount('permissions')->get();
        // dd($roles->toArray());
        return view('roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate(
            [
                'gaurd' => 'required|string|min:3',
                'role_name' => 'required|string|min:3',
            ],
            [
                'gaurd.required' => 'من فضلك ادخل معلومات',
                'gaurd.string' => ' يجب ان تكون  حروف',
                'role_name.required' => 'من فضلك ادخل ألمعلومات ',
                'role_name.string' => ' يجب ان تكون  حروف',
            ]
        );

        $role = new Role();
        $role->name =  $request->role_name;
        $role->guard_name =  $request->gaurd;
        $isSaved =   $role->save();
        // return redirect()->back()->with('status', $isSaved);
        return redirect()->route('roles.index', [$isSaved]);
        //  return view('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findById($id);
        return view('roles.edit',  ['role' => $role]);
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
        $role = Role::findById($id);
        $role->name = $request->role_name;
        $role->guard_name =  $request->gaurd;
        $status =  $role->update();
        return redirect()->back()->with('status', $status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $role =  Role::findById($id)->delete();
        // return redirect()->back();
        $roleDestroy =  Role::destroy($id);
        if ($roleDestroy) {
            return response()->json(['icon' => 'success', 'title' => 'Role deleted success'], 200);
        } else {
            return response()->json(['icon' => 'error', 'title' => 'Failed Role deleted'], 400);
        }
    }
}
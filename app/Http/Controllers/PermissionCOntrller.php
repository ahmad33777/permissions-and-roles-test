<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionCOntrller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Permissions =   Permission::all();
        // dd($Permissions->toArray());

        return view('permissions.index', ['Permissions' => $Permissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Permission =  new Permission();
        $Permission->name = $request->name;
        $Permission->guard_name = $request->gaurd;
        $status =  $Permission->save();
        return   redirect()->route('permissions.index');
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
        $permission =  Permission::findById($id);
        return view('permissions.edit', ['permission' => $permission]);
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
        $permission =  Permission::findById($id);
        $permission->name =  $request->name;
        $permission->guard_name =  $request->gaurd;
        $permission->update();
        return redirect()->route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permissionDestroy =  Permission::destroy($id);

        if ($permissionDestroy) {
            return response()->json(['icon' => 'success', 'title' => 'Permission deleted success'], 200);
        } else {
            return response()->json(['icon' => 'error', 'title' => 'Failed RolePermission deleted'], 400);
        }
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use Session;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if ($request->user()->cannot('List role_list')) {
        //     return view('admin.errous.403');
        // }
        $role = Role::search()->paginate(10);
        return view('admin.role.index', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // if ($request->user()->cannot('List role_add')) {
        //     return view('admin.errous.403');
        // }
        $permission = Permission::where('parent_id', 0)->get();
        $roles = Role::all();
        return view('admin.role.create', compact('roles', 'permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if ($request->user()->cannot('List role_add')) {
        //     return view('admin.errous.403');
        // }
        $roles = Role::create([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);
        $roles->permission()->attach($request->permission_id);
        return redirect()->route('role.index');
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
    public function edit($id,Request $request)
    {
        // if ($request->user()->cannot('List role_update')) {
        //     return view('admin.errous.403');
        // }
        $permission = Permission::where('parent_id', 0)->get();
        $roles = Role::find($id);
        $permissionchecked = $roles->permission;
        return view('admin.role.edit', compact('roles', 'permission', 'permissionchecked'));
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
        // if ($request->user()->cannot('List role_update')) {
        //     return view('admin.errous.403');
        // }
        $roles = Role::find($id);
        $roles->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);
        $roles->permission()->sync($request->permission_id);
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        // if ($request->user()->cannot('List role_delete')) {
        //     return view('admin.errous.403');
        // }
        
        $roles = Role::find($id);
        if ($roles->delete())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('role.index');
    }
}

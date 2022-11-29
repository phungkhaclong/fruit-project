<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if ($request->user()->cannot('User_list')) {
        //     return view('admin.errous.403');
        // }
        $user = User::orderBy('created_at', 'DESC')->search()->paginate(10);
        return view('admin.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // if ($request->user()->cannot('User_add')) {
        //     return view('admin.errous.403');
        // }
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if ($request->user()->cannot('User_add')) {
        //     return view('admin.errous.403');
        // }
        $u = new User;
        $this->validate($request, [
            'txtname' => 'required',
            'txtpassword' => 'required',
            'txtemail' => 'required',
            'txttrangthai' => 'required'

        ]);
        $u->name = $request->txtname;
        $u->password = Hash::make($request->txtpassword);
        $u->email = $request->txtemail;
        $u->trangthai = $request->txttrangthai;
        $u->level = "user";
        $u->save();

        $u->roles()->attach($request->role_id);
        // $u->roles()->attach($request->user_id);
        // dd($u);
        return redirect()->route('user.index');
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
    public function edit($id, Request $request)
    {
        // if ($request->user()->cannot('User_update')) {
        //     return view('admin.errous.403');
        // }
        $roles = Role::all();
        $user = User::find($id);
        $roleUser = $user->roles;
        return view('admin.user.edit', compact('user', 'roles', 'roleUser'));
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
        // if ($request->user()->cannot('User_update')) {
        //     return view('admin.errous.403');
        // }
        $user = User::find($id);
        $data = $request->validate([
            'txtname' => 'required',
            'txtemail' => 'required',
            'txttrangthai' => 'required'
        ]);
        $user->name = $request->txtname;
        // $user->password = Hash::make($request->txtpassword);
        $user->email = $request->txtemail;
        $user->trangthai = $request->txttrangthai;
        $user->level = $request->level;
        $user->roles()->sync($request->role_id);
        $user->save();
        return redirect()->route('user.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        // if ($request->user()->cannot('User_delete')) {
        //     return view('admin.errous.403');
        // }
        $user = User::find($id);
        if ($user->trangthai == 0) {
            $user->trangthai = 1;
        } else
            $user->trangthai = 0;
        if ($user->update())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('user.index');
    }
}

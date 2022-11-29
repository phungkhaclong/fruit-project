<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Auth;
use Illuminate\Support\Facades\Auth;

class AccountLoginController extends Controller
{
    public function __construct()
    {
    }
    public function login()
    {
        if (Auth::check()) {
            return redirect('panel');
        } else {
            return view('admin.layout.dashboard');
        }
    }
    public function post_login(request $request)
    {
        $login = [
            'email' => $request->txtEmail,
            'password' => $request->txtPassword,
            'trangthai'    => 'active',
        ];
        if (Auth::attempt($login)) {
            return redirect('panel')->with('name', Auth::User()->name);
        } else {
            return redirect()->back()->with('status', 'Email hoặc Password không chính xác');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return view('user.login');
    }
    

}

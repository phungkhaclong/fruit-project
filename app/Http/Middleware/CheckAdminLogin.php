<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// use Auth;
use Illuminate\Support\Facades\Auth;

use App\Models\User;   

class CheckAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // nếu user đã đăng nhập
        if (Auth::check()) {
            $user = Auth::user();
         
            if ($user->trangthai == '1' && $user->level == "admin") {
                return $next($request);
            } else {
                Auth::logout();
                return redirect()->route('user.login')->with('status', 'Chỉ tài khoản admin mới được truy cập');
            }
        } else
            return redirect()->route('user.login')->with('status', 'Chỉ tài khoản admin mới được truy cập');
    }
}

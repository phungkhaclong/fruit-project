<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Models\Social;
use App\Models\LoginGoogle;

use Socialite;




class AccountController extends Controller
{
    public function login()
    {
        return view('user.login');
    }
    public function post_login(request $request)
    {
        $login = [
            'email' => $request->txtEmail,
            'password' => $request->txtPassword,
            'trangthai'    => "1"
        ];

        if (Auth::attempt($login)) {
            $infoUser = ['id' => Auth::User()->id, 'name' => Auth::User()->name, 'email' => Auth::User()->email];
            $request->session()->put('infoUser', $infoUser);

            if (Auth::User()->level == "user") {
                return redirect()->route('user.home')->with('status', 'Đăng nhập thành công');
            }
            return redirect()->route('admin.layout.dashboard')->with('status', 'Đăng nhập thành công');
        } else {
            return redirect()->back()->with('status', 'Email hoặc Password không chính xác');
        }
    }
    public function Register()
    {
        return view('user.register');
    }
    public function post_register(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required|email|unique:user,email',
                'password' => 'required|min:6|max:20',
                'repassword' => 'required|same:password'
            ],
            [
                'name.required' => 'Vui lòng nhập tên',
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Không đúng định dạng email',
                'email.unique' => 'Email đã tồn tại! Vui lòng nhập emal khác',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'repassword.required' => 'Vui lòng xác nhận mật khẩu',
                'repassword.same' => 'Xác nhận mật khẩu không giống nhau',
                'password.min' => 'Mật khẩu ít nhất 6 kí tự'
            ]
        );
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = "user";
        $user->trangthai = 1;
        if ($user->save())
            return redirect()->route('user.login')->with('status', 'Tạo tài khoản thành công!');
    }
    public function getLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('user.home');
    }

    public function login_google()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callback_google(Request $request)
    {
        $users = Socialite::driver('google')->stateless()->user();
        $authUser = $this->findOrCreateUser($users, 'google');
        if ($authUser) {
            $account_name = LoginGoogle::where('id', $authUser->user)->first();
            $infoUser = [
                'id' =>  $account_name->id,
                'name' => $account_name->name
            ];
            session()->put('infoUser', $infoUser);
            // dd($account_name);
        }
        return redirect()->route('user.home')->with('status', 'Đăng nhập thành công');
    }
    public function findOrCreateUser($users, $provider)
    {
        $authUser = Social::where('provider_user_id', $users->id)->first();
        if ($authUser) {
            return $authUser;
        } else {
            $customer_new = new Social([
                'provider_user_id' => $users->id,
                'provider' => strtoupper($provider)
            ]);

            $logingg = LoginGoogle::where('email', $users->email)->first();

            if (!$logingg) {
                $logingg = LoginGoogle::create([
                    'name' => $users->name,
                    'email' => $users->email,
                    'avatar' => '',
                    'password' => '',
                    'SDT' => '',
                    'trangthai' => 1,
                    'DiaChi' => '',
                    'HinhThuc' => '',
                    'level' => 'user',
                ]);
            }
            $customer_new->login()->associate($logingg);
            $customer_new->save();
            Auth::login($customer_new);
            return $customer_new;
        }
    }

    public function myAccount()
    {
        if (session()->has('infoUser')) {
            $myaccount = session()->get('infoUser');
        }
        return view('user.infouser', compact('myaccount'));
    }
    public function updateAccount(Request $request, $id)
    {
        $user = User::find($id);
        $data = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:6|max:20',
                'repassword' => 'required|same:password'
            ],
            [
                'name.required' => 'Vui lòng nhập tên',
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Không đúng định dạng email',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'repassword.required' => 'Vui lòng xác nhận mật khẩu',
                'repassword.same' => 'Xác nhận mật khẩu không giống nhau',
                'password.min' => 'Mật khẩu ít nhất 6 kí tự'
            ]
        );
        $data['password'] = Hash::make($data['password']);
        if ($user->update($data)) {
            return redirect()->route('user.infouser')->with('status', 'Cập nhật tài khoản thành công!');
        } else return redirect()->route('user.infouser')->with('status', 'Thất bại');
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login()
    {
        return view('backend.login.login');
    }

    public function post_login(LoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('admin.index');
        }else {
            return redirect()->back()->with('thong_bao', 'Mật khẩu không đúng !')->withInput(); // withInput giữ nguyên value trong input khi đăng nhập sai  
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.get');
    }

    public function index()
    {
        return view('backend.index');
    }
}

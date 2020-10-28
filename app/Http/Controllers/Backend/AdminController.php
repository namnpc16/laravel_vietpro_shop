<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\OrdersModal;

class AdminController extends Controller
{
    public function index()
    {
        $date = Carbon::now();
//        $new_date = $date->add('1', 'day');
        $current_month = $date->format('m');
        $current_yeah = $date->format('Y');
        for($i = 1; $i <= $current_month; $i++){
             $arr['Tháng '.$i] = OrdersModal::where('state', 1)->whereMonth('updated_at', $i)->whereYear('updated_at', $current_yeah)->sum('total');
        }
        $data['total_order'] = OrdersModal::where('state', 2)->whereMonth('updated_at', $current_month)->whereYear('updated_at', $current_yeah)->get();
        $data['chart_data'] = $arr;
        return view('backend.index', $data);
    }

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
        } else {
            return redirect()->back()->with('thong_bao', 'Mật khẩu không đúng !')->withInput(); // withInput giữ nguyên value trong input khi đăng nhập sai
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.get');
    }

    public function fallBack()
    {
        return view('backend.login.login');
    }
}

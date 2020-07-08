<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest; 

class AdminController extends Controller
{
    public function login()
    {
        return view('backend.login.login');
    }

    public function post_login(LoginRequest $request)
    {
        
    }

    public function index()
    {
        return view('backend.index');
    }
}

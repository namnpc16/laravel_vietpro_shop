<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
        // Users
        public function list_user()
        {
            return view('backend.users.listuser');
        }
    
        public function add_user()
        {
            return view('backend.users.adduser');
        }
    
        public function edit_user()
        {
            return view('backend.users.edituser');
        }
    
        public function del_user()
        {
            
        }
}

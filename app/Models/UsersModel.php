<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsersModel extends Model
{
    protected $table = "users";

    protected $fillable = ['name', 'phone', 'address', 'email', 'password', 'remember_token', 'level'];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
        $this->attributes['remember_token'] = Str::random(60);
    }
}

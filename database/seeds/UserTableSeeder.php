<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'email' => 'admin@gmail.com',
                'name' => 'Phương Nam',
                'phone' => '0971420384',
                'address' => 'Bắc Giang',
                'level' => 1,
                'remember_token' => Str::random(10),
                'password' => bcrypt('123456')
            ],
            [
                'id' => 2,
                'email' => 'administrator@gmail.com',
                'name' => 'administrator',
                'phone' => '0971420384',
                'address' => 'Bắc Giang',
                'level' => 1,
                'remember_token' => Str::random(10),
                'password' => bcrypt('123456')
            ]
        ]);
    }
}

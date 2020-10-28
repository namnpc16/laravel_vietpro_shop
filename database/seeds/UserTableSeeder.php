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
        DB::table('users')->delete();
        DB::table('users')->insert([
            [
                'email' => 'admin@gmail.com',
                'name' => 'Phương Nam',
                'phone' => '0971420384',
                'address' => 'Bắc Giang',
                'level' => 1,
                'remember_token' => Str::random(10),
                'password' => bcrypt('123456')
            ],
            [
                'email' => 'administrator@gmail.com',
                'name' => 'administrator',
                'phone' => '0971420384',
                'address' => 'Bắc Giang',
                'level' => 1,
                'remember_token' => Str::random(10),
                'password' => bcrypt('123456')
            ],
            [
                'email' => 'administrator1@gmail.com',
                'name' => 'administrator',
                'phone' => '0971420384',
                'address' => 'Bắc Giang',
                'level' => 1,
                'remember_token' => Str::random(10),
                'password' => bcrypt('123456')
            ],
            [
                'email' => 'administrator2@gmail.com',
                'name' => 'administrator',
                'phone' => '0971420384',
                'address' => 'Bắc Giang',
                'level' => 1,
                'remember_token' => Str::random(10),
                'password' => bcrypt('123456')
            ],
            [
                'email' => 'administrator3@gmail.com',
                'name' => 'administrator',
                'phone' => '0971420384',
                'address' => 'Bắc Giang',
                'level' => 0,
                'remember_token' => Str::random(10),
                'password' => bcrypt('123456')
            ],
            [
                'email' => 'administrator4@gmail.com',
                'name' => 'administrator',
                'phone' => '0971420384',
                'address' => 'Bắc Giang',
                'level' => 1,
                'remember_token' => Str::random(10),
                'password' => bcrypt('123456')
            ],
            [
                'email' => 'administrator5@gmail.com',
                'name' => 'administrator',
                'phone' => '0971420384',
                'address' => 'Bắc Giang',
                'level' => 0,
                'remember_token' => Str::random(10),
                'password' => bcrypt('123456')
            ],
            [
                'email' => 'administrator6@gmail.com',
                'name' => 'administrator',
                'phone' => '0971420384',
                'address' => 'Bắc Giang',
                'level' => 1,
                'remember_token' => Str::random(10),
                'password' => bcrypt('123456')
            ],
            [
                'email' => 'administrator7@gmail.com',
                'name' => 'administrator',
                'phone' => '0971420384',
                'address' => 'Bắc Giang',
                'level' => 1,
                'remember_token' => Str::random(10),
                'password' => bcrypt('123456')
            ],
            [
                'email' => 'administrator8@gmail.com',
                'name' => 'administrator',
                'phone' => '0971420384',
                'address' => 'Bắc Giang',
                'level' => 1,
                'remember_token' => Str::random(10),
                'password' => bcrypt('123456')
            ],
            [
                'email' => 'administrator9@gmail.com',
                'name' => 'administrator',
                'phone' => '0971420384',
                'address' => 'Bắc Giang',
                'level' => 1,
                'remember_token' => Str::random(10),
                'password' => bcrypt('123456')
            ],
        ]);
    }
}

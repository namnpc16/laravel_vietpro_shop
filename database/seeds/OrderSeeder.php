<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            [
                'id' => 1,
                'name' => 'phuong nam',
                'address' => 'bac giang',
                'email' => 'namnpc16cntt@gmail.com',
                'phone' => '0971420384',
                'total' => '10000',
                'state' => 1,
            ],
            [
                'id' => 2,
                'name' => 'phuong nam 01',
                'address' => 'bac giang',
                'email' => 'namnpc16cntt@gmail.com',
                'phone' => '0971420385',
                'total' => '10000',
                'state' => 2,
            ],
            [
                'id' => 3,
                'name' => 'phuong nam 02',
                'address' => 'bac giang',
                'email' => 'namnpc16cntt@gmail.com',
                'phone' => '0971420386',
                'total' => '10000',
                'state' => 2,
            ],
        ]);
    }
}

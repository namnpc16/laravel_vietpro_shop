<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products_order')->insert([
            [
                'id' => 1,
                'code' => '12',
                'name' => 'Phương Nam',
                'price' => '100000',
                'quantity' => 31,
                'img' => 'adsfafasdf.jpg',
                'order_id' => 1,
            ],
            [
                'id' => 2,
                'code' => '9',
                'name' => 'Phương Nam',
                'price' => '100000',
                'quantity' => 36,
                'img' => 'adsfaádsdf.jpg',
                'order_id' => 2,
            ],
            [
                'id' => 3,
                'code' => '2',
                'name' => 'Phương Nam',
                'price' => '100000',
                'quantity' => 54,
                'img' => 'adsfasfasdf.jpg',
                'order_id' => 3,
            ],
            [
                'id' => 4,
                'code' =>'5',
                'name' => 'Phương Nam',
                'price' => '100000',
                'quantity' => 12,
                'img' => 'adsffasdfasdf.jpg',
                'order_id' => 2,
            ],
        ]);
    }
}

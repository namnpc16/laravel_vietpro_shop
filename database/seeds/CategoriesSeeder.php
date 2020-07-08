<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['id' => 1, 'name' => 'Quần áo nam', 'parent' => 0],
            ['id' => 2, 'name' => 'Quần áo nữ', 'parent' => 0],
            ['id' => 3, 'name' => 'Áo khoác nam', 'parent' => 1],
            ['id' => 4, 'name' => 'Áo thun nam', 'parent' => 1],
            ['id' => 5, 'name' => 'Áo khoác nữ', 'parent' => 2],
            ['id' => 6, 'name' => 'Áo thun nữ', 'parent' => 2]  
        ]);
    }
}

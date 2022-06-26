<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
           'product_code'=>'CF1',
            'name'=>'coffee',
            'price'=>'11.23',
            'description'=>'Price Matched',
            'image'=>'./image/coffee.jpg'
        ]);
        DB::table('products')->insert([
           'product_code'=>'FR1',
            'name'=>'fruit Tea',
            'price'=>'3.11',
            'description'=>'Buy one get one',
            'image'=>'./image/fruit-tea.jpg'
        ]);
        DB::table('products')->insert([
           'product_code'=>'SR1',
            'name'=>'strawberry',
            'price'=>'5.00',
            'description'=>'Price drop while  bought more than 3',
            'image'=>'./image/strawberry.jpg'
        ]);
    }
}

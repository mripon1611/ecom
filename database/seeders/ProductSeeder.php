<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            'name'=> 'Samsung Galaxy S20',
            'price'=> '280',
            'category'=> 'Mobile',
            'description'=> 'Samsung Galaxy S20 is a smart phone with 6GB RAM',
            'gallery'=> 'https://fdn2.gsmarena.com/vv/pics/samsung/samsung-galaxy-s20-1.jpg',
        ]);
    }
}

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
            'name'=> 'LG GL-B281BPZY',
            'price'=> '305',
            'category'=> 'Refrigerator',
            'description'=> 'LG double-door-refrigerator-500x500',
            'gallery'=> 'https://5.imimg.com/data5/NJ/IH/BQ/SELLER-102166082/double-door-refrigerator-500x500.jpg',
        ]);
    }
}

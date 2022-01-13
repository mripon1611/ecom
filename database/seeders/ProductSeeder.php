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
            'name'=> 'Sony TV',
            'price'=> '350',
            'category'=> 'TV',
            'description'=> 'Sony 55" X75H 4K Ultra HD Android TV Brand New',
            'gallery'=> 'https://www.clickbd.com/global/classified/item_img/2723839_1_original.jpg',
        ]);
    }
}

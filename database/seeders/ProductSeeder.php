<?php

namespace Database\Seeders;

use Faker\Provider\HtmlLorem;
use Faker\Provider\Lorem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


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
            'name' => 'iphone'.rand(1,13),
            'description' => fake()->paragraph(),
            'product_image' => rand(1,10),
            'product_type' => rand(1,10),
        ]);
    }
}

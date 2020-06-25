<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class create_products extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $faker = Faker\Factory::create();



        DB::table('products')->insert([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'name' => $faker->name,
            'mainpics' => asset('storage/products/php2B0B.tmp.png'),
            'secondarypics' => [asset('storage/products/php7B7A.tmp.png'),asset('storage/products/php7BBB.tmp.png')],
            'description' => $faker->text(),
            'colors' => serialize([$faker->unique()->colorName, $faker->unique()->colorName, $faker->unique()->colorName]),
            'brandId' => DB::table('brands')->inRandomOrder()->limit(1)->get()[0]->id,
            'price' => rand(10, 100),
            'isPublished' => (bool)random_int(0, 1)
        ]);
    }
}

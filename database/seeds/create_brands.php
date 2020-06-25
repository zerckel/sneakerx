<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class create_brands extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();

        DB::table('brands')->insert([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'name' => $faker->company,
            'pics' => asset('storage/brands/php5BC5.tmp_pics.png'),
            'banner' => asset('storage/brands/php5BC5.tmp_pics.png'),
            'description' => $faker->text()
        ]);
    }
}

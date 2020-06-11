<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class create_news extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('news')->insert([
            'title' => $faker->text(10),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'resume' => $faker->text(70),
            'pics' => $faker->imageUrl(),
            'content' => $faker->text( 1000 ),
            'author' => $faker->name,
            'isPublished' => rand(0,1)
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(create_brands::class);
        $this->call(create_news::class);
        $this->call(create_products::class);
        $this->call(create_user::class);
    }
}

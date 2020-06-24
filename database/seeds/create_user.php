<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class create_user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'email' => 'antoinecarbonnel@yahoo.fr',
            'name' => 'Antoine Carbonnel',
            'password' => encrypt('antoine')
        ]);
    }
}

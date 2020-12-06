<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();

        \App\Models\Region::factory(20)->create();
        \App\Models\Locality::factory(100)->create();
        \App\Models\District::factory(100)->create();
    }
}

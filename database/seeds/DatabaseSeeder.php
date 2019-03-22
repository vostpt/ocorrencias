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
        $this->call(DistrictTableSeeder::class);
        $this->call(CountyTableSeeder::class);
        $this->call(ParishTableSeeder::class);
        $this->call(OccurrenceTypeSeeder::class);
    }
}

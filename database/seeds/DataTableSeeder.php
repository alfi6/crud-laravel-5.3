<?php

use Illuminate\Database\Seeder;

class DataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // truncate table first
        DB::table('data')->truncate();

        // generate dummy data with 100 records using Faker
        factory('App\Entities\Data', 100)->create();
    }
}

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

        /**
         * this line will call our AdminsTableSeeder class when we run the db:seed artisan command 
         * and create database entries for us.
        */ 
        $this->call(AdminsTableSeeder::class);
    }
}

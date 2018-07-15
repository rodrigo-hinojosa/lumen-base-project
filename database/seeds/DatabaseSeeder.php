<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserStateTableSeeder::class,
            UserTypeTableSeeder::class,
            UserTableSeeder::class,
        ]);
    }

}

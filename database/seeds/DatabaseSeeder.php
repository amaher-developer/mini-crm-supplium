<?php

use App\User;
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


        factory(\App\Company::class, 50)->create();
        factory(\App\Employ::class, 50)->create();

        // $this->call(UsersTableSeeder::class);
        User::firstOrCreate([
            'id'=>1,
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);
    }
}

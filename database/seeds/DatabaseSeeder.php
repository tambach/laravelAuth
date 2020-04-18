<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'phone' => '599123456',
            'password' => Hash::make('admin123')
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@test.com',
            'phone' => '598123456',
            'password' => Hash::make('user1234')
        ]);
    }
}

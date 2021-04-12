<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => Str::random(5),
            'email' => 'user@gmail.com',
            'password' => Hash::make('123456'),
        ]);
    }
}

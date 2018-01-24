<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
           'name'     => 'Dejan Mihajlica',
           'email'    => 'mihajlicad@gmail.com',
           'password' => bcrypt('0645255834')
        ]);
    }
}
